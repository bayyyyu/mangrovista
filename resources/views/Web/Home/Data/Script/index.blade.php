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
        var desktopZoom = 9;
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
