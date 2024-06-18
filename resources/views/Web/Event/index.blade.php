<x-web.app-webNoSlider>
    <div class="blog-section blog-page">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class=" col-12">
                        <article>
                            <div class="post-item-2">
                                <div class="post-inner">
                                    <div class="post-content ">
                                        <div class="tab">
                                            <button class="tablink btn btn-sm" onclick="openTab(event, 'belumSelesai')"
                                                id="defaultOpen"
                                                style="margin-right:10px; border-radius:5px; background-color:white; border:2px solid #064635; font-weight:bolder; color:#064635">Belum
                                                Selesai</button>
                                            <button class="tablink btn btn-sm" onclick="openTab(event, 'berlangsung')"
                                                style="margin-right:10px; border-radius:5px; background-color:white; border:2px solid #064635; font-weight:bolder; color:#064635">Berlangsung</button>
                                            <button class="tablink btn btn-sm active"
                                                onclick="openTab(event, 'telahSelesai')"
                                                style="margin-right:10px; border-radius:5px; background-color:white; border:2px solid #064635; font-weight:bolder; color:#064635">Telah
                                                Selesai</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="belumSelesai" class="tabcontent" style="display: none;">
                                <div class="shop-product-wrap grids row ">
                                    @foreach ($list_event_belum_selesai->where('tanggal_event', '>', now()) as $event)
                                        <div class="col-md-6 col-lg-3">
                                            <div class="card hover-img overflow-hidden rounded-2">
                                                <div class="card-body p-0">
                                                    <a href="{{ url('Event', $event->id) }}">
                                                        <img src="{{ asset($event->foto) }}" alt=""
                                                            class="img-fluid objectfit-cover"
                                                            style="height: 150px; width: 400px; object-fit:cover">
                                                        <div class="p-4 " style="height: 65px">
                                                            <h3 style="font-size: 16px; color:#090909;"
                                                                class="fw-semibold mb-0 fs-4">
                                                                @php
                                                                    $maxLength = 48;
                                                                    $nama_event = nl2br($event->nama_event);
                                                                    if (strlen($nama_event) > $maxLength) {
                                                                        $nama_event =
                                                                            substr($nama_event, 0, $maxLength) . '...';
                                                                    }
                                                                @endphp
                                                                {!! $nama_event !!}
                                                            </h3>
                                                        </div>
                                                        <span class="text-dark"
                                                            style="padding-inline: 24px; font-size:12px;">
                                                            Penyelenggara: {{ $event->user->nama_lengkap }}
                                                        </span>
                                                        @php
                                                            $tanggalEvent = new DateTime($event->tanggal_event);
                                                            $sekarang = new DateTime();
                                                            $selisih = $sekarang->diff($tanggalEvent);
                                                            $hari = $selisih->days;
                                                            $jumlah_peserta = $event->peserta_count;
                                                            $target_peserta = $event->target_peserta;
                                                            $percentage =
                                                                $target_peserta > 0
                                                                    ? ($jumlah_peserta / $target_peserta) * 100
                                                                    : 0;
                                                        @endphp
                                                        <div class="wrapper-event-info">
                                                            <p class="event-info">
                                                                <strong>max. Peserta</strong>
                                                                {{ $target_peserta }}
                                                            </p>
                                                            <p class="event-info">
                                                                <strong>{{ $hari }}</strong> Hari lagi
                                                            </p>
                                                        </div>
                                                        <div class="progress-container">
                                                            <div class="progress custom-progress">
                                                                <div class="progress-bar " role="progressbar"
                                                                    style="width: {{ $percentage }}%;"
                                                                    aria-valuenow="{{ $jumlah_peserta }}"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="{{ $target_peserta }}">
                                                                    <div class="content-progress">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div id="berlangsung" class="tabcontent" style="display: none;">
                                <div class="shop-product-wrap grids row">
                                    @foreach ($list_event_berlangsung as $event)
                                        <!-- Tampilkan data event yang sedang berlangsung -->
                                        <div class="col-md-6 col-lg-3">
                                            <div class="card hover-img overflow-hidden rounded-2">
                                                <div class="card-body p-0">
                                                    <a href="{{ url('Event', $event->id) }}">
                                                        <img src="{{ asset($event->foto) }}" alt=""
                                                            class="img-fluid objectfit-cover"
                                                            style="height: 150px; width: 400px; object-fit:cover">
                                                        <div class="p-4 " style="height: 65px">
                                                            <h3 style="font-size: 16px; color:#090909;"
                                                                class="fw-semibold mb-0 fs-4">
                                                                @php
                                                                    $maxLength = 48;
                                                                    $nama_event = nl2br($event->nama_event);
                                                                    if (strlen($nama_event) > $maxLength) {
                                                                        $nama_event =
                                                                            substr($nama_event, 0, $maxLength) . '...';
                                                                    }
                                                                @endphp
                                                                {!! $nama_event !!}
                                                            </h3>
                                                        </div>
                                                        <span class="text-dark"
                                                            style="padding-inline: 24px; font-size:12px;">
                                                            Penyelenggara: {{ $event->user->nama_lengkap }}
                                                        </span>
                                                        @php
                                                            $tanggalEvent = new DateTime($event->tanggal_event);
                                                            $sekarang = new DateTime();
                                                            $selisih = $sekarang->diff($tanggalEvent);
                                                            $hari = $selisih->days;
                                                            $jumlah_peserta = $event->peserta_count;
                                                            $target_peserta = $event->target_peserta;
                                                            $percentage =
                                                                $target_peserta > 0
                                                                    ? ($jumlah_peserta / $target_peserta) * 100
                                                                    : 0;
                                                        @endphp
                                                        <div class="wrapper-event-info">
                                                            <p class="event-info">
                                                                <strong>max. Peserta</strong>
                                                                {{ $target_peserta }}
                                                            </p>
                                                            <p class="event-info">
                                                                Sedang Berlangsung
                                                            </p>
                                                        </div>
                                                        <div class="progress-container">
                                                            <div class="progress custom-progress">
                                                                <div class="progress-bar " role="progressbar"
                                                                    style="width: {{ $percentage }}%;"
                                                                    aria-valuenow="{{ $jumlah_peserta }}"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="{{ $target_peserta }}">
                                                                    <div class="content-progress">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="telahSelesai" class="tabcontent" style="display: none;">
                                <div class="shop-product-wrap grids row ">
                                    @foreach ($list_event_telah_selesai->where('tanggal_selesai', '<', now()) as $event)
                                        <div class="col-md-6 col-lg-3">
                                            <div class="card hover-img overflow-hidden rounded-2">
                                                <div class="card-body p-0">
                                                    <a href="{{ url('Event', $event->id) }}">
                                                        <img src="{{ asset($event->foto) }}" alt=""
                                                            class="img-fluid objectfit-cover"
                                                            style="height: 150px; width: 400px; object-fit:cover">
                                                        <div class="p-4 " style="height: 65px">
                                                            <h3 style="font-size: 16px; color:#090909;"
                                                                class="fw-semibold mb-0 fs-4">
                                                                @php
                                                                    $maxLength = 48;
                                                                    $nama_event = nl2br($event->nama_event);
                                                                    if (strlen($nama_event) > $maxLength) {
                                                                        $nama_event =
                                                                            substr($nama_event, 0, $maxLength) . '...';
                                                                    }
                                                                @endphp
                                                                {!! $nama_event !!}
                                                            </h3>
                                                        </div>
                                                        <span class="text-dark"
                                                            style="padding-inline: 24px; font-size:12px;">
                                                            Penyelenggara: {{ $event->user->nama_lengkap }}
                                                        </span>
                                                        @php
                                                            $tanggalEvent = new DateTime($event->tanggal_event);
                                                            $sekarang = new DateTime();
                                                            $selisih = $sekarang->diff($tanggalEvent);
                                                            $hari = $selisih->days;
                                                            $jumlah_peserta = $event->peserta_count;
                                                            $target_peserta = $event->target_peserta;
                                                            $percentage =
                                                                $target_peserta > 0
                                                                    ? ($jumlah_peserta / $target_peserta) * 100
                                                                    : 0;
                                                        @endphp
                                                        <div class="wrapper-event-info">
                                                            <p class="event-info">
                                                                <strong>max. Peserta</strong>
                                                                {{ $target_peserta }}
                                                            </p>
                                                            <p class="event-info">
                                                                Telah Berakhir
                                                            </p>
                                                        </div>
                                                        <div class="progress-container">
                                                            <div class="progress custom-progress">
                                                                <div class="progress-bar " role="progressbar"
                                                                    style="width: {{ $percentage }}%;"
                                                                    aria-valuenow="{{ $jumlah_peserta }}"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="{{ $target_peserta }}">
                                                                    <div class="content-progress">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                            </div>


                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .wrapper-event-info {
            padding-block: 20px;
            display: flex;
            justify-content: space-between;
            padding-inline: 10px
        }

        .event-info {
            font-size: 10px;
            color: #090909;
            margin-bottom: 0;
            justify-content: space-between;
            flex-direction: column;
        }

        .progress-container {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
            margin-top: -10px
        }

        .custom-progress {
            width: 95%;
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

        /* Style untuk tombol tab-link */
        .tab button {
            float: left;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Style untuk tombol tab-link aktif */
        .tab button.active {
            background-color: #064635 !important;
            color: white !important;
        }

        .search::-webkit-input-placeholder {
            color: #064635;
        }

        .search-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            margin-left: auto;
        }

        #searchInput {
            margin-right: 10px;
        }

        @media screen and (max-width: 768px) {
            .search-container {
                flex-direction: flex;
                align-items: center;
                justify-content: center;
                margin-top: 20px;
            }

            .tab {
                text-align: center;
            }

            .tab button {
                float: none;
                display: inline-block;

            }
        }

        /*card*/
        .campaign-card {
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            position: relative;
            height: 400px
        }

        .action-buttons {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 16px;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;

        }

        .action-buttons .status {
            color: black;
            font-size: 15px;
        }

        .action-buttons .btn {
            display: inline-block;
            background-color: #064635;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
        }

        .campaign-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .campaign-content {
            padding: 16px;
        }

        .campaign-content h3 {
            font-size: 18px;
            margin-top: 0;
        }

        .campaign-content p {
            margin-bottom: 12px;
        }

        /* Pagination*/
        .pagination .page-item.active .page-link {
            background-color: #064635;
            color: white;
        }

        .pagination .page-item:not(.disabled):first-child .page-link::before {
            content: '\2039';
        }

        .pagination .page-item:not(.disabled):last-child .page-link::before {
            content: '\203A';
        }
    </style>
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            // Menyembunyikan semua konten tab
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Menghapus class active dari semua tombol tab-link
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Menampilkan konten tab yang dipilih dan menambahkan class active pada tombol tab-link
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Menampilkan tab default secara otomatis
        document.getElementById("defaultOpen").click();

        function searchEvent() {
            var input, filter, tabcontent, cards, cardTitle, i;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            tabcontent = document.getElementsByClassName("tabcontent");

            for (i = 0; i < tabcontent.length; i++) {
                cards = tabcontent[i].getElementsByClassName("campaign-card");

                for (var j = 0; j < cards.length; j++) {
                    cardTitle = cards[j].querySelector("h3");

                    if (cardTitle.innerText.toUpperCase().indexOf(filter) > -1) {
                        cards[j].style.display = "";

                    } else {
                        cards[j].style.display = "none";
                    }
                }
            }

            var clearSearch = document.getElementById("clearSearch");
            if (filter !== "") {
                clearSearch.style.display = "inline";
            } else {
                clearSearch.style.display = "none";
            }

        }

        function clearSearch() {
            var input = document.getElementById("searchInput");
            input.value = "";
            searchEvent();
        }

        function handleSearch(event) {
            if (event.keyCode === 13) {
                searchEvent();
                event.preventDefault();
            }
        }
    </script>
</x-web.app-webNoSlider>
