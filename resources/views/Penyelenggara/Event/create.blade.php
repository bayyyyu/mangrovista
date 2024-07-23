<x-web.app-webNoSlider>
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    {{-- <link rel="stylesheet" href="wizard.css"> --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>
    <!-- Leaflet Locate Control CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>
    <!-- Leaflet Geocoder CSS and JavaScript -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <!-- jQuery -->

    <link href="{{ url('/') }}/assets-admin/dastone/plugins/select2/select2.min.css" rel="stylesheet"
        type="text/css" />

    <div style="text-align: center;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form action="{{ url('Pengajuan-Event') }}" method="post" class="f1"
                        enctype="multipart/form-data">
                        <h3>Pengajuan Event</h3>
                        <p>MangroVista</p>
                        @csrf
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4"
                                    style="width: 25%;"></div>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-map"></i></div>
                                <p>Data Lokasi</p>
                            </div>
                            <div class="f1-step ">
                                <div class="f1-step-icon"><i class="fa fa-book"></i></div>
                                <p>Data Kegiatan</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-tree"></i></div>
                                <p>Data Pohon</p>
                            </div>

                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-file"></i></div>
                                <p>Data Tambahan</p>
                            </div>
                        </div>

                        <fieldset class="mb-5 mt-5">

                            <p class="text-center">Pilih Lokasi Penanaman</p>
                            <div class="row">
                                @foreach ($list_lokasi as $lokasi)
                                    <div class="col-md-3">
                                        <label class="cont" for="lokasi{{ $lokasi->id }}"
                                            style="width: 100%;position: relative;">
                                            <input data-toggle="modal" data-target="#exampleModalLong" class="radio"
                                                type="radio" id="lokasi{{ $lokasi->id }}" name="lokasi_id"
                                                value="{{ $lokasi->id }}" required=""
                                                data-nama="{{ $lokasi->nama_lokasi }}"
                                                data-alamat="{{ $lokasi->alamat_lokasi }}"
                                                data-gambar="{{ asset($lokasi->foto_lokasi) }}"
                                                data-lat="{{ $lokasi->lat }}" data-lng="{{ $lokasi->lng }}"
                                                style="position: absolute; top: 10px; right: 10px; z-index: 10;">
                                            <div class="cons">
                                                <img src="{{ asset($lokasi->foto_lokasi) }}"
                                                    style="width:100%; height:120px; object-fit:cover;  border-radius: 5px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border: 1px solid #00947C;"
                                                    class="image">
                                                <div class="text text-center">
                                                    <center>{{ $lokasi->nama_lokasi }}</center>
                                                </div>
                                            </div>
                                            <span class="checkmark" style="right: 30px; "></span>
                                        </label>
                                    </div>
                                @endforeach
                                @include('Penyelenggara.Event.Modal.index')
                                <div class="col-md-3">
                                    <a href="{{ url('Pengajuan-Event/Lokasi') }}"
                                        style="width: 100%;position: relative;">
                                        <div class="cons">
                                            <img src="{{ url('/') }}/assets-web2/assets/images/icon/map.png"
                                                style="width:100%; height:120px; object-fit:contain;  border-radius: 5px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border: 1px solid #00947C;"
                                                class="image">
                                            <div class="text text-center">
                                                <center>Tambah Lokasi Baru</center>
                                            </div>
                                        </div>
                                        <span class="checkmark" style="right: 30px; "></span>
                                    </a>
                                </div>
                            </div>
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-next">Selanjutnya <i
                                        class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>

                        <fieldset class="mb-5">
                            <hr>
                            <p class="text-dark text-center text-bold">Lokasi Spesifik Penanaman</p>
                            <div class="card">
                                <div class="card-body">
                                    <div id="map" style="width: 100%; height: 300px; z-index:1"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input type="text" name="lat" placeholder="Latitude Lokasi"
                                            class="form-control" value="{{ $lokasi->lat }}" id="latitude" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input type="text" name="lng" placeholder="Longitude Lokasi"
                                            class="form-control" value="{{ $lokasi->lng }}" id="longitude"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Event <span style="color: red">*</span></label>
                                <input type="text" name="nama_event" placeholder="Nama Event"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi <span style="color: red">*</span></label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Maks. Peserta</label>
                                                    <input type="number" class="form-control" name="target_peserta">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Batas Pendaftaran</label>
                                                    <input type="date" class="form-control"
                                                        name="batas_pendaftaran">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggal Pelaksanaan</label>
                                        <div class="input-group mb-3">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="date" class="form-control" name="tanggal_event">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="input-group-text">Hingga</span>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="date" class="form-control"
                                                        name="tanggal_selesai">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jam</label>
                                <input type="time" name="jam" placeholder="Alamat Rumah"
                                    class="form-control">
                            </div>
                            <div class="form-group ">
                                <div class="col-xl-6">
                                    <label>Foto/Thumbnail Event <span style="color: red">*</span></label>
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" id="input-file-now" class="dropify"
                                                name="foto" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="f1-buttons">
                                <button type="button" class="btn btn-info btn-previous"><i
                                        class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i
                                        class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>
                        <!-- step 3 -->
                        <fieldset class="mb-5 mt-5">
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="mb-3">Jenis Mangrove yang ditanam</label>
                                                    <select class="select2 mb-3 select2-multiple" style="width: 100%"
                                                        multiple="multiple" data-placeholder="Choose"
                                                        name="jenis_pohon">
                                                        <option value="Api-Api">Api-Api</option>
                                                        <option value="Mangrove Pepada">Mangrove Pepada</option>
                                                        <option value="Bakau">Bakau</option>
                                                        <option value="Lacang">Lacang</option>
                                                        <option value="Nipah">Nipah</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <label for="">Umur Bibit</label>
                                                    <input type="text" placeholder="Contoh: 2 Bulan/Tahun"
                                                        class="form-control" name="umur_bibit">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Jumlah Pohon Ditanam</label>
                                                    <input type="number" placeholder="contoh: 100"
                                                        class="form-control" name="jumlah_pohon">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-info btn-previous"><i
                                        class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i
                                        class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>
                        <!-- step 4 -->
                        <fieldset class="mb-5 mt-5">
                            Opsional
                            <hr>
                            <div class="card-body">
                                <div class="repeater-custom-show-hide">
                                    <div data-repeater-list="car">
                                        <div data-repeater-item="">
                                            <div class="form-group row  d-flex align-items-end">
                                                <div class="col-sm-4">
                                                    <label class="form-label">File</label>
                                                    <input type="file" name="dokumen_tambahan"
                                                        class="form-control" />
                                                </div><!--end col-->
                                                <div class="col-sm-6">
                                                    <label class="form-label">Nama Data Tambahan</label>
                                                    <input type="text" name="nama_berkas" class="form-control"
                                                        placeholder="contoh: Surat Perizinan">
                                                </div><!--end col-->

                                                <div class="col-sm-1">
                                                    <span data-repeater-delete="" class="btn"
                                                        style="border: 1px solid red; color:red">
                                                        <span class="far fa-trash-alt me-1"></span> Delete
                                                    </span>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                            <hr>
                                        </div><!--end /div-->
                                    </div><!--end repet-list-->

                                    <div class="form-group row mb-0">
                                        <div class="col-sm-12">
                                            <span data-repeater-create="" class="btn"
                                                style="border: 1px solid rgb(0, 119, 255); color:rgb(0, 119, 255)">
                                                <span class="fa fa-plus"></span> Tambah
                                            </span>

                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div> <!--end repeter-->
                            </div><!--end card-body-->
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-info btn-previous"><i
                                        class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-save"></i>
                                    Submit</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Select2 JS -->
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/select2/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    {{-- <script src="wizard.js"></script> --}}
    <style>
        .f1-steps {
            overflow: hidden;
            position: relative;
            margin-top: 20px;
        }

        .f1-progress {
            position: absolute;
            top: 24px;
            left: 0;
            width: 100%;
            height: 1px;
            background: #ddd;
        }

        .f1-progress-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 1px;
            background: #338056;
        }

        .f1-step {
            position: relative;
            float: left;
            width: 25%;
            padding: 0 5px;
        }

        .f1-step-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-top: 4px;
            background: #ddd;
            font-size: 16px;
            color: #fff;
            line-height: 40px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        .f1-step.activated .f1-step-icon {
            background: #fff;
            border: 1px solid #338056;
            color: #338056;
            line-height: 38px;
        }

        .f1-step.active .f1-step-icon {
            width: 48px;
            height: 48px;
            margin-top: 0;
            background: #338056;
            font-size: 22px;
            line-height: 48px;
        }

        .f1-step p {
            color: #ccc;
        }

        .f1-step.activated p {
            color: #338056;
        }

        .f1-step.active p {
            color: #338056;
        }

        .f1 fieldset {
            display: none;
            text-align: left;
        }

        .f1-buttons {
            text-align: right;
        }

        .f1 .input-error {
            border-color: #f35b3f;
        }

        .border-error {
            border: 1px solid #f35b3f;
        }

        .my-custom-button {
             background-color: #338056;
            color: white;
        }

        .btn-next {
            background-color: #338056;
            color: white;
        }

        .btn-next:hover {
            border: 1px solid #338056;
            color: #338056;
            background-color: white;
        }

        div:where(.swal2-container).swal2-center>.swal2-popup {
            width: 50rem;
            height: 30rem;
            font-size: 13px
        }
        .btn-previous{
            background-color: white;
            color: #338056;
            border: 1px solid #338056;
        }
        .btn-previous:hover{
            background-color: #338056;
            color: white;
        }
       
    </style>
    <script>
        var map, marker1;
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil nilai latitude dan longitude dari input tersembunyi untuk marker pertama
            var lat1 = parseFloat(document.getElementById('latitude').value);
            var lng1 = parseFloat(document.getElementById('longitude').value);

            // Inisialisasi peta Leaflet
            map = L.map('map', {
                center: [lat1, lng1],
                zoom: 20,
                layers: [
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; OpenStreetMap contributors'
                    })
                ]
            });

            // Tambahkan marker di posisi awal (marker pertama)
            marker1 = L.marker([lat1, lng1]).addTo(map);
            marker1.bindTooltip("<?php echo $lokasi->nama_lokasi; ?>", {
                permanent: true,
                direction: 'top',
                offset: [-15, -10]
            }).openTooltip();

            // Variabel untuk menyimpan marker baru (draggable)
            var marker2 = null;

            // Fungsi untuk menambahkan atau memindahkan marker baru pada klik peta
            map.on("click", function(e) {
                if (marker2) {
                    // Jika marker2 sudah ada, pindahkan ke lokasi baru
                    marker2.setLatLng(e.latlng);
                } else {
                    // Jika marker2 belum ada, buat marker baru
                    marker2 = L.marker(e.latlng, {
                        draggable: true
                    }).addTo(map);

                    // event listener untuk update koordinat ketika marker dipindahkan
                    marker2.on('dragend', function(event) {
                        var position = marker2.getLatLng();
                        document.getElementById('latitude').value = position.lat;
                        document.getElementById('longitude').value = position.lng;
                    });
                }

                // Update nilai input type float dengan koordinat marker2
                document.getElementById('latitude').value = e.latlng.lat;
                document.getElementById('longitude').value = e.latlng.lng;
            });

            // Pastikan koordinat marker awal diperbarui di input (jika tidak diubah)
            document.getElementById('latitude').value = lat1;
            document.getElementById('longitude').value = lng1;
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua elemen input radio dengan class 'radio'
            const radioButtons = document.querySelectorAll('input[type="radio"].radio');

            radioButtons.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Ambil data dari atribut data-*
                    const namaLokasi = this.getAttribute('data-nama');
                    const alamatLokasi = this.getAttribute('data-alamat');
                    const gambarLokasi = this.getAttribute('data-gambar');
                    const lat = parseFloat(this.getAttribute('data-lat'));
                    const lng = parseFloat(this.getAttribute('data-lng'));

                    // Update konten modal
                    document.getElementById('modalImage').src = gambarLokasi;
                    document.getElementById('modalNamaLokasi').innerText = namaLokasi;
                    document.getElementById('modalAlamatLokasi').innerText = alamatLokasi;

                    // Update latitude dan longitude pada form
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;

                    // Update posisi marker1 di peta
                    marker1.setLatLng([lat, lng]);
                    marker1.setTooltipContent(namaLokasi).openTooltip();
                    map.setView([lat, lng], 20); // Zoom ke lokasi baru
                });
            });
        });

        function scroll_to_class(element_class, removed_height) {
            var scroll_to = $(element_class).offset().top - removed_height;
            if ($(window).scrollTop() != scroll_to) {
                $('html, body').stop().animate({
                    scrollTop: scroll_to
                }, 0);
            }
        }

        function bar_progress(progress_line_object, direction) {
            var number_of_steps = progress_line_object.data('number-of-steps');
            var now_value = progress_line_object.data('now-value');
            var new_value = 0;
            if (direction == 'right') {
                new_value = now_value + (100 / number_of_steps);
            } else if (direction == 'left') {
                new_value = now_value - (100 / number_of_steps);
            }
            progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua elemen input radio dengan class 'radio'
            const radioButtons = document.querySelectorAll('input[type="radio"].radio');

            radioButtons.forEach(radio => {
                radio.addEventListener('click', function() {
                    // Ambil data dari atribut data-*
                    const namaLokasi = this.getAttribute('data-nama');
                    const alamatLokasi = this.getAttribute('data-alamat');
                    const gambarLokasi = this.getAttribute('data-gambar');

                    // Update konten modal
                    document.getElementById('modalImage').src = gambarLokasi;
                    document.getElementById('modalNamaLokasi').innerText = namaLokasi;
                    document.getElementById('modalAlamatLokasi').innerText = alamatLokasi;
                });
            });
        });

        $(document).ready(function() {
            $('.select2').select2();
            // Form
            $('.f1 fieldset:first').fadeIn('slow');

            $('.f1 input[type="text"], .f1 input[type="password"], .f1 input[type="file"], .f1 input[type="time"], .f1 input[type="date"], .f1 input[type="radio"], .f1 textarea')
                .on('focus', function() {
                    $(this).removeClass('input-error');
                });

            // step selanjutnya (ketika klik tombol selanjutnya)
            $('.f1 .btn-next').on('click', function() {
                var parent_fieldset = $(this).parents('fieldset');
                var next_step = true;
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                // validasi form
                parent_fieldset.find(
                    'input[type="text"], input[type="password"], input[type="file"], input[type="date"], input[type="time"], textarea'
                ).each(function() {
                    if ($(this).val() == "") {
                        $(this).addClass('input-error');
                        next_step = false;
                        if ($(this).attr('type') === 'file' || $(this).is('textarea')) {
                            $(this).closest('.card').addClass('border-error');
                        }
                    } else {
                        $(this).removeClass('input-error');
                        if ($(this).attr('type') === 'file' || $(this).is('textarea')) {
                            $(this).closest('.card').removeClass('border-error');
                        }
                    }
                });

                // Tambahkan validasi khusus untuk radio button lokasi
                var radioGroup = parent_fieldset.find('input[type="radio"][name="lokasi_id"]');
                if (radioGroup.length > 0 && !radioGroup.is(':checked')) {
                    // Jika tidak ada radio button yang dipilih, beri tanda error dan hentikan proses
                    next_step = false;
                    radioGroup.closest('.form-group').addClass('input-error');
                    Swal.fire({
                        title: "Peringatan!",
                        text: "Pilih salah satu lokasi atau buat lokasi baru sebelum melanjutkan.",
                        icon: "warning",
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: 'my-custom-button'
                        }
                    });
                } else {
                    radioGroup.closest('.form-group').removeClass('input-error');
                }



                if (next_step) {
                    parent_fieldset.fadeOut(400, function() {
                        // change icons
                        current_active_step.removeClass('active').addClass('activated').next()
                            .addClass('active');
                        // progress bar
                        bar_progress(progress_line, 'right');
                        // show next step
                        $(this).next().fadeIn();
                        // scroll window to beginning of the form
                        scroll_to_class($('.f1'), 20);
                    });
                }
            });

            // step sebelumnya (ketika klik tombol sebelumnya)
            $('.f1 .btn-previous').on('click', function() {
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                $(this).parents('fieldset').fadeOut(400, function() {
                    // change icons
                    current_active_step.removeClass('active').prev().removeClass('activated')
                        .addClass('active');
                    // progress bar
                    bar_progress(progress_line, 'left');
                    // show previous step
                    $(this).prev().fadeIn();
                    // scroll window to beginning of the form
                    scroll_to_class($('.f1'), 20);
                });
            });

            // submit (ketika klik tombol submit di akhir wizard)
            $('.f1').on('submit', function(e) {
                var form_valid = true;

                // Validasi input yang tidak opsional
                $(this).find(
                    'input[type="text"]:not([name="nama_berkas"]), input[type="password"], textarea:not([name="dokumen_tambahan"])'
                ).each(function() {
                    if ($(this).val() == "") {
                        form_valid = false;
                        $(this).addClass('input-error');
                    } else {
                        $(this).removeClass('input-error');
                    }
                });

                // Jika form tidak valid, cegah pengiriman form
                if (!form_valid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</x-web.app-webNoSlider>
