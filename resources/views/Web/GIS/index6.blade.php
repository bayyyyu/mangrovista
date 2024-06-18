<!DOCTYPE html>
<html>

<head>
    <title>Peta</title>
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

</head>
<style>

</style>

<body>
    <!-- Banner Section Start Here -->
    <x-web.layout.header />
    <!-- Banner Section Ending Here -->

    <div id="sidebar" class="sidebar collapsed">
        <!-- Nav tabs -->
        <div class="sidebar-tabs">
            <ul role="tablist">
                <li><a href="#home" role="tab"><i class="fa fa-bars"></i></a></li>
            </ul>
        </div>

        <!-- Tab panes -->
        <div class="sidebar-content">
            <div class="sidebar-pane" id="home">
                <h1 class="sidebar-header">
                    Pilih Event Berdasarkan
                    Lokasi:
                    <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>
                <div id="tools" class="tab-pane fade show active mt-5" style="height: 100%">
                    <div class="search-container">
                        <input type="text" id="search-input" placeholder="Cari lokasi..."
                            style="width: 70%; height:30px; padding-bottom: 4px; padding:5px; color:black"
                            onkeydown="handleSearch(event)">
                        <button onclick="searchEvent()" class="btn btn-sm"
                            style="background-color: #064635;color: white;">Cari
                        </button>
                        <button class="search-clear btn btn-sm"
                            style="border-color: #064635; color: #064635; display: inline-block; background:transparent"
                            id="clear-button">Clear
                        </button>
                    </div>
                    <hr>
                    <div class="select-product size">
                        <select class="mb-2" name="year" id="year" onchange="filterEvents()">
                            <option value="all">Semua Tahun</option>
                            @php
                                $sortedYears = $years;
                                sort($sortedYears);
                            @endphp
                            @foreach ($sortedYears as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        <i class="fas fa-angle-down"></i>
                    </div>

                    <div>
                        <p style="color: #064635">Daftar Event</p>
                        @foreach ($list_event as $event)
                            @php
                                $eventYear = date('Y', strtotime($event->tanggal_event));
                            @endphp
                            <div id="event-checkboxes-{{ $eventYear }}" class="event-checkboxes"
                                style="display: none;">
                                <input type="checkbox" id="event-checkbox-{{ $event->id }}"
                                    value="{{ $event->id }}" onchange="filterMarkers()" data-group="event">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="event-checkbox-{{ $event->id }}"
                                            style=" color:#064635">{{ $event->nama_event }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <p id="no-data-message" style="display: none; color: rgb(14, 14, 14);">Tidak ada data yang
                            cocok</p>
                    </div>

                    <hr>
                    {{-- <div class="mt-3" style="text-align: center; ">
                    <button onclick="resetMap()" class="btn"
                        style="background-color: #064635; color: white;">Tampilkan Kembali
                        Semua
                        Marker Event</button>
                </div> --}}
                </div>
            </div> 
        </div>
    </div>
    <div id="map" class="sidebar-map" style="height: 86vh"></div>
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

</body>
<style>
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

    .leaflet-marker-pane {
        z-index: 655;
    }

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
</style>

</html>
<script>
    var map;
    var noDataPopup;
    // Mendapatkan data marker event dan tanaman dari database
    var LokasiMarkersData = [];
    @foreach ($list_lokasi as $lokasi)

        LokasiMarkersData.push({
            lokasi_id: {{ $lokasi->id }},
            lat: {{ $lokasi->lat }},
            lng: {{ $lokasi->lng }},
            title: "{{ $lokasi->nama_lokasi }}",
            alamat: "{{ $lokasi->alamat_lokasi }}",
            foto: "{{ $lokasi->foto_lokasi }}",
            jumlahEvent: "{{ $lokasi->events()->count() }}",
        });
    @endforeach

    // Custom icon untuk event
    var greenIcon = L.icon({
        iconUrl: '{{ url('/') }}/assets-web2/assets/images/icon/calendar-3.png',
        iconSize: [32, 35],
        iconAnchor: [16, 32],
        className: 'marker-custom'
    });

    function initMap() {
        var LokasiMarkers = [];
        // Membuat peta
        map = new L.Map('map', {
            fullscreenControl: true,
            fullscreenControlOptions: {
                position: 'topleft'
            }
        }).setView([-1.790597, 110.410990], 10);

        // Menambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors | Bayu Pratama'
        }).addTo(map);

        LokasiMarkersData.forEach(function(markerData) {
            var marker = L.marker([markerData.lat, markerData.lng], {
                icon: greenIcon,
                tags: [markerData.tags]
            }).addTo(map);
            marker.bindPopup(`
                    <div class="popup-content" style="max-height: 200px; overflow-y: auto; width: 250px; padding-right:10px">
                        <label style="
                                color: black;
                                font-weight: bolder;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            ">
                            Detail Lokasi
                        </label>
                        <div class="modal-content">
                            <img src="${markerData.foto}" style="
                                    width: 100%;
                                    height: auto;
                                    border-radius: 5px;
                                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                                    border: 1px solid #00947c;
                                " class="image" loading="lazy" />
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
                                    <td style="text-align: justify">${markerData.alamat}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ url('Lokasi-Penanaman', $lokasi->nama_lokasi) }}" class="btn btn-green btn-sm float-right" style="color:white">Lihat Detail</a>
                    </div>
                `, {
                offset: [0, -25] // Atur offset horizontal dan vertikal
            });
            LokasiMarkers.push(marker);
        });


        //shape awalan seluruh ketapang
        $.getJSON('{{ url('/') }}/assets-sig/assets/Ketapang.geojson', function(json) {
            geoLayer = L.geoJson(json, {
                style: function(feature) {
                    return {
                        fillOpacity: 5,
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
        $.getJSON('{{ url('/') }}/assets-sig/assets/geojson-ketapang/kab_ketapang.geojson', function(
            json) {
            var geoLayer = L.geoJson(json, {
                style: function(feature) {
                    return {
                        fillOpacity: 0,
                        weight: 0.5,
                        opacity: 1,
                        color: '#064635'
                    };
                },
                onEachFeature: function(feature, layer) {
                    layer.addTo(map);
                    layer.getElement().classList.add('dashed');
                }
            }).addTo(map);
        });

        // Mengurutkan tahun-tahun unik secara menaik
        const sortedYears = {!! json_encode($years) !!}.sort((a, b) => a - b);

        // Legend
        L.control.Legend({
            position: "bottomright",
            legends: [{

                    label: ": Lokasi",
                    type: "image",
                    url: "{{ url('/') }}/assets-web2/assets/images/icon/calendar-3.png",
                }

            ]
        }).addTo(map);

        // kontrol sidebar
        var sidebar = L.control.sidebar('sidebar').addTo(map);


        // Menambahkan tombol "Tampilkan Semua Marker Event"
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

    window.onload = function() {
        // Periksa apakah opsi "Semua Tahun" dipilih saat halaman dimuat
        var selectedYear = document.getElementById('year').value;
        if (selectedYear === 'all') {
            // Jika opsi "Semua Tahun" dipilih, tampilkan semua checkbox
            document.querySelectorAll('.event-checkboxes').forEach(function(checkboxDiv) {
                checkboxDiv.style.display = 'block';
            });
        }
        initMap(); // Panggil fungsi untuk inisialisasi peta
        setMapHeight()
        var clearButton = document.getElementById('clear-button');
        clearButton.addEventListener('click', function() {
            clearSearch();
            resetMap();
        });
    };

    function setMapHeight() {
        const headerHeight = $(".header-section").height()
        const mapHeight = $(window).height() - headerHeight
        $("#map").height(mapHeight)
    }

    $(document).ready(function() {
        $('.nav-link').on('click', function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');

            // Ambil ID tab yang diklik
            var target = $(this).attr('href');

            // Sembunyikan semua konten tab
            $('.tab-pane').removeClass('show active');

            // Tampilkan konten tab yang sesuai dengan ID yang diklik
            $(target).addClass('show active');
        });
        // Event listener untuk perubahan status checkbox
        $('input[type="checkbox"]').on('change', function() {
            var selectedEventIds = [];
            $('input[type="checkbox"]:checked').each(function() {
                selectedEventIds.push($(this).val());
            });
            filterMarkers(selectedEventIds);
        });

    });
</script>
