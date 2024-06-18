<!-- jvectormap -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>
<!-- Leaflet Locate Control CSS and JavaScript -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>
<!-- Leaflet Geocoder CSS and JavaScript -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<x-web.app-webNoSlider>
    <div class="shop-page mt-5 mb-5">
        <div class="container">

            <div class="judul-atas" style="margin-top:50px; text-align:center">
                <h5 style="font-weight:bolder">Lokasi Penanaman</h5>
                <p>MangroVista</p>
            </div>
            <div class="section-wrapper">
                <form action="{{ url('Pengajuan-Event/create') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama Lokasi:</label>
                                    <input type="text" class="form-control" name="nama_lokasi" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Jenis Ekosistem:</label>

                                    <input type="text" class="form-control" name="jenis_ekosistem" required>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Alamat Lokasi:</label>
                                    <textarea class="form-control" id="message-text" name="alamat_lokasi" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Peta</label>
                                <div id="map" style="width: 100%; height: 400px; z-index:1"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div>
                                        <div class="center-block"><label class="col-form-label">Latitude: </label>
                                            <input type="float" class="form-control" name="lat" id="latitude"
                                                required>
                                        </div>
                                        <div class="center-block"> <label class="col-form-label">Longitude:</label>
                                            <input type="float" class="form-control" name="lng" id="longitude"
                                                required>
                                        </div>
                                        <div class="center-block mt-2">
                                            <label>Foto Lokasi <span style="color: red">*</span></label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <input type="file" id="input-file-now" class="dropify"
                                                        name="foto_lokasi" required />
                                                </div><!--end card-body-->
                                            </div><!--end card-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('Pengajuan-Event/create') }}" class="btn btn-sm btn-outline-green">Kembali</a>
                        <button class="btn btn-sm btn-green">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Inisialisasi peta Leaflet
        var map = L.map('map', {
            center: [-1.8028443920355783, 109.9684624870144],
            zoom: 9,
            layers: [
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                })
            ]
        });

        // Tambahkan kontrol geolokasi dan geocoder
        L.control.locate().addTo(map);
        L.Control.geocoder().addTo(map);

        // Variabel untuk menyimpan marker dan polygon
        var marker = null;
        var polygonLayer = null;

        // Fungsi untuk menambahkan marker pada klik peta
        map.on("click", function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        });

        // Fungsi untuk mencari lokasi menggunakan Nominatim API
        function searchLocation() {
            var query = document.getElementById('search').value;

            fetch(`https://nominatim.openstreetmap.org/search?format=json&polygon_geojson=1&q=${query}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        var location = data[0];
                        var geojson = location.geojson;

                        // Hapus layer sebelumnya jika ada
                        if (polygonLayer) {
                            map.removeLayer(polygonLayer);
                        }

                        // Tambahkan polygon dari hasil pencarian ke peta
                        polygonLayer = L.geoJSON(geojson, {
                            style: function(feature) {
                                return {
                                    color: 'blue',
                                    fillOpacity: 0.3
                                };
                            }
                        }).addTo(map);

                        // Set view ke lokasi pencarian
                        map.setView([location.lat, location.lon], 13);

                        // Simpan koordinat polygon ke input tersembunyi
                        document.getElementById('polygonCoordinates').value = JSON.stringify(geojson.coordinates);

                        // Tambahkan marker di tengah polygon (jika ada)
                        if (marker) {
                            marker.setLatLng([location.lat, location.lon]);
                        } else {
                            marker = L.marker([location.lat, location.lon]).addTo(map);
                        }

                        document.getElementById('latitude').value = location.lat;
                        document.getElementById('longitude').value = location.lon;
                    } else {
                        alert('Lokasi tidak ditemukan!');
                    }
                })
                .catch(error => console.error('Error fetching data from Nominatim API:', error));
        }
    </script>
</x-web.app-webNoSlider>
