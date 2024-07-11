<x-web.app-webNoSlider>
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css"
        rel="stylesheet" type="text/css" media="screen">

    <link
        href="{{ url('/') }}/assets-datatable-lokasi/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url('/') }}/assets-datatable-lokasi/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url('/') }}/assets-datatable-lokasi/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url('/') }}/assets-datatable-lokasi/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />

    <link href="{{ url('/') }}/assets-datatable-lokasi/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    
    <div class="container lokasi">
        <div class="row equal">
            <div class="col-xs-12 col-lg-5 kolom-foto-lokasi">
                <div class="wrapper-foto">
                    <div style="position: relative; overflow: hidden;">
                        <img src="{{ asset($lokasi->foto_lokasi) }}"
                            style="height:250px; width:100%; object-fit:cover; border-radius: 15px"
                            class="img-responsive">
                    </div>
                    @if (Auth::check() && Auth::user()->role == 'penyelenggara')
                        <div class="wrapper-button-campaign">
                            <p>Hijaukan Lokasi disini!</p>
                            <div>
                                <a href="{{ url('Pengajuan-Event/create') }}" target="_blank" class="btn-green">Buat
                                    Event</a>
                            </div>
                        </div>
                    @else
                        <div class="wrapper-button-campaign">
                            <p>Hijaukan Lokasi disini!</p>
                            <div>
                                <a href="{{ url('Event') }}" target="_blank" class="btn-green">Telususri Event</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-lg-7 kolom-utama">
                <div class="wrapper-info-lokasi">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="title-lokasi">
                                {{ $lokasi->nama_lokasi }}
                            </h1>
                            <div class="alamak-lokasi" style="display: flex; gap:5px;">
                                <img src="{{ url('/') }}/assets-web2/assets/images/icon/lokasi/navigation.png"
                                    style="height: 15px; width:15px; margin-top:-3px" alt="">
                                <p class="subtitle-lokasi">
                                    {{ $lokasi->alamat_lokasi }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row detail-lokasi" style="display: flex; justify-content:space-between">
                        <div class="text-lokasi" style="flex-wrap:wrap">
                            <p>Tipe Ekosistem</p>
                            <p class="text-dark ">
                                {{ $lokasi->jenis_ekosistem }}
                            </p>
                        </div>
                        <div class="text-lokasi" style="flex-wrap:wrap">
                            <p>Total Event</p>
                            <p class="text-dark ">
                                {{ $totalEvent }}
                            </p>
                        </div>
                        <div class="text-lokasi" style="flex-wrap:wrap">
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
                                    <div class="progress-bar " role="progressbar" style="width: {{ $percentage }}%;"
                                        aria-valuenow="{{ $totalPohonHidup }}" aria-valuemin="0"
                                        aria-valuemax="{{ $totalPohonDitanam }}">
                                        <div class="content-progress">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progres-bar-custom float-right">
                                <span style="font-size:12px">
                                    <strong>{{ $totalPohonHidup }}</strong> Pohon Hidup dari
                                    <strong>{{ $totalPohonDitanam }}</strong> Pohon Tertanam
                                    <a class="microtip"
                                        aria-label="Persentase jumlah pohon yang telah ditanam dibanding dengan goals yang ingin dicapai oleh LindungiHutan di lokasi ini."
                                        data-microtip-position="top" data-microtip-size="large" role="tooltip">
                                        <i class="fa fa-question-circle-o"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="map" class="sidebar-map fluid"></div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <div class="text-center">
                    <p class="text-dark text-bold">Event yang sudah Berjalan di Lokasi Ini</p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table id="scroll-horizontal-datatable" class="table table-bordered w-100 nowrap">
                            <thead>
                                <th class="nama-event" style="color: black; font-weight:500; font-size:15px">Event
                                </th>
                                <th style="color: black; font-weight:500; font-size:15px">Penyelenggara</th>
                                <th width="100px" style="color: black; font-weight:500; font-size:15px">Penanaman
                                </th>
                                <th width="50px" style="color: black; font-weight:500; font-size:15px">Pohon</th>
                                <th style="color: black; font-weight:500; font-size:15px">Status</th>
                                <th style="color: black; font-weight:500; font-size:15px">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($list_event as $event)
                                    <tr>
                                        <td style="color: black; font-weight:400; font-size:12px; ">
                                            @php
                                                $maxLength = 42;
                                                $nama_event = nl2br($event->nama_event);
                                                if (strlen($nama_event) > $maxLength) {
                                                    $nama_event = substr($nama_event, 0, $maxLength) . '...';
                                                }
                                            @endphp
                                            {!! $nama_event !!}
                                        <td style="color: black; font-weight:400; font-size:12px">
                                            {{ $event->user->nama_lengkap }}</td>
                                        <td style="color: black; font-weight:400; font-size:12px">
                                            {{ \Carbon\Carbon::parse($event->tanggal_event)->translatedFormat('d F Y') }}
                                        </td>
                                        <td style="color: black; font-weight:400; font-size:12px">
                                            {{ $event->tanaman_event->jumlah_pohon }}</td>
                                        <td style="color: black; font-weight:400; font-size:12px">
                                            @php
                                                $now = \Carbon\Carbon::now();
                                                $tanggal_event = \Carbon\Carbon::parse($event->tanggal_event);
                                                $tanggal_selesai = \Carbon\Carbon::parse($event->tanggal_selesai);
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
                                        <td style="color: black; font-weight:400; font-size:12px">
                                            <a href="{{ url('Event', $event->id) }}"
                                                class="btn btn-xs btn-outline-success" style="border-radius: 5px">
                                                <span style="padding-inline: 20px">Lihat Event</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>

    <style>
        th.nama-event {
            width: 30%;
        }

        .page-item.active .page-link {
            background-color: #43936C;
            border-color: #43936C;
            border-radius: 5px
        }

        /* .page-link {
            border: none;
        } */


        .progress-container {
            display: flex;
            margin-bottom: 10px;
            margin-top: 20px
        }

        .custom-progress {
            width: 100%;
            height: 10px;
            /* Anda bisa menyesuaikan tinggi sesuai kebutuhan */
        }

        .progress-bar {
            background-color: #064635;
        }

        .content-progress {
            font-size: 12px;
            color: rgb(187, 185, 185);
            padding-inline: 100px;
        }

        div.table-responsive>div.dataTables_wrapper>div.row {
            margin: 10px 10px 0;

        }

        .lokasi {
            padding-block: 40px
        }

        .equal {
            display: flex;
            flex-wrap: wrap;
        }

        .row {
            margin-left: 0;
            margin-right: 0;
        }

        .kolom-utama {
            scrollbar-width: none;
            height: 50vh;
            overflow-y: auto;
        }

        @media (min-width: 768px) and (max-width: 1199px) {
            .kolom-utama {
                height: 40vh;
            }
        }

        @media (min-width: 1920px) {
            .kolom-utama {
                height: 35vh;
            }
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

        @media (min-width: 1200px) {
            .kolom-foto-lokasi {
                margin-top: 0;
            }
        }

        @media (min-width: 768px) and (max-width: 1199px) {
            .kolom-foto-lokasi {
                margin-top: 50px;
                height: 30vh
            }
        }

        @media (max-width: 767px) {
            .kolom-foto-lokasi {
                margin-top: 50px;
            }

            .lokasi {
                padding-inline: 0;
            }
        }

        @media (min-width: 1920px) {
            .kolom-foto-lokasi {
                height: 35vh;
            }
        }


        .wrapper-foto {
            position: relative;
            height: 50%;
            width: 100%;
            margin-bottom: 20px;
        }

        .wrapper-button-campaign {
            position: absolute;
            background: #fff;
            border-radius: 12px;
            height: auto;
            padding: 15px;
            bottom: -110px;
            left: 15px;
            right: 15px;
        }

        @media (min-width: 768px) and (max-width: 1199px) {
            .wrapper-button-campaign {
                bottom: -80px;
            }
        }

        @media (min-width: 1920px) {
            .wrapper-button-campaign {
                bottom: -75px;
            }
        }

        .wrapper-button-campaign p {
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 21px;
            text-align: center;
            letter-spacing: .3px;
            color: #121212;
            margin-bottom: 12px;
        }

        .wrapper-button-campaign .btn-green {
            display: block;
            width: 100% !important;
            background: #43936c;
            border-radius: 8px;
            font-weight: 600;
            color: #fff;
            padding-inline: 24px;
            padding-block: 12px;
            transition: 300ms ease-in-out;
            text-align: center;
        }

        @media (min-width: 1200px) {
            .nama-event {
                margin-top: 0;
            }
        }

        @media (min-width: 768px) and (max-width: 1199px) {
            .nama-event {
                margin-top: 50px;
                height: 30vh
            }
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Datatables init -->
    <script src="{{ url('/') }}/assets-datatable-lokasi/assets/js/pages/datatables.init.js"></script>


</x-web.app-webNoSlider>
