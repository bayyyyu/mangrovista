<!-- jvectormap -->
<link href="{{ url('/') }}/assets-admin/dastone/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets-admin/assets//css/leaflet.defaultextent.css">
<script src="{{ url('/') }}/assets-admin/assets/js/leaflet.defaultextent.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



<x-web.app-webNoSlider>
    <div class="col-md-9 col-md-offset-1" id="edit">
        <div class="container">
            <div class="judul-atas" style="margin-top:20px; text-align:center">
                <p style="color:rgb(27, 27, 27); font-weight:bold">Halaman perubahan event
                    "{{ $event->nama_event }}"</p>
                <p>MangroVista</p>
            </div>
            <hr>
            <div class="section-wrapper">
                <form action="{{ url('Event', $event->id) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="col-md-6" style="margin: auto">
                        <div class="modal-header">
                            <img src="{{ asset($event->foto) }}" id="current-photo"
                                style="width:100%; height:225px; object-fit:cover; border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px solid #00947C;"
                                class="image">
                        </div>
                        <input type="file" id="input-file-now" name="foto" style="display: none;" accept="image/jpeg, image/png, image/jpg, image/gif" />

                        <!-- Tambahkan label untuk mengganti gambar -->
                        <div class="mt-2">
                            <div class="btn btn-sm btn-green" for="input-file-now" id="change-photo-label"
                                style="cursor: pointer; color: white;" name="foto">Ganti Gambar</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label text-dark">Nama Event:</label>
                                <input type="text" class="form-control @error('nama_event') is-invalid @enderror"
                                    name="nama_event" value="{{ old('nama_event', $event->nama_event) }}">
                                @error('nama_event')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="text-dark">Tanggal Pelaksanaan</label>
                                <div class="input-group">
                                    <input type="date" name="tanggal_event"
                                        class="form-control @error('tanggal_event') is-invalid @enderror"
                                        value="{{ old('tanggal_event', $event->tanggal_event) }}">
                                    @error('tanggal_event')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <span class="input-group-text">Hingga</span>
                                    <input type="date" name="tanggal_selesai"
                                        class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                        value="{{ old('tanggal_selesai', $event->tanggal_selesai) }}">
                                    @error('tanggal_selesai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-dark">Jam</label>
                                <input type="time" name="jam" value="{{ old('jam', $event->jam) }}"
                                    class="form-control @error('jam') is-invalid @enderror">
                                @error('jam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="text-dark">Maks. Peserta</label>
                                <input type="number" name="target_peserta"
                                    class="form-control @error('target_peserta') is-invalid @enderror"
                                    value="{{ old('target_peserta', $event->target_peserta) }}">
                                @error('target_peserta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="" class="text-dark">Batas Pendaftaran</label>
                                <input type="date" name="batas_pendaftaran"
                                    class="form-control @error('batas_pendaftaran') is-invalid @enderror"
                                    value="{{ old('batas_pendaftaran', $event->batas_pendaftaran) }}">
                                @error('batas_pendaftaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label text-dark">Deskripsi:</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="message-text" name="deskripsi"
                                    rows="10" cols="50" style="text-align: justify">{{ old('deskripsi', $event->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('Profil?page=1#pengajuan') }}"
                            class="btn btn-sm btn-outline-green">Kembali</a>
                        <button class="btn btn-sm btn-green">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <style>
        body {
            background-color: #F2F1F0;
        }

        .header-section {
            background-color: white;
        }

        #edit {
            border: 1px solid #064635;
            background-color: #fff;
            border-radius: 6px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .1), 0 6px 6px rgba(0, 0, 0, .1);
            padding: 5px;
            margin: auto;
            margin-bottom: 20px
        }

        @media (min-width: 1200px) {
            #edit {
                margin-top: 20px;
                /* Lebih besar di layar besar */
            }
        }

        /* Tablet dan perangkat medium */
        @media (min-width: 768px) and (max-width: 1199px) {
            #edit {
                margin-top: 80px;
                /* Sedang untuk tablet */
            }
        }

        /* Smartphone */
        @media (max-width: 767px) {
            #edit {
                margin-top: 80px;
                /* Lebih kecil di layar kecil */
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var currentPhoto = document.getElementById('current-photo');
            var fileInput = document.getElementById('input-file-now');

            function openFileInput() {
                fileInput.click();
            }

            if (currentPhoto) {
                // Klik pada gambar untuk membuka dialog pemilihan file
                currentPhoto.addEventListener('click', function(event) {
                    event.stopPropagation(); // Hentikan propagasi event
                    openFileInput();
                });
            }

            // Klik pada label untuk membuka dialog pemilihan file
            var changePhotoLabel = document.getElementById('change-photo-label');
            changePhotoLabel.addEventListener('click', function(event) {
                event.preventDefault(); // Hentikan default action
                event.stopPropagation(); // Hentikan propagasi event
                openFileInput();
            });

            // Menampilkan gambar yang dipilih sebagai pengganti
            fileInput.addEventListener('change', function() {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        currentPhoto.src = e.target.result;
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            });
        });
    </script>
</x-web.app-webNoSlider>
