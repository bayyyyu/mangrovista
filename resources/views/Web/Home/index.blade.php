<x-web.app-web>
    <section class="history-section padding-tb">
        <div class="col-12">
            <div class="achievement text-center mt-lg-0">
                <div class="achievement-title">
                    <h5>Bersama menghijaukan bumi</h5>
                </div>
                <div class="achievement-content">
                    <div class="row justify-content-center">
                        <div class="col-md-3 mt-5">
                            <div class="lab-item">
                                <div class="lab-inner text-center">
                                    <div class="lab-thumb mb-3">
                                        <img src="{{ url('/') }}/assets-web2/assets/images/about/history/achievement/holding-hand.png"
                                            alt="Customer">
                                    </div>
                                    <div class="lab-content">
                                        <h3><span>{{ $tanaman }}</span></h3>
                                        <p style="color:grey;">Pohon tertanam</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-5">
                            <div class="lab-item">
                                <div class="lab-inner text-center">
                                    <div class="lab-thumb mb-3">
                                        <img src="{{ url('/') }}/assets-web2/assets/images/about/history/achievement/tree.png"
                                            alt="Customer">
                                    </div>
                                    <div class="lab-content">
                                        <h3><span>{{ $jumlah_pohon_hidup }}</span></h3>
                                        <p style="color:grey;">Pohon yang tumbuh</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-5">
                            <div class="lab-item">
                                <div class="lab-inner text-center">
                                    <div class="lab-thumb mb-3">
                                        <img src="{{ url('/') }}/assets-web2/assets/images/about/history/achievement/event.png"
                                            alt="Customer">
                                    </div>
                                    <div class="lab-content">
                                        <h3><span>{{ $eventMendatang }}</span></h3>
                                        <p style="color:grey;">Event mendatang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-5">
                            <div class="lab-item">
                                <div class="lab-inner text-center">
                                    <div class="lab-thumb mb-3">
                                        <img src="{{ url('/') }}/assets-web2/assets/images/about/history/achievement/calendar.png"
                                            alt="Customer">
                                    </div>
                                    <div class="lab-content">
                                        <h3><span>{{ $eventBerlalu }}</span></h3>
                                        <p style="color:grey;">Event berlalu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="nilai-utama">
        <div class="shop-page" style="margin-bottom:150px">
            <div class="container">
                <div class="section-wrapper">
                    <div class="row justify-content-center">
                        <h3>
                            Nilai Utama Kami
                        </h3>
                        <div class="col-lg-12 col-12">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <!-- Card 1 -->
                                    <div class="swiper-slide">
                                        <div class="card card-1">
                                            <div class="content">
                                                <div class="text">
                                                    <h3>Konservasi Lingkungan</h3>
                                                    <p>Menyoroti pentingnya penanaman pohon mangrove sebagai langkah
                                                        konservasi lingkungan. Menjelaskan manfaat ekosistem
                                                        mangrove dalam menjaga keanekaragaman hayati, melindungi
                                                        pesisir dari abrasi, dan menyimpan karbon.</p>
                                                </div>
                                                <img src="{{ url('/') }}/assets-web2/assets/images/nilai utama/01.png"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 2 -->
                                    <div class="swiper-slide">
                                        <div class="card card-2">
                                            <div class="content">
                                                <div class="text">
                                                    <h3>Edukasi</h3>
                                                    <p>Meningkatkan kesadaran masyarakat akan pentingnya pohon mangrove
                                                        dan dampak positifnya. Menyediakan informasi tentang ekologi
                                                        mangrove, manfaatnya bagi manusia dan lingkungan, serta cara
                                                        terlibat dalam kegiatan penanaman dan pemeliharaan mangrove.</p>
                                                </div>
                                                <img src="{{ url('/') }}/assets-web2/assets/images/nilai utama/02.png"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 3 -->
                                    <div class="swiper-slide">
                                        <div class="card card-3">
                                            <div class="content">
                                                <div class="text">
                                                    <h3>Kolaborasi dan Partisipasi</h3>
                                                    <p>Mendorong kolaborasi dengan komunitas lokal, pemerintah, dan
                                                        organisasi lingkungan untuk memperkuat upaya penanaman pohon
                                                        mangrove. Memotivasi orang-orang untuk bergabung, menjadi
                                                        sukarelawan, atau menyumbangkan dana untuk mendukung proyek
                                                        penanaman mangrove.</p>
                                                </div>
                                                <img src="{{ url('/') }}/assets-web2/assets/images/nilai utama/03.png"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 3 -->
                                    <div class="swiper-slide">
                                        <div class="card card-4">
                                            <div class="content">
                                                <div class="text">
                                                    <h3>Proyek Penanaman Mangrove</h3>
                                                    <p>Menampilkan informasi tentang proyek-proyek penanaman pohon
                                                        mangrove yang sedang berjalan atau telah selesai. Menampilkan
                                                        foto dan cerita sukses tentang bagaimana pohon mangrove telah
                                                        mengubah lingkungan setempat.</p>
                                                </div>
                                                <img src="{{ url('/') }}/assets-web2/assets/images/nilai utama/04.png"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol navigasi swiper -->
                                {{-- <div class="swiper-button-next "
                                    style=" background-image: url('assets-web2/assets/images/swiper/right.png')">
                                </div>
                                <div class="swiper-button-prev"
                                    style=" background-image: url('assets-web2/assets/images/swiper/back-arrow.png')">
                                </div> --}}

                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="card-informasi">
        <div class="achievement-title" style="width: 400px; margin: 0 auto; text-align: center;">
            <h3>Informasi</h3>
            <p
                style="font-weight: 300; font-size: 16px; line-height: 24px; text-align: center; letter-spacing: -.011em; color: #696969;">
                Informasi yang membuka pintu bagi pemahamanmu mengenai hal-hal penting yang ada
                di wbsite ini.</p>
        </div>
        <br>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="container container-card">
                        <a class="card1" href="{{ url('Katalog-Pohon') }}">
                            <label>Katalog Pohon</label>
                            <p class="small">Jelajahi Katalog-Pohon sekarang dan temukan keindahan serta manfaat tak
                                ternilai dari pohon-pohon mangrove di sekitar kita. </p>
                            <div class="go-corner" href="#">
                                <div class="go-arrow">
                                    →
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container container-card">
                        <a class="card1" href="{{ url('Event') }}">
                            <label>Event</label>
                            <p class="small"> Dapatkan pengalaman tak terlupakan sambil berkontribusi langsung pada
                                keberlanjutan lingkungan. Ayo, jadilah bagian dari perubahan positif melalui Event
                                Penanaman
                                Mangrove!</p>
                            <div class="go-corner" href="#">
                                <div class="go-arrow">
                                    →
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container container-card">
                        <a class="card1" href="#">
                            <label>Penanaman</label>
                            <p class="small">Jelajahi Keberhasilan Penanaman Mangrove! Temukan keindahan ekosistem
                                pantai
                                yang dipulihkan melalui penanaman mangrove.</p>
                            <div class="go-corner" href="#">
                                <div class="go-arrow">
                                    →
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="maps">
        <div class="shop-page" style="margin-bottom:150px;margin-top:150px">
            <div class="container">
                <div class="section-wrapper">
                    <div class="row justify-content-center">
                        <div class="achievement-title" style="margin: 0 auto; text-align: center;">
                            <h3>Lokasi Event dan Penanaman</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="card  mt-2" style="border:1px solid #075741">
                                <div class="card-body">
                                    <div id="map-container" class="position-relative">
                                        <div id="map" class="banner-style-2"></div>
                                        <div id="map-overlay">
                                            <p class="overlay-text">Gunakan Ctrl + scroll untuk memperbesar dan
                                                memperkecil peta</p>
                                        </div>
                                    </div>
                                    <div class="mt-2" style="text-align: center; margin-bottom:-15px">
                                        <button onclick="resetMap()" class="btn btn-sm"
                                            style="background-color: #064635; color: white;"><i
                                                class="icofont-loop"></i> Reset Marker</button>
                                        <a href="{{ url('GIS') }}" class="btn btn-sm"
                                            style="background-color: #064635; color: white;"><i
                                                class="icofont-search-map"></i> Jelajahi Peta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        #map-container {
            position: relative;
        }

        #map {
            height: 60vh;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        #map-overlay {
            position: absolute;
            top: 5%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(7, 80, 37, 0.61);
            padding: 10px;
            border-radius: 5px;
            z-index: 9999;
            height: 25px;
        }

        .overlay-text {
            color: white;
            font-size: 16px;
            text-align: center;
            margin: 0;
        }

        .card.card-1 {
            border-radius: 20px;
            padding: 20px;
            color: #fff;
            display: flex;
            background-color: #43936C;
            height: 400px;
        }

        .card-1 .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-1 .text {
            width: 50%;
            margin-left: 100px;
            margin-top: 80px;
        }

        .card-1 img {
            margin-right: 50px;
            margin-top: 50px;
            width: 400px;
            height: 250px;
            object-fit: cover;
            border-radius: 20px;
        }

        .card.card-2 {
            border-radius: 10px;
            padding: 20px;
            color: #fff;
            display: flex;
            background-color: #3181B6;
            height: 400px;
        }

        .card-2 .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-2 .text {
            width: 50%;
            margin-left: 100px;
            margin-top: 80px;
        }

        .card-2 img {
            margin-right: 50px;
            margin-top: 50px;
            width: 400px;
            height: 250px;
            object-fit: cover;
            border-radius: 20px;
        }

        .card.card-3 {
            border-radius: 10px;
            padding: 20px;
            color: #fff;
            display: flex;
            background-color: #CA6634;
            height: 400px;
        }

        .card-3 .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-3 .text {
            width: 50%;
            margin-left: 100px;
            margin-top: 80px;
        }

        .card-3 img {
            margin-right: 50px;
            margin-top: 50px;
            width: 400px;
            height: 250px;
            object-fit: cover;
            border-radius: 20px;
        }

        .card.card-4 {
            border-radius: 10px;
            padding: 20px;
            color: #fff;
            display: flex;
            background-color: #CB344C;
            height: 400px;
        }

        .card-4 .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-4 .text {
            width: 50%;
            margin-left: 100px;
            margin-top: 80px;
        }

        .card-4 img {
            margin-right: 50px;
            margin-top: 50px;
            width: 400px;
            height: 250px;
            object-fit: cover;
            border-radius: 20px;
        }

        .text h3 {
            color: #fff;
        }

        .text p {
            color: #fff;
        }


        .container.container-card {
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        label {
            color: #262626;
            font-size: 17px;
            line-height: 24px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        p {
            font-size: 17px;
            font-weight: 400;
            line-height: 20px;
            color: #000000;

            &.small {
                font-size: 14px;
            }
        }

        .go-corner {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            width: 32px;
            height: 32px;
            overflow: hidden;
            top: 0;
            right: 0;
            background-color: #075741;
            border-radius: 0 4px 0 32px;
        }

        .go-arrow {
            margin-top: -4px;
            margin-right: -4px;
            color: white;
            font-family: courier, sans;
        }

        .card1 {
            display: block;
            position: relative;
            background-color: #f2f8f9;
            border-radius: 4px;
            padding: 32px 24px;
            margin: 12px;
            text-decoration: none;
            z-index: 0;
            overflow: hidden;

            &:before {
                content: "";
                position: absolute;
                z-index: -1;
                top: -16px;
                right: -16px;
                background: #075741;
                height: 32px;
                width: 50px;
                border-radius: 32px;
                transform: scale(1);
                transform-origin: 50% 50%;
                transition: transform 0.25s ease-out;
            }

            &:hover:before {
                transform: scale(21);
            }
        }

        .card1:hover p {
            transition: all 0.3s ease-out;
            color: rgba(255, 255, 255, 0.8);
        }

        .card1:hover label {
            transition: all 0.3s ease-out;
            color: #ffffff;
        }

        .maps {
            position: relative;
            z-index: 5;
        }

        @media only screen and (max-width: 575.99px) {
            .card-1 .text {
                width: 100%;
                margin-left: 0;
                margin-top: 0;
                z-index: 1;
                position: relative;

            }

            .card-1 img {
                position: absolute;
                bottom: 25px;
                left: auto;
                right: auto;
                height: 100px;
                width: 300px;
            }

            .card-2 .text {
                width: 100%;
                margin-left: 0;
                margin-top: 0;
                z-index: 1;
                position: relative;
            }

            .card-2 img {
                position: absolute;
                bottom: 25px;
                left: auto;
                right: auto;
                height: 100px;
                width: 300px;
            }

            .card-3 .text {
                width: 100%;
                margin-left: 0;
                margin-top: 0;
                z-index: 1;
                position: relative;

            }

            .card-3 img {
                position: absolute;
                bottom: 25px;
                left: auto;
                right: auto;
                height: 100px;
                width: 300px;
            }

            .card-4 .text {
                width: 100%;
                margin-left: 0;
                margin-top: 0;
                z-index: 1;
                position: relative;

            }

            .card-4 img {
                position: absolute;
                bottom: 25px;
                left: auto;
                right: auto;
                height: 100px;
                width: 300px;
            }

            #map-overlay {
                display: none;
            }

            .overlay-text {
                display: none;
            }
        }
    </style>
    @push('style')
        <!-- leaflet start -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
            integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
        <link rel="stylesheet" type="text/css"
            href="{{ url('/') }}/assets-web2/assets/css/leaflet.defaultextent.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
        <!-- leaflet end -->
    @endpush
    @push('script')
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
        <script src="{{ url('/') }}/assets-web2/assets/js/leaflet.defaultextent.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/leaflet.markercluster.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endpush
</x-web.app-web>
<script>
    var swiper = new Swiper('.swiper-container', {
        autoplay: {
            delay: 3000,
        },
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function(index, className) {
                return '<span class="' + className + '" style="background-color: white;"></span>';
            },
        },
    });

    var map;
    var eventMarkers = [];
    var tanamanMarkers = [];
    var removedEventMarkers = [];


    // Mendapatkan data marker event dan tanaman dari database
    var eventMarkersData = [];
    <?php foreach ($list_event as $event): ?>
    eventMarkersData.push({
        event_id: <?php echo $event->id; ?>,
        lat: <?php echo $event->lat; ?>,
        lng: <?php echo $event->lng; ?>,
        title: "<?php echo $event->nama_event; ?>",
    });
    <?php endforeach; ?>


    var tanamanMarkersData = [];
    <?php foreach ($list_tanaman as $tanaman): ?>
    tanamanMarkersData.push({
        id: <?php echo $tanaman->id; ?>,
        event_id: <?php echo isset($tanaman->eventPenanaman) ? $tanaman->eventPenanaman->id : 'null'; ?>,
        eventPenanaman: "<?php echo $tanaman->eventPenanaman ? $tanaman->eventPenanaman->nama_event : ''; ?>",
        lat: <?php echo $tanaman->lat; ?>,
        lng: <?php echo $tanaman->lng; ?>,
        lokasi: "<?php echo $tanaman->lokasi; ?>",
        sample: "<?php echo $tanaman->sample; ?>",
        tanggal_penanaman: "<?php echo date('d M Y', strtotime($tanaman->tanggal_penanaman)); ?>",
        jenis_mangrove: "<?php echo $tanaman->jenis_mangrove; ?>",
        jenis_tanah: "<?php echo $tanaman->jenis_tanah; ?>",
        masa_tumbuh: "<?php echo $tanaman->masa_tumbuh; ?>",
        umur_tanaman: "<?php echo $tanaman->umur_tanaman; ?>",
        foto: "<?php echo $tanaman->foto; ?>",
        deskripsi: "<?php echo $tanaman->deskripsi; ?>",
        status_penanaman: "<?php echo $tanaman->status_penanaman; ?>"
    });
    <?php endforeach; ?>

    // Custom icon untuk event
    var greenIcon = L.icon({
        iconUrl: '{{ url('/') }}/assets-web2/assets/images/icon/calendar.png',
        iconSize: [32, 35], 
        iconAnchor: [16, 32] 
    });

    // Custom icon untuk penanaman
    var redIcon = L.icon({
        iconUrl: '{{ url('/') }}/assets-web2/assets/images/icon/tree.png',
        iconSize: [32, 35],
        iconAnchor: [16, 32]
    });


    function initMap() {
        // Membuat peta
        map = L.map('map').setView([-1.790597, 110.410990], 8);
        // Menonaktifkan zoom menggunakan scroll mouse
        map.scrollWheelZoom.disable();
        // Menambahkan event listener untuk mengatur zoom dengan Ctrl + scroll
        document.getElementById('map').addEventListener('wheel', function(event) {
            if (event.ctrlKey) {
                event.preventDefault();
                event.stopPropagation();
                var zoomStep = 1;
                var zoom = map.getZoom();
                if (event.deltaY < 0) {
                    map.setZoom(zoom + zoomStep);
                } else {
                    map.setZoom(zoom - zoomStep);
                }
            }
        });
        // Menambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>  contributors | Bayu Pratama'
        }).addTo(map);

        // Menambahkan marker event ke peta
        eventMarkersData.forEach(function(markerData) {
            var marker = L.marker([markerData.lat, markerData.lng], {
                icon: greenIcon
            }).addTo(map);
            marker.bindTooltip(markerData.title, {
                permanent: false,
                direction: 'top',
                offset: [0, -25]

            });
            // Menyimpan event_id sebagai properti pada marker
            marker.event_id = markerData.event_id;

            // Menambahkan event listener pada marker event
            marker.on('click', function() {

                // Menyembunyikan semua marker event yang lain
                eventMarkers.forEach(function(eventMarker) {
                    if (eventMarker !== this) {
                        eventMarker.setOpacity(0);
                    }
                }, this);

                // Menghapus marker event yang saat ini ditekan
                var currentEventMarkerIndex = eventMarkers.indexOf(this);
                if (currentEventMarkerIndex > -1) {
                    var removedMarker = eventMarkers.splice(currentEventMarkerIndex, 1)[0];
                    removedEventMarkers.push(removedMarker);
                    removedMarker.removeFrom(map);
                }

                // Menyembunyikan marker tanaman yang tidak sesuai dengan event_id
                clearTanamanMarkers();
                tanamanMarkersData.forEach(function(tanamanMarkerData) {
                    if (tanamanMarkerData.event_id === this.event_id) {
                        var tanamanMarker = L.marker([tanamanMarkerData.lat, tanamanMarkerData
                            .lng
                        ], {
                            icon: redIcon
                        }).addTo(map);
                        // Mengatur offset vertikal untuk popup
                        var popupOffset = L.point(0, -tanamanMarker.options.icon.options
                            .iconSize[1] / 2);
                        tanamanMarker.bindPopup(`
                            <div class="popup-content" style="max-height: 200px; overflow-y: auto; width: 250px;">
                                <label style="color:black; font-weight:bolder; display: flex; align-items: center; justify-content: center;">
                                    Detail Penanaman
                                </label>
                                <table class="table table-sm mt-2">
                                    <tbody>
                                        <tr>
                                            <td style="width:145px">Lokasi</td>
                                            <td>${tanamanMarkerData.lokasi}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Event Penanaman</td>
                                            <td>${tanamanMarkerData.eventPenanaman}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Sample Penanaman</td>
                                            <td>${tanamanMarkerData.sample}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Tanggal Penanaman</td>
                                            <td>${tanamanMarkerData.tanggal_penanaman}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Jenis Mangrove</td>
                                            <td>${tanamanMarkerData.jenis_mangrove}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Masa Pembibitan</td>
                                            <td>${tanamanMarkerData.masa_tumbuh}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Umur Tanaman Saat Ditanam</td>
                                            <td>${tanamanMarkerData.umur_tanaman}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Foto</td>
                                            <td><img src="${tanamanMarkerData.foto}" loading="lazy" class="img-fluid"></td>
                                        </tr>
                                    </tbody>                   
                                </table>
                                <hr>
                                <label style="color:black; font-weight:bolder; display: flex; align-items: center; justify-content: center;">
                                    Deskripsi Penanaman
                                </label>
                                <div>
                                    <p style="text-align: justify; color:black; font-size:12px; margin-right:15px">${tanamanMarkerData.deskripsi}</p>
                                </div>
                                <hr>
                            </div>
                        `, {
                            offset: popupOffset
                        });
                        tanamanMarkers.push(tanamanMarker);
                    }
                }, this);

                // Mengarahkan peta ke marker tanaman dengan animasi zoom
                if (tanamanMarkers.length > 0) {
                    var selectedTanamanMarker = tanamanMarkers[0];
                    map.flyTo(selectedTanamanMarker.getLatLng(), 10, {
                        duration: 2, //detik
                        easeLinearity: 0.5
                    });
                }
            });

            eventMarkers.push(marker);
        });

        // Menambahkan tombol "Reset Marker"
        var resetButton = L.control({
            position: 'bottomright'
        });

        resetButton.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'reset-button');
            div.innerHTML = '';
            return div;
        };

        resetButton.addTo(map);


    }

    function clearTanamanMarkers() {
        tanamanMarkers.forEach(function(tanamanMarker) {
            map.removeLayer(tanamanMarker);
        });
        tanamanMarkers = [];
    }
    function resetMap() {
        // Menghapus semua marker event yang telah dihapus sebelumnya
        removedEventMarkers.forEach(function(removedMarker) {
            removedMarker.addTo(map);
            eventMarkers.push(removedMarker);

        });
        removedEventMarkers = [];

        // Menampilkan kembali semua marker event
        eventMarkers.forEach(function(eventMarker) {
            eventMarker.setOpacity(1);

        });

        // Menghapus semua marker tanaman
        clearTanamanMarkers();

        // Mengembalikan tampilan peta seperti semula dengan animasi zoom in
        map.setView([-1.790597, 110.410990], 8, {
            animate: true,
            duration: 2,
        });

        // Reset checked status for checkboxes
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });
    }

    // Event listener untuk mengubah tampilan marker berdasarkan pilihan event
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener("change", function() {
            if (checkbox.checked) {
                // Menyembunyikan semua marker event yang lain
                eventMarkers.forEach(function(eventMarker) {
                    if (eventMarker !== this) {
                        eventMarker.setOpacity(0);
                    }
                }, this);
            }
            filterMarkers();
        });
    });

    window.onload = initMap;
</script>
