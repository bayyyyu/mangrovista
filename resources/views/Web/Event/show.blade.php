<x-web.app-webNoSlider>
    <div class="container wrapper mt-5 mb-5">
        <div class="row justify-content-center mb-15">
            <div class="col-12 sticky-widget">
                <div class="product-details">
                    <div class="row wrapper-content">
                        <div class="col-md-5">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="shop-item">
                                        <div class="shop-thumb">
                                            <img src="{{ asset($event->foto) }}"
                                                style="height:250px; width:550px; object-fit:cover; border-radius: 15px"
                                                class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="nama-event">
                                <h5>{{ $event->nama_event }}</h5>
                            </div>
                            <div class="penyelenggara-wrapper">
                                <div class="penyelenggara-info">
                                    <div class="foto">
                                        <img src="{{ asset($event->user->foto_profil) }}" alt="foto penyelenggara"
                                            style="height:40px; width:40px;object-fit:cover; border-radius:50%; ">
                                        <span style="padding-left:10px">{{ $event->user->nama_lengkap }}</span>
                                    </div>
                                </div>
                                <div class="penyelnggara-info">
                                    <div class="penyelenggara">
                                        <p class="judul">Event diselenggarakan </p>
                                        <h6>{{ $total_pengajuan_event }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="penanaman-wrapper">
                                <div class="penanaman-info">
                                    <div class="jenis-mangrove">
                                        <span>Jenis Mangrove yang ditanam:</span>
                                        <h6>
                                            <a href="{{ url('Katalog-Pohon?jenis_pohon=' . urlencode($event->tanaman_event->jenis_pohon)) }}"
                                                style="text-decoration: underline">
                                                {{ $event->tanaman_event->jenis_pohon }}</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="penanaman-info">
                                    <div class="lokasi">
                                        <span>Lokasi: </span>
                                        <h6>
                                            <a href="{{ url('Lokasi-Penanaman', $lokasi->id) }}/{{ $lokasi->nama_lokasi }}"
                                                style="text-decoration: underline">
                                                {{ $event->lokasi->nama_lokasi }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            @php
                                $tanggalEvent = new DateTime($event->tanggal_event);
                                $sekarang = new DateTime();
                                $selisih = $sekarang->diff($tanggalEvent);
                                $hari = $selisih->days;
                                $jumlah_peserta = $event->peserta_count;
                                $target_peserta = $event->target_peserta;
                                $percentage = $target_peserta > 0 ? ($jumlah_peserta / $target_peserta) * 100 : 0;
                            @endphp
                            <div class="wrapper-event-info">
                                <p class="event-info">
                                    {{ $jumlah_peserta }}
                                    <strong>Peserta</strong>
                                </p>
                                <p class="event-info">
                                    <strong>max. Peserta</strong>
                                    {{ $target_peserta }}
                                </p>
                            </div>
                            <div class="progress-container">
                                <div class="progress custom-progress">
                                    <div class="progress-bar " role="progressbar" style="width: {{ $percentage }}%;"
                                        aria-valuenow="{{ $jumlah_peserta }}" aria-valuemin="0"
                                        aria-valuemax="{{ $target_peserta }}">
                                        <div class="content-progress">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pendaftaran-wrapper">
                                <div class="pendaftaran-date">
                                    <span>Batas Pendaftaran:</span>
                                    <h6>{{ \Carbon\Carbon::parse($event->batas_pendaftaran)->translatedFormat('d F Y') }}
                                    </h6>
                                </div>
                                <div class="pendaftaran-info">
                                    @php
                                        $batas_pendaftaran = \Carbon\Carbon::parse($event->batas_pendaftaran);
                                        $selisih_hari = now()->diffInDays($batas_pendaftaran, false);

                                    @endphp
                                    @if ($selisih_hari > 0)
                                        <h6>{{ $selisih_hari }}</h6>
                                        <span> Hari lagi</span>
                                    @else
                                        <span> Tutup</span>
                                    @endif
                                </div>
                            </div>
                            <div class="pendaftaran-wrapper" style="margin-top: -10px">
                                <div class="pendaftaran-date">
                                    <span>Penanaman:</span>
                                    <h6>{{ \Carbon\Carbon::parse($event->tanggal_event)->translatedFormat('d F Y') }}
                                        pukul {!! date('H:i', strtotime($event->jam)) !!}</h6>
                                </div>
                                <div class="pendaftaran-info">
                                    @php
                                        $tanggal_penanaman = \Carbon\Carbon::parse($event->tanggal_event);
                                        $selisih_hari_penanaman = now()->diffInDays($tanggal_penanaman, false);
                                    @endphp
                                    @if ($selisih_hari_penanaman > 0)
                                        <h6>{{ $selisih_hari_penanaman }}</h6>
                                        <span> Hari lagi</span>
                                    @else
                                        <span>Berakhir</span>
                                    @endif
                                </div>
                            </div>
                            @if (auth()->check() && $event->user_id == auth()->user()->id)
                                <div class="aksi">
                                    <div class="button-group button-control float-right">
                                        <button type="button" class="btn btn-green" data-toggle="modal"
                                            data-target="#pantauModal">
                                            Pantau
                                        </button>
                                        <a href="https://maps.google.com/maps?q={{ $event->lokasi->lat }},{{ $event->lokasi->lng }}&hl=en&t=v"
                                            class="btn btn-green lokasi popup-gmaps" style="color: white">Lihat
                                            Lokasi</a>
                                    </div>
                                </div>
                            @else
                                <div class="aksi">
                                    <div class="button-group float-right">
                                        @if (auth()->check())
                                            @php
                                                // Cek apakah pengguna sudah terdaftar untuk event ini
                                                $userRegistered = $event->isUserRegistered(auth()->user()->id);
                                            @endphp

                                            @if ($userRegistered)
                                                <!-- Tombol untuk pengguna yang sudah terdaftar -->
                                                <button type="button" class="btn btn-green" disabled>
                                                    Sudah Mendaftar
                                                </button>
                                            @else
                                                <!-- Tombol pendaftaran untuk pengguna yang belum terdaftar dan event belum selesai -->
                                                @if (now()->lt($event->tanggal_event))
                                                    <button type="button" class="btn btn-outline-green"
                                                        data-toggle="modal" data-target=".bd-example-modal-lg">
                                                        Daftar
                                                    </button>
                                                @endif
                                            @endif
                                        @else
                                            <!-- Tombol login untuk pengguna yang belum login dan event belum selesai -->
                                            @if ($event->tanggal_selesai >= now())
                                                <a href="{{ url('Login') }}" class="btn btn-outline-green">Login untuk
                                                    Daftar</a>
                                            @endif
                                        @endif

                                        <!-- Tombol pantau -->
                                        <button type="button" class="btn btn-green" data-toggle="modal"
                                            data-target="#pantauModal">
                                            Pantau
                                        </button>

                                        <!-- Tombol lihat lokasi jika lokasi tersedia -->
                                        @if ($event->lokasi)
                                            <a href="https://maps.google.com/maps?q={{ $event->lokasi->lat }},{{ $event->lokasi->lng }}&hl=en&t=v"
                                                class="btn btn-green lokasi popup-gmaps" style="color: white">Lihat
                                                Lokasi</a>
                                        @endif
                                    </div>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>

                <section id="tabs" class="mt-5">
                    {{-- <div class="container-fluid" > --}}
                    <div class="row">
                        <div class="col-md-12" style="padding: 0">
                            {{-- <nav> --}}
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-deskripsi" role="tab" aria-controls="nav-deskripsi"
                                    aria-selected="true">Deskripsi</a>
                                <a class="nav-item nav-link" id="nav-dokumentasi-tab" data-toggle="tab"
                                    href="#nav-dokumentasi" role="tab" aria-controls="nav-dokumentasi"
                                    aria-selected="false">Dokumentasi</a>
                                <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab"
                                    href="#nav-update" role="tab" aria-controls="nav-update"
                                    aria-selected="false">Update</a>
                            </div>
                            {{-- </nav> --}}
                            <div class="tab-content py-3  px-sm-0" id="nav-tabContent">
                                @include('Web.Event.Tabs.deskripsi')
                                @include('Web.Event.Tabs.dokumentasi')
                                @include('Web.Event.Tabs.update')
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                </section>
            </div>
        </div>
    </div>

    {{-- Modal  --}}
    @include('Web.Event.Modal.gabung-aksi')
    @include('Web.Event.Modal-Penyelenggara.dokumentasi')
    @include('Web.Event.Modal.pantau')
    {{-- Modal End --}}

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    @include('Web.Event.Assets-show.style')

    <script>
        $(document).ready(function() {
            $('#demo').on('slid.bs.carousel', function() {
                var carouselIndex = $('.carousel-inner .carousel-item.active').index();
                $('.deskripsi-item').removeClass('active');
                $('.deskripsi-item').eq(carouselIndex).addClass('active');
            });
            $('.jenis-mangrove a').click(function(e) {
                e.preventDefault();
                var jenisPohon = $(this).text().trim();

                // Redirect ke halaman katalog pohon dengan parameter jenis_pohon
                window.location.href = '/Katalog-Pohon?jenis_pohon=' + encodeURIComponent(jenisPohon);
            });
        });
    </script>
</x-web.app-webNoSlider>
