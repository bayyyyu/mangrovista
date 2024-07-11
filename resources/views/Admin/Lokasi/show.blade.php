<x-app>
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/leaflet/leaflet.css" rel="stylesheet">

    <div class="row mt-3">
        <div class="col-md-3">

            <a href="{{ url('Admin/Lokasi') }}" class="btn btn-sm btn-outline-primary mb-2">
                <i class="fa fa-arrow-left ">
                </i>
                Kembali
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div id="lokasi_map" style="height: 230px"></div>
                </div><!--end card-body-->
                <div class="card-body">
                    <div class="row equal">
                        <div class="col-xs-12 col-lg-5 kolom-foto-lokasi">
                            <div class="wrapper-foto">
                                <div style="position: relative; overflow: hidden;">
                                    <img src="{{ asset($lokasi->foto_lokasi) }}"
                                        style="height:250px; width:100%; object-fit:cover; border-radius: 15px"
                                        class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-7 kolom-utama">
                            <div class="wrapper-info-lokasi">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h1 class="title-lokasi">
                                            {{ $lokasi->nama_lokasi }}
                                        </h1>
                                        <div class="alamat-lokasi" style="display: flex; gap:8px;">
                                            <img src="{{ url('/') }}/assets-web2/assets/images/icon/lokasi/navigation.png"
                                                style="height: 15px; width:15px; margin-top:-3px" alt="">
                                            <p class="subtitle-lokasi" style="line-height: 1; margin-top:-5px">
                                                {{ $lokasi->alamat_lokasi }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row detail-lokasi"
                                    style="display: flex; justify-content:space-between; flex-wrap: wrap;">
                                    <div class="text-lokasi" style="flex: 1; margin-right: 10px;">
                                        <p>Tipe Ekosistem</p>
                                        <p class="text-dark ">
                                            {{ $lokasi->jenis_ekosistem }}
                                        </p>
                                    </div>
                                    <div class="text-lokasi" style="flex: 1; margin-right: 10px;">
                                        <p>Total Event</p>
                                        <p class="text-dark ">
                                            {{ $totalEvent }}
                                        </p>
                                    </div>
                                    <div class="text-lokasi" style="flex: 1;">
                                        <p>Pohon Tertanam</p>
                                        <p class="text-dark">
                                            {{ $totalPohonDitanam }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row" style="line-height: 10px">
                                    <div class="col-lg-12">
                                        <div class="progress-container">
                                            <div class="progress custom-progress">
                                                <div class="progress-bar " role="progressbar"
                                                    style="width: {{ $percentage }}%;"
                                                    aria-valuenow="{{ $totalPohonHidup }}" aria-valuemin="0"
                                                    aria-valuemax="{{ $totalPohonDitanam }}">
                                                    <div class="content-progress">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progres-bar-custom float-end">
                                            <span style="font-size:12px">
                                                <strong>{{ $totalPohonHidup }}</strong> Pohon Hidup dari
                                                <strong>{{ $totalPohonDitanam }}</strong> Pohon Tertanam
                                                <a class="microtip"
                                                    aria-label="Persentase jumlah pohon yang telah ditanam dibanding dengan goals yang ingin dicapai oleh LindungiHutan di lokasi ini."
                                                    data-microtip-position="top" data-microtip-size="large"
                                                    role="tooltip">
                                                    <i class="fa fa-question-circle-o"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <div class="card">
                                <div class="card-header text-center mb-0">
                                    <b class="text-dark text-bold" style="text-decoration: underline">Event yang sudah
                                        Berjalan di Lokasi Ini</b>
                                </div>
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered w-100">
                                        <thead class="bg-primary">
                                            <th width="10px" class="text-white">No</th>
                                            <th class="text-white">Event</th>
                                            <th class="text-white">Penyelenggara</th>
                                            <th class="text-white">Pohon</th>
                                            <th class="text-white">Status</th>

                                        </thead>
                                        <tbody>
                                            @foreach ($list_event as $event)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ $event->nama_event }}
                                                    <td>
                                                        {{ $event->user->nama_lengkap }}</td>
                                                    <td>
                                                        {{ $event->tanaman_event->jumlah_pohon }}</td>
                                                    <td>
                                                        @php
                                                            $now = \Carbon\Carbon::now();
                                                            $tanggal_event = \Carbon\Carbon::parse(
                                                                $event->tanggal_event,
                                                            );
                                                            $tanggal_selesai = \Carbon\Carbon::parse(
                                                                $event->tanggal_selesai,
                                                            );
                                                            $status = '';
                                                            $statusClass = '';

                                                            if ($now->gt($tanggal_selesai)) {
                                                                $status = 'Selesai';
                                                                $statusClass = 'text-danger';
                                                            } elseif ($now->between($tanggal_event, $tanggal_selesai)) {
                                                                $status = 'Berlangsung';
                                                                $statusClass = 'text-primary';
                                                            } else {
                                                                $status = 'Aktif';
                                                                $statusClass = 'text-success';
                                                            }
                                                        @endphp
                                                        <span class="{{ $statusClass }}">{{ $status }}</span>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                </div><!--end card-body-->
            </div> <!--end card-->
        </div><!--end col-->
    </div><!--end row-->

    <style>
        .progress-container {
            display: flex;
            margin-bottom: 10px;
            margin-top: 20px
        }

        .custom-progress {
            width: 100%;
            height: 10px;
            background-color: rgb(192, 190, 190)
                /* Anda bisa menyesuaikan tinggi sesuai kebutuhan */
        }

        .progress-bar {
            background-color: #064635;
        }

        .content-progress {
            font-size: 12px;
            color: rgb(134, 134, 134) !important;
            padding-inline: 100px;
        }

        .lokasi {
            padding-block: 40px
        }

        .equal {
            display: flex;
            flex-wrap: wrap;
        }

        .kolom-utama {
            scrollbar-width: none;
            height: 50vh;
            overflow-y: auto;
        }

        .wrapper-info-lokasi {
            background: #f5f9f8;
            border-radius: 12px;
            padding: 30px 15px;
            height: auto;
            margin-bottom: 32px !important;
        }


        .wrapper-info-lokasi p {
            font-style: normal;
            font-weight: bold;
            font-size: 14px;
            line-height: 10px;
            letter-spacing: .3px;
        }

        .title-lokasi {
            font-style: normal;
            font-weight: 700;
            font-size: 28px;
            line-height: 42px;
            letter-spacing: .5px;
            color: #121212;
        }

        progress {
            display: inline-block;
            vertical-align: baseline;
            appearance: auto;
            block-size: 1em;
            inline-size: 10em;
        }

        .wrapper-grids-counter {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .kolom-foto-lokasi {
            height: 40vh;
            position: sticky;
        }

        .wrapper-foto {
            position: relative;
            height: 50%;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/leaflet/leaflet.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/pages/jquery.profile.init.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil data lokasi dari variabel PHP yang diteruskan ke view
            var lat = {{ $lokasi->lat }};
            var lng = {{ $lokasi->lng }};
            var nama_lokasi = "{{ $lokasi->nama_lokasi }}";

            // Inisialisasi peta Leaflet
            var map = L.map('lokasi_map').setView([lat, lng], 13); // Gunakan koordinat lokasi dari variabel

            // Tambahkan tile layer dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; Bayu Pratama contributors'
            }).addTo(map);

            // Tambahkan marker dengan popup
            var marker = L.marker([lat, lng]).addTo(map)
                .bindPopup(nama_lokasi)
                .openPopup();
        });
    </script>
</x-app>
