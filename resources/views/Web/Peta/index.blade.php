<!DOCTYPE html>
<html>

<head>
    <title>Lokasi Penanaman</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.Default.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/assets-web2/assets/images/x-icon/6.png">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/all.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/icofont.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/lightcase.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/swiper.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/style.css">
    <!-- leaflet start -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets-web2/assets/css/leaflet.defaultextent.css">
    <script src="{{ url('/') }}/assets-web2/assets/js/leaflet.defaultextent.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    <!-- leaflet end -->
    <link rel="stylesheet" href="{{ url('/') }}/assets-sig/assets/css/Control.FullScreen.css" />

    <!-- filter button -->
    <link rel="stylesheet" href="{{ url('/') }}/assets-sig/assets/css/leaflet-tag-filter-button.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets-sig/assets/css/leaflet-easy-button.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets-sig/assets/css/ripple.min.css" />

    <!-- legend -->
    <link rel="stylesheet" href="{{ url('/') }}/assets-sig/assets/css/leaflet.legend.css" />
    <!-- leaflet sidebarv2 -->
    <link rel="stylesheet" href="{{ url('/') }}/assets-sig/assets/css/leaflet-sidebar.css" />

    <!-- Marker Cluster -->
    <link rel="stylesheet" href="{{ url('/') }}/assets-sig/assets/css/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets-sig/assets/css/MarkerCluster.css" />


    <link href="{{ url('/') }}/assets-admin/dastone/plugins/select2/select2.min.css" rel="stylesheet"
        type="text/css" />

    <!-- ResetView -->
    <link rel="stylesheet" href="{{ url('/') }}/assets-sig/dist/L.Control.ResetView.min.css" />
</head>

<body>
    <!-- Banner Section Start Here -->
    <x-web.layout.header />
    <!-- Banner Section Ending Here -->
    <div id="map">
        <div class="custom-select">
            <select class="select2 form-control mb-3" id="lokasi-select">
                <option>---Pilih Lokasi---</option>
                @foreach ($list_lokasi as $lokasi)
                    <option value="{{ $lokasi->id }}" data-lat="{{ $lokasi->lat }}"
                        data-lng="{{ $lokasi->lng }}">{{ $lokasi->nama_lokasi }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-swoosh-up"></i><span class="pluse_1"></span><span
            class="pluse_2"></span></a>
    <!-- scrollToTop ending here -->

    <script src="{{ url('/') }}/assets-web2/assets/js/jquery.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/fontawesome.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/waypoints.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/swiper.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/jquery.countdown.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/lightcase.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/functions.js"></script>


    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/leaflet.markercluster.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ url('/') }}/assets-sig/assets/js/Control.FullScreen.js"></script>
    <script src="{{ url('/') }}/assets-sig/assets/js/leaflet-tag-filter-button.js"></script>
    <script src="{{ url('/') }}/assets-sig/assets/js/leaflet-easy-button.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="{{ url('/') }}/assets-sig/assets/js/leaflet.legend.js"></script>
    <script src="{{ url('/') }}/assets-sig/assets/js/leaflet-sidebar.js"></script>

    <!-- Marker Cluster -->
    <script src="{{ url('/') }}/assets-sig/assets/js/leaflet.markercluster.js"></script>
    <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>

    <!-- select lokasi -->
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/select2/select2.min.js"></script>

    <!-- ResetView -->
    <script src="{{ url('/') }}/assets-sig/dist/L.Control.ResetView.min.js"></script>

</body>
<style>
    body,
    html {
        height: 100%;
    }

    /* Atur tinggi peta agar sesuai dengan viewport, kurang elemen lain */
    #map {
        height: 100vh;
        /* 100% tinggi viewport */
        position: relative;
    }

    /* Gaya untuk elemen select */
    .custom-select {
        position: absolute;
        top: 15px;
        left: 15px;
        width: 300px;
        z-index: 1000;
        /* Pastikan berada di atas elemen peta */
        background-color: white;
        border-radius: 5px;
        padding: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        /* Bayangan untuk menonjolkan elemen */
    }

    .leaflet-tooltip.custom-tooltip {
        font-size: 10px;
        background: transparent;
        border: 0;
        box-shadow: none;
        color: #fff;
        font-weight: bold;
        text-shadow: 1px 1px 1px #000, -1px 1px 1px #000, 1px -1px 1px #000, -1px -1px 1px #000;
        z-index: -1;
    }

    /* .leaflet-marker-pane {
        z-index: 455;
    } */

    .dashed {
        stroke-dasharray: 5, 5;
        /* Atur pola putus-putus di sini */
    }

    .form-select {
        color: #064635;
        /* Menambahkan warna teks */
        border-color: #064635;
        border: 1px solid #064635;
    }

    .form-select:focus {
        /* Menambahkan warna teks */
        border-color: #064635;
        box-shadow: 0 0 0 0;
    }

    /* Gaya untuk panah dropdown */
    .form-select::after {
        border-top-color: white;
        /* Menambahkan warna panah */
    }

    /* Ini adalah kode CSS kustom untuk panah dropdown */
    .form-select::after {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: .255em;
        vertical-align: .255em;
        content: "";
        border-top: .3em solid;
        border-right: .3em solid transparent;
        border-bottom: 0;
        border-left: .3em solid transparent;
    }

    /* Gaya umum untuk label checkbox */
    .event-checkboxes input[type="checkbox"] {
        display: none;
        /* Sembunyikan checkbox asli */
    }

    .event-checkboxes label {
        position: relative;
        padding-left: 25px;
        /* Ruang untuk kotak checkbox kustom */
        cursor: pointer;
        user-select: none;
    }

    /* Kotak checkbox kustom */
    .event-checkboxes label::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 14px;
        height: 14px;
        border: 1px solid #064635;
        /* Warna border checkbox */
        border-radius: 3px;
        /* Sesuaikan dengan bentuk yang diinginkan */
        background-color: white;
        /* Warna background checkbox */
        margin-top: 3px;
    }

    /* Tampilan checkbox aktif */
    .event-checkboxes input[type="checkbox"]:checked+label::before {
        background-color: #064635;
        /* Warna background checkbox aktif */
        border-color: #064635;
        /* Warna border checkbox aktif */
    }

    /* Tambahkan tanda centang */
    .event-checkboxes input[type="checkbox"]:checked+label::after {
        content: "";
        position: absolute;
        left: 4px;
        top: 3px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(25deg);
    }

    /**/
    .card-header {
        background-color: #F6FFF7;

    }

    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #064635;
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #064635;
    }

    .maps {
        z-index: 5;
    }

    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: scale(1);
        }

        40% {
            transform: scale(1.4);
        }

        60% {
            transform: scale(1.6);
        }
    }

    .bounce-marker {
        animation: bounce 10s;
    }

    .custom-marker {
        z-index: -999 !important
    }

    @media (max-width: 768px) {
        #map {
            margin-top: 70px;
            height: 100vh;
        }
    }
</style>

</html>
<script>
    var map;
    var markers = L.markerClusterGroup();

    var LokasiMarkersData = [];
    @foreach ($list_lokasi as $lokasi)
        LokasiMarkersData.push({
            lokasi_id: "{{ $lokasi->id }}",
            lat: {{ $lokasi->lat }},
            lng: {{ $lokasi->lng }},
            title: "{{ $lokasi->nama_lokasi }}",
            alamat: "{{ $lokasi->alamat_lokasi }}",
            foto: "{{ $lokasi->foto_lokasi }}",
            jumlahEvent: "{{ $lokasi->events()->count() }}",
            jumlahPohon: "{{ $lokasi->total_pohon_ditanam }}",
        });
    @endforeach

    var EventMarkersData = [];
    @foreach ($list_event as $event)
        @php
            // Hitung status acara
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
        EventMarkersData.push({
            event_id: "{{ $event->id }}",
            lat: {{ $event->lat }},
            lng: {{ $event->lng }},
            foto: "{{ $event->foto }}",
            title: "{{ $event->nama_event }}",
            lokasi_id: "{{ $event->lokasi_id ? $event->lokasi_id : 'Tidak tersedia' }}",
            lokasi: "{{ $event->lokasi ? $event->lokasi->nama_lokasi : 'Lokasi tidak tersedia' }}",
            pohonDitanam: "{{ $event->tanaman_event->jumlah_pohon }}",
            status: "{{ $status }}",
            statusClass: "{{ $statusClass }}"
        });
    @endforeach

    // Custom icon untuk lokasi
    var greenIcon = L.icon({
        iconUrl: '{{ url('/') }}/assets-sig/assets/icon/lokasi.png',
        iconSize: [32, 35],
        iconAnchor: [16, 32],
        className: 'marker-custom'
    });
    // Custom icon untuk penanaman
    var redIcon = L.icon({
        iconUrl: '{{ url('/') }}/assets-sig/assets/icon/event.png',
        iconSize: [32, 35],
        iconAnchor: [16, 32]
    });

    function initMap() {
        // Membuat peta
        map = new L.Map('map', {
            fullscreenControl: true,
            fullscreenControlOptions: {
                position: 'topright'
            }
        });

        // Menambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors | Bayu Pratama'
        }).addTo(map);

        // Tentukan koordinat pusat peta untuk desktop
        var desktopCenter = [-1.790597, 110.410990];
        // Tentukan koordinat pusat peta untuk mobile
        var mobileCenter = [-1.790597, 110.410990]; // Sesuaikan dengan koordinat yang sesuai untuk mobile

        // Tentukan zoom level untuk desktop dan mobile
        var desktopZoom = 10;
        var mobileZoom = 8; // Sesuaikan dengan zoom level yang sesuai untuk mobile

        // Tentukan tinggi elemen mobile-header
        var mobileHeaderHeight = $('.mobile-header').outerHeight() || 0;

        // Tentukan apakah perangkat saat ini adalah mobile
        var isMobile = $(window).width() <= 768;

        // Tentukan koordinat pusat dan zoom level berdasarkan ukuran layar
        var center = isMobile ? mobileCenter : desktopCenter;
        var zoomLevel = isMobile ? mobileZoom : desktopZoom;

        // Set view pada peta
        map.setView(center, zoomLevel);


        LokasiMarkersData.forEach(function(markerData) {
            var marker = L.marker([markerData.lat, markerData.lng], {
                icon: greenIcon,
                tags: [markerData.tags]
            });

            marker.bindPopup(`
                <div class="popup-content" style="max-height: 200px; overflow-y: auto; width: 250px; padding-right:10px">
                    <label style="color: black; font-weight: bolder; display: flex; align-items: center; justify-content: center;">Detail Lokasi</label>
                    <div class="modal-content">
                        <img src="${markerData.foto}" style="width: 100%; height: auto; border-radius: 5px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px solid #00947c;" class="image" loading="lazy" />
                    </div>
                    <table class="table table-bordered table-sm mt-2">
                        <tbody>
                            <tr>
                                <td>Lokasi</td>
                                <td style="text-align: justify">${markerData.title}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td style="text-align: justify">${markerData.alamat}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Event</td>
                                <td style="text-align: justify">${markerData.jumlahEvent}</td>
                            </tr>
                            <tr>
                                <td>Pohon Ditanam</td>
                                <td style="text-align: justify">${markerData.jumlahPohon}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ url('Lokasi-Penanaman') }}/${markerData.lokasi_id}/${markerData.title}" class="btn btn-green btn-sm float-right" style="color:white">Detail Lokasi</a>
                </div>
            `, {
                offset: [0, -25] // Atur offset horizontal dan vertikal
            });

            markers.addLayer(marker); // Tambahkan marker ke dalam marker cluster
        });

        EventMarkersData.forEach(function(markerData) {
            var marker = L.marker([markerData.lat, markerData.lng], {
                icon: redIcon,
                tags: [markerData.tags]
            });

            marker.bindPopup(`
                <div class="popup-content" style="max-height: 200px; overflow-y: auto; width: 250px; padding-right:10px">
                    <label style="color: black; font-weight: bolder; display: flex; align-items: center; justify-content: center;">Detail Event</label>
                    <div class="modal-content">
                        <img src="${markerData.foto}" style="width: 100%; height: auto; border-radius: 5px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px solid #00947c;" class="image" loading="lazy" />
                    </div>
                    <table class="table table-bordered table-sm mt-2">
                        <tbody>
                            <tr>
                                <td>Nama Event</td>
                                <td style="text-align: justify">${markerData.title}</td>
                            </tr>
                            <tr>
                                <td>Lokasi</td>
                                <td style="text-align: justify">${markerData.lokasi}</td>
                            </tr>
                            <tr>
                                <td>Pohon Ditanam</td>
                                <td style="text-align: justify">${markerData.pohonDitanam}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td style="text-align: justify" class="${markerData.statusClass}">${markerData.status}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ url('Event') }}/${markerData.event_id}" class="btn btn-green btn-sm float-right" style="color:white">Detail Event</a>
                </div>
            `, {
                offset: [0, -25] // Atur offset horizontal dan vertikal
            });

            markers.addLayer(marker); // Tambahkan marker ke dalam marker cluster

            // Menambahkan garis penghubung dari marker event ke marker lokasi terkait
            // var latlngs = [
            //     [markerData.lat, markerData.lng],
            //     [LokasiMarkersData.find(l => l.lokasi_id === markerData.lokasi_id).lat, LokasiMarkersData
            //         .find(l => l.lokasi_id === markerData.lokasi_id).lng
            //     ]
            // ];

            // var polyline = L.polyline(latlngs, {
            //     color: 'blue',
            //     weight: 1.5
            // }).addTo(map);
        });

        map.addLayer(markers); // Tambahkan marker cluster ke dalam peta
        // map.fitBounds(markers.getBounds());

        //shape awalan seluruh ketapang
        $.getJSON('{{ url('/') }}/assets-sig/assets/Ketapang.geojson', function(json) {
            geoLayer = L.geoJson(json, {
                style: function(feature) {
                    return {
                        fillOpacity: 0.6,
                        weight: 1,
                        opacity: 1,
                        color: '#44A688'
                    };
                },
                onEachFeature: function(fetaure, layer) {
                    layer.addTo(map);
                }
            });
        });

        L.control.resetView({
            position: "topright",
            title: "Reset view",
            latlng: L.latLng([-1.790597, 110.410990]),
            zoom: zoomLevel,
        }).addTo(map);

        // Legend
        L.control.Legend({
            className: "legend-custom",
            position: "bottomright",
            legends: [{
                    label: ": Lokasi",
                    type: "image",
                    url: "{{ url('/') }}/assets-sig/assets/icon/lokasi.png",
                },
                {
                    label: ": Event",
                    type: "image",
                    url: "{{ url('/') }}/assets-sig/assets/icon/event.png",
                },
            ]
        }).addTo(map);
    }

    // Fungsi untuk menambahkan marker dengan SVG ke peta dan menghapusnya setelah 5 detik
    function addTemporaryMarker(map, lat, lng) {
        // Definisikan SVG dan buat ikon menggunakan L.divIcon
        var svg =
            '<svg pointer-events="none" class="leaflet-marker-icon bounce-marker" width="24" height="24" viewBox="0 0 24 24" fill="#000000" style="z-index-1"><circle cx="12" cy="12" r="10" stroke="#e03" stroke-width="3" fill="none"></circle></svg>';
        var icon = L.divIcon({
            className: 'custom-marker',
            html: svg,
            iconAnchor: [12, 10]
        });

        // Tambahkan marker ke peta
        var marker = L.marker([lat, lng], {
            icon: icon
        }).addTo(map);

        // Gunakan setTimeout untuk menghapus marker setelah 5 detik (5000 ms)
        setTimeout(function() {
            map.removeLayer(marker);
        }, 8000);
    }

    // Panggil fungsi addTemporaryMarker ketika peta diinisialisasi atau saat Anda memerlukannya
    window.onload = function() {
        initMap();

        // Contoh penggunaan: tambahkan marker sementara di posisi tertentu
        addTemporaryMarker(map, -1.790597, 110.410990);
    };

    window.onload = function() {
        initMap();
        var marker;

        $('#lokasi-select').change(function() {
            // Hapus marker sebelumnya jika ada
            if (marker) {
                map.removeLayer(marker);
            }

            // Dapatkan nilai lat dan lng dari opsi yang dipilih
            var selectedOption = $(this).find('option:selected');
            var lat = parseFloat(selectedOption.data('lat'));
            var lng = parseFloat(selectedOption.data('lng'));

            // Panggil fungsi addTemporaryMarker dengan koordinat yang dipilih
            addTemporaryMarker(map, lat, lng);
            // Gunakan metode flyTo untuk mengarahkan peta ke lokasi marker yang sesuai
            map.flyTo([lat, lng], 20, {
                animate: true,
                duration: 5,
                easeLinearity: 1,
                noMoveStart: true
            });

            // var svg =
            //     '<svg pointer-events="none" class="leaflet-marker-icon bounce-marker" width="24" height="24" viewBox="0 0 24 24" fill="#000000" style="z-index-1"><circle cx="12" cy="12" r="10" stroke="#e03" stroke-width="3" fill="none"></circle></svg>';
            // var icon = L.divIcon({
            //     className: 'custom-marker',
            //     html: svg,
            //     iconAnchor: [12, 10]
            // });

            marker = L.marker([lat, lng], {
                icon: icon
            }).addTo(map);


            marker.bringToBack();
        });
    };

    $(document).ready(function() {
        // Inisialisasi select2 pada elemen select
        $('.select2').select2();

        // Panggil fungsi resizeMap saat halaman dimuat dan setiap kali jendela diubah ukurannya
        resizeMap();
        $(window).resize(resizeMap);

        // Fungsi untuk mengubah ukuran peta sesuai dengan tinggi viewport
        function resizeMap() {
            var headerHeight = $('header').outerHeight() || 0;
            var mobileHeaderHeight = $('.mobile-header').outerHeight() || 0;
            var viewportHeight = $(window).height();
            var isMobile = $(window).width() <= 768;

            // Jika di mobile, sesuaikan tinggi dengan mobile-header, selain itu sesuaikan dengan header
            var mapHeight = isMobile ? viewportHeight - mobileHeaderHeight : viewportHeight - headerHeight;

            $('#map').css('height', mapHeight + 'px');
        }
    });
</script>
