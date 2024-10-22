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
                <li><a href="#profile" role="tab"><i class="fa fa-map"></i></a></li>
            </ul>
            <ul role="tablist">
                <li><a href="#settings" role="tab"><i class="fa fa-gear"></i></a></li>
            </ul>
        </div>

        <!-- Tab panes -->
        <div class="sidebar-content">
            <div class="sidebar-pane" id="home">
                <h1 class="sidebar-header">
                    Pilih Penanaman Berdasarkan
                    Event:
                    <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>
                <div id="tools" class="tab-pane fade show active mt-5" style="height: 100%">
                    <div class="search-container">
                        <input type="text" id="search-input" placeholder="Cari nama event..."
                            style="width: 70%; height:30px; padding-bottom: 4px; padding:5px; color:black"
                            onkeydown="handleSearch(event)">
                        <button class="search-clear btn btn-sm"
                            style="border-color: #064635; color: #064635; display: inline-block;"
                            id="clear-button">Clear
                        </button>
                        <button onclick="searchEvent()" class="btn btn-sm"
                            style="background-color: #064635;color: white;">Cari
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
                        @foreach ($list_event->where('status', 'Diterima') as $event)
                            @php
                                $eventYear = date('Y', strtotime($event->tanggal_event));
                            @endphp
                            <div id="event-checkboxes-{{ $eventYear }}" class="event-checkboxes"
                                style="display: none;">
                                <input type="checkbox" id="event-checkbox-{{ $event->id }}"
                                    value="{{ $event->id }}" onchange="filterMarkers()">
                                <label for="event-checkbox-{{ $event->id }}"
                                    style="white-space: nowrap; color:#064635">{{ $event->nama_event }}</label>
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
            <div class="sidebar-pane" id="profile">
                <h1 class="sidebar-header">Shape Desa<span class="sidebar-close"><i
                            class="fa fa-caret-left"></i></span>
                </h1>
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
    <script src="{{ url('/') }}/assets-sig/assets/js/MarkerCluster.Default.js"></script>
    <script src="{{ url('/') }}/assets-sig/assets/js/MarkerCluster.js"></script>
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
    var eventMarkers = [];
    var tanamanMarkers = [];
    var removedEventMarkers = [];
    var noDataPopup;


    // Mendapatkan data marker event dan tanaman dari database
    var eventMarkersData = [];
    @foreach ($list_event as $event)
        @if ($event->status == 'Diterima')
            eventMarkersData.push({
                event_id: {{ $event->id }},
                lat: {{ $event->lat }},
                lng: {{ $event->lng }},
                title: "{{ $event->nama_event }}",
                tanggal_event: "{{ $event->tanggal_event }}",
                tags: "{{ \Carbon\Carbon::parse($event->tanggal_event)->year }}",
            });
        @endif
    @endforeach

    var tanamanMarkersData = [];
    @foreach ($list_tanaman as $tanaman)
        tanamanMarkersData.push({
            id: {{ $tanaman->id }},
            event_id: {{ $tanaman->eventPenanaman ? $tanaman->eventPenanaman->id : 'null' }},
            eventPenanaman: "{{ $tanaman->eventPenanaman ? $tanaman->eventPenanaman->nama_event : '' }}",
            lat: {{ $tanaman->lat }},
            lng: {{ $tanaman->lng }},
            lokasi: "{{ $tanaman->lokasi }}",
            sample: "{{ $tanaman->sample }}",
            tanggal_penanaman: "{{ date('d M Y', strtotime($tanaman->tanggal_penanaman)) }}",
            jenis_mangrove: "{{ $tanaman->jenis_mangrove }}",
            jenis_tanah: "{{ $tanaman->jenis_tanah }}",
            masa_tumbuh: "{{ $tanaman->masa_tumbuh }}",
            umur_tanaman: "{{ $tanaman->umur_tanaman }}",
            foto: "{{ $tanaman->foto }}",
            deskripsi: "{{ $tanaman->deskripsi }}",
            status_penanaman: "{{ $tanaman->status_penanaman }}"
        });
    @endforeach

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

    function filterEvents() {
        var selectedYear = document.getElementById('year').value;
        var allEventCheckboxes = document.querySelectorAll('.event-checkboxes');

        allEventCheckboxes.forEach(function(checkboxDiv) {
            checkboxDiv.style.display = 'none';
        });

        if (selectedYear === 'all') {
            document.querySelectorAll('.event-checkboxes').forEach(function(checkboxDiv) {
                checkboxDiv.style.display = 'block';
            });
        } else {
            var selectedEventCheckboxes = document.querySelectorAll('#event-checkboxes-' + selectedYear);
            selectedEventCheckboxes.forEach(function(checkboxDiv) {
                checkboxDiv.style.display = 'block';
            });
        }

        // Hide no data message when filtering by year
        var noDataMessage = document.getElementById('no-data-message');
        noDataMessage.style.display = 'none';
    }

    function initMap() {
        // Membuat peta
        map = new L.Map('map', {
            fullscreenControl: true,
            fullscreenControlOptions: {
                position: 'topleft'
            }
        }).setView([-1.790597, 110.410990], 11);

        // Menambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors | Bayu Pratama'
        }).addTo(map);

        // Menambahkan geojson batas desa
        $.getJSON('{{ url('/') }}/assets-sig/assets/geojson-ketapang/kab_ketapang.geojson', function(json) {
            geoLayer = L.geoJson(json, {
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
                    layer.getElement().classList.add(
                        'dashed');
                }
            });
        });

        //shape awalan seluruh ketapang
        $.getJSON('{{ url('/') }}/assets-sig/assets/Ketapang.geojson', function(json) {
            geoLayer = L.geoJson(json, {
                style: function(feature) {
                    return {
                        fillOpacity: 0.5,
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


        // Fungsi untuk memuat dan menambahkan GeoJSON ke peta
        function addGeoJSONLayer(url) {
            $.getJSON(url, function(json) {
                L.geoJson(json, {
                    style: function(feature) {
                        return {

                            fillOpacity: 1,
                            weight: 1,
                            opacity: 1,
                            color: '#44A688',
                        };
                    },
                    onEachFeature: function(feature, layer) {
                        if (feature.properties && feature.properties.NAMOBJ) {
                            layer.bindTooltip(feature.properties.NAMOBJ, {
                                permanent: true,
                                direction: 'top',
                                className: 'custom-tooltip'
                            })
                        }
                    },
                }).addTo(map);
            });
        }

        // Dapatkan daftar file GeoJSON dari server
        $.getJSON('/geojson-files', function(files) {
            files.forEach(function(filename) {
                var url = '/assets-sig/assets/shape/Desa/Geo/' + filename;
                addGeoJSONLayer(url);
            });
        });



        eventMarkersData.forEach(function(markerData) {
            var marker = L.marker([markerData.lat, markerData.lng], {
                icon: greenIcon,
                tags: [markerData.tags]
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
                var hasTanamanData = tanamanMarkersData.some(function(tanamanMarkerData) {
                    return tanamanMarkerData.event_id === this.event_id;
                }, this);

                // Jika tidak ada data penanaman, tampilkan pesan
                if (!hasTanamanData) {
                    alert('Belum memiliki data penanaman');
                    return;
                }
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
                            offset: popupOffset,
                        });
                        tanamanMarkers.push(tanamanMarker);
                    }
                }, this);

                // Mengarahkan peta ke marker tanaman dengan animasi zoom
                if (tanamanMarkers.length > 0) {
                    var selectedTanamanMarker = tanamanMarkers[0];
                    map.flyTo(selectedTanamanMarker.getLatLng(), 10, {
                        duration: 2, // Durasi animasi dalam detik
                        easeLinearity: 0.5
                    });
                }

            });

            eventMarkers.push(marker);
        });

        // Mengurutkan tahun-tahun unik secara menaik
        const sortedYears = {!! json_encode($years) !!}.sort((a, b) => a - b);

        // Menambahkan tag filter button dengan tahun-tahun yang sudah diurutkan
        L.control.tagFilterButton({
            data: sortedYears,
            icon: '<img src="{{ url('/') }}/assets-sig/assets/img/filter.png">',
            filterOnEveryClick: true,

        }).addTo(map);

        // Legend
        L.control.Legend({
            position: "bottomright",
            legends: [{
                    label: ": Event",
                    type: "image",
                    url: "{{ url('/') }}/assets-web2/assets/images/icon/tree.png",
                },
                {
                    label: ": Penanaman",
                    type: "image",
                    url: "{{ url('/') }}/assets-web2/assets/images/icon/calendar.png",
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

    function clearTanamanMarkers() {
        tanamanMarkers.forEach(function(tanamanMarker) {
            map.removeLayer(tanamanMarker);
        });
        tanamanMarkers = [];
    }

    function resetMap() {
        if (noDataPopup) {
            map.closePopup(noDataPopup);
        }
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
        map.setView([-1.790597, 110.410990], 11, {
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

    function filterMarkers() {

        var selectedEventIds = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function(checkbox) {
            selectedEventIds.push(checkbox.value);
        });

        // Memeriksa apakah setiap event yang dipilih memiliki data penanaman
        var hasData = selectedEventIds.every(function(eventId) {
            return tanamanMarkersData.some(function(tanamanMarkerData) {
                return String(tanamanMarkerData.event_id) === eventId;
            });
        });

        // Jika tidak ada data penanaman untuk salah satu event yang dipilih, tampilkan pesan di peta
        if (!hasData) {
            // Hapus semua marker tanaman
            clearTanamanMarkers();

            // Tampilkan tulisan "Belum memiliki data penanaman" di peta
            noDataPopup = L.popup()
                .setLatLng(map.getCenter()) // Atur posisi popup di tengah peta
                .setContent('Belum memiliki data penanaman') // Isi pesan
                .openOn(map); // Tampilkan popup pada peta

            return;
        }
        // Menyembunyikan semua marker tanaman
        clearTanamanMarkers();

        // Menampilkan marker tanaman yang sesuai dengan event_id yang dipilih
        tanamanMarkersData.forEach(function(tanamanMarkerData) {
            if (selectedEventIds.includes(String(tanamanMarkerData.event_id))) {
                var tanamanMarker = L.marker([tanamanMarkerData.lat, tanamanMarkerData.lng], {
                    icon: redIcon
                }).addTo(map);
                // Mengatur offset vertikal untuk popup
                var popupOffset = L.point(0, -tanamanMarker.options.icon.options.iconSize[1] / 2);
                tanamanMarker.bindPopup(
                    `
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
                    `
                );
                tanamanMarkers.push(tanamanMarker);
            }
        });

        // Mengarahkan peta ke marker tanaman dengan animasi zoom
        if (tanamanMarkers.length > 0) {
            var selectedTanamanMarker = tanamanMarkers[0];
            map.flyTo(selectedTanamanMarker.getLatLng(), 10, {
                duration: 2,
                easeLinearity: 0.5
            });
        }
    }

    // Event listener untuk tombol "Clear"
    document.addEventListener('DOMContentLoaded', function() {
        var clearButton = document.getElementById('clear-button');
        clearButton.addEventListener('click', function() {
            clearSearch();
            resetMap();
        });
    });

    // search event
    function searchEvent() {
        var searchInput = document.getElementById("search-input").value.toLowerCase();
        var selectedYear = document.getElementById('year').value;
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var clearButton = document.querySelector(".search-clear");
        var noDataMessage = document.getElementById('no-data-message');

        var hasMatch = false;
        checkboxes.forEach(function(checkbox) {
            var label = checkbox.nextElementSibling;
            var eventName = label.innerText.toLowerCase();
            var eventYear = checkbox.parentNode.id.split('-')[2];

            if (eventName.includes(searchInput) && (selectedYear === 'all' || eventYear === selectedYear)) {
                checkbox.style.display = "absolute";
                label.style.display = "inline-block";
                hasMatch = true;
            } else {
                checkbox.style.display = "none";
                label.style.display = "none";
            }
        });

        if (searchInput === "") {
            // Show checkboxes according to the selected year when the search is empty
            if (selectedYear === 'all') {
                checkboxes.forEach(function(checkbox) {
                    checkbox.style.display = "absolute";
                    checkbox.checked = false;
                });
            } else {
                checkboxes.forEach(function(checkbox) {
                    var eventYear = checkbox.parentNode.id.split('-')[2];
                    if (eventYear === selectedYear) {
                        checkbox.style.display = "absolute";
                        checkbox.checked = false;
                    } else {
                        checkbox.style.display = "none";
                    }
                });
            }
        }
        noDataMessage.style.display = hasMatch ? "none" : "block";
        clearButton.style.display = "inline-block";
    }

    // Event listener for year selection change
    document.getElementById('year').addEventListener('change', function() {
        // Call searchEvent again to update search results based on the selected year
        searchEvent();
    });

    function clearSearch() {
        var searchInput = document.getElementById("search-input");
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var clearButton = document.getElementById('clear-button');
        var noDataMessage = document.getElementById('no-data-message');

        searchInput.value = "";
        checkboxes.forEach(function(checkbox) {
            checkbox.style.display = "absolute";
            checkbox.nextElementSibling.style.display = "inline-block";
            checkbox.checked = false;
        });
        clearButton.style.display = "inline-block";
        noDataMessage.style.display = "none";
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

        var clearButton = document.getElementById('clear-button');
        clearButton.addEventListener('click', function() {
            clearSearch();
            resetMap();
        });
    };

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

    function handleSearch(event) {
        if (event.keyCode === 13) {
            searchEvent();
            event.preventDefault();
        }
    }
</script>
