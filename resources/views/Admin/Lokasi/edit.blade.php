<x-app>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>
    <!-- Leaflet Locate Control CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>
    <!-- Leaflet Geocoder CSS and JavaScript -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ url('Admin/Lokasi') }}" class="btn btn-primary btn-sm mb-1">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <div class="card">
                    <div class="card-header bg-primary">
                        <p style="color:white"> Edit Data Lokasi </p>
                    </div>
                    <div class="card-body">
                        <!-- Form untuk update data lokasi -->
                        <form action="{{ url('Admin/Lokasi/' . $lokasi->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('PUT') <!-- Menggunakan metode PUT untuk update -->

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nama Lokasi:<span
                                                    style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="nama_lokasi"
                                                value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}">
                                            @error('nama_lokasi')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Jenis Ekosistem:<span
                                                    style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="jenis_ekosistem"
                                                value="{{ old('jenis_ekosistem', $lokasi->jenis_ekosistem) }}">
                                            @error('jenis_ekosistem')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Alamat Lokasi:<span
                                                    style="color: red">*</span></label>
                                            <textarea class="form-control" id="message-text" name="alamat_lokasi">{{ old('alamat_lokasi', $lokasi->alamat_lokasi) }}</textarea>
                                            @error('alamat_lokasi')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Peta</label>
                                        <div id="map" style="width: 100%; height: 400px; z-index:1"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div>
                                                <div class="center-block">
                                                    <label class="col-form-label">Latitude:<span
                                                            style="color: red">*</span></label>
                                                    <input type="text" class="form-control" name="lat"
                                                        id="latitude" value="{{ old('lat', $lokasi->lat) }}">
                                                    @error('lat')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="center-block">
                                                    <label class="col-form-label">Longitude:<span
                                                            style="color: red">*</span></label>
                                                    <input type="text" class="form-control" name="lng"
                                                        id="longitude" value="{{ old('lng', $lokasi->lng) }}">
                                                    @error('lng')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="center-block mt-2">
                                                    <label>Foto Lokasi <span style="color: red">*</span></label>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <input type="file" id="input-file-now" class="dropify"
                                                                name="foto_lokasi"
                                                                data-default-file="{{ asset($lokasi->foto_lokasi) }}" />
                                                            @error('foto_lokasi')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div><!--end card-body-->
                                                    </div><!--end card-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <x-button.save />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            // Inisialisasi peta Leaflet
            var map = L.map('map', {
                center: [{{ $lokasi->lat }},
                {{ $lokasi->lng }}], // Menggunakan nilai latitude dan longitude yang ada
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

            // Tempatkan marker pada lokasi yang ada
            marker = L.marker([{{ $lokasi->lat }}, {{ $lokasi->lng }}]).addTo(map);

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
    @endpush
</x-app>
