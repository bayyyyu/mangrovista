<x-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <a href="{{ url('Admin/Event') }}" class="btn btn-dark btn-mat mb-1"><i
                        class="feather icon-arrow-left"></i>
                    Kembali</a>
                <div class="card">
                    <div class="card-header bg-dark">
                        <p style="color:white"> Tambah Data Event </p>
                        <div class="card-tools">
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 mt-5">
                                        <div class="card-body">
                                            <form action="{{ url('Admin/Event') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" class="control-label">Nama Event</label>
                                                            <input type="text" class="form-control" name="nama_event"
                                                                value="{{ old('nama_event') }}">
                                                            @if ($errors->has('nama_event'))
                                                                <ul class="text-danger">
                                                                    @foreach ($errors->get('nama_event') as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group"> 
                                                                    <label for="" class="control-label">Tanggal Mulai</label>
                                                                    <input type="date" class="form-control"
                                                                        name="tanggal_event" value="{{ old('tanggal_event') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group"> 
                                                                    <label for="" class="control-label">Tanggal Selesai</label>
                                                                    <input type="date" class="form-control"
                                                                        name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" class="control-label">Jam Pelaksanaan</label>
                                                            <input type="time" class="form-control"
                                                                name="jam"
                                                                value="{{ old('jam') }}">
                                                            @if ($errors->any('jam'))
                                                                <ul class="text-danger">
                                                                    @foreach ($errors->get('jam') as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" class="control-label">Foto</label>
                                                            <input type="file" class="form-control" name="foto"
                                                                accept="image/*" value="{{ old('foto') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="control-label">Deskripsi</label>
                                                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for=""
                                                                class="control-label">Latitude</label>
                                                            <span style="color: grey"><span style="color: red">
                                                                    *</span>(click pada
                                                                peta
                                                                kemudian drag marker)</span>
                                                            <input type="float" class="form-control" name="lat"
                                                                id="latitude" value="{{ old('lat') }}">
                                                            @if ($errors->has('lat'))
                                                                <ul class="text-danger">
                                                                    @foreach ($errors->get('lat') as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                            <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for=""
                                                                class="control-label">Longitude</label>
                                                            <span style="color: grey"><span style="color: red">
                                                                    *</span>(click pada
                                                                peta
                                                                kemudian drag marker)</span>
                                                            <input type="float" class="form-control" name="lng"
                                                                id="longitude" value="{{ old('lng') }}">
                                                            @if ($errors->has('lng'))
                                                                <ul class="text-danger">
                                                                    @foreach ($errors->get('lng') as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                            <br>
                                                        </div>
                                                    </div>
                                                    <div id="map"
                                                        style="width: 80%; height: 300px;margin-left:auto;margin-right:auto">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="button-group pull-right">
                                                    <button class="btn btn-success float-right"><i
                                                            class="fa fa-save "></i> Simpan</button>
                                                </div>
                                            </form>
                                            <a href="{{ url('Admin/Event') }}" class="btn btn-danger float-right"
                                                style="margin-right:10px"><i class="fa fa-trash "></i>Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var peta1 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });

        var peta2 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-v9'
            });


        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var map = L.map('map', {
            center: [-1.8028443920355783, 109.9684624870144],
            zoom: 9,
            layers: [peta3],
        });

        var baseMaps = {
            "Grayscale": peta1,
            "Sattelite": peta2,
            "Streets": peta3,
        };

        var latInput = document.querySelector("[name=latitude]");
        var lngInput = document.querySelector("[name=longitude]");

        var curLocation = [-1.8028443920355783, 109.9684624870144];

        map.attributionControl.setPrefix(false);

        var marker = new L.marker(curLocation, {
            draggable: 'true'
        });

        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            $("#latitude").val(position.lat);
            $("#longitude").val(position.lng);
        });

        map.addLayer(marker);

        map.on("click", function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            if (!marker) {
                marker = L.marker(e.latlng).addTo(map);
            } else {
                marker.setLatLng(e.latlng);
            }
            latInput.value = lat;
            lngInput.value = lng;
        });

        L.Control.geocoder({
            position: 'topleft'
        }).addTo(map);

        L.control.defaultExtent().addTo(map);

        L.control.locate().addTo(map);
    </script>

    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    @endpush

    @push('script')

        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(document).ready(function() {
            $('#deskripsi').summernote();
            });
        </script>
    @endpush
</x-app>
