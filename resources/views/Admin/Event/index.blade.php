<x-app>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Input Data Event</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">MangroVista</a></li>
                                <li class="breadcrumb-item active">Input Data Event</li>
                            </ol>
                        </div><!--end col-->
                        <div class="col-auto align-self-center tab">
                            <button class="tablink btn btn-sm btn-outline-primary active"
                                onclick="openTab(event, 'telahSelesai')" id="defaultOpen"
                                style="margin-right:10px; border-radius:5px; ">Telah
                                Selesai</button>
                            <button class="tablink btn btn-sm btn-outline-primary"
                                onclick="openTab(event, 'belumSelesai')"
                                style="margin-right:10px; border-radius:5px; ">Belum
                                Selesai</button>
                            <button class="tablink btn btn-sm btn-outline-primary"
                                onclick="openTab(event, 'berlangsung')"
                                style="margin-right:10px; border-radius:5px; ">Berlangsung</button>
                            <span style="margin-right: 5px;"> | </span>
                            <a href="{{ url('Admin/Event/create') }}" class="btn btn-sm btn-outline-primary">
                                <i data-feather="plus" class="align-self-center icon-xs"></i>
                                Tambah Event
                            </a>
                        </div>
                        <!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div id="telahSelesai" class="tabcontent" style="display: none;">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Nama Event</th>
                                    <th>Jumlah Penanaman</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    @foreach ($list_event_telah_selesai->where('tanggal_event', '<', now()) as $event)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="btn-group ml-2">
                                                    <a href="{{ url('Admin/Event', $event->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                                    {{-- <a href="{{ url('Admin/Event', $event->id) }}/edit"
                                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> --}}
                                                    <x-button.delete id="{{ $event->id }}" />
                                                    {{-- <a href="{{ url('Admin/Event', $event->id) }}/dokumentasi"
                                                        class="btn btn-dark btn-sm" style="margin-left: 5px">
                                                        <i class="fa fa-camera"></i>
                                                    </a> --}}
                                                </div>
                                            </td>
                                            <td>{{ $event->nama_event }}</td>
                                            <td>{{ $jumlah_penanaman[$event->id] }}</td>
                                            <td width="20px">
                                                @php
                                                    $status = $event->status;
                                                    $background_color = '';

                                                    switch ($status) {
                                                        case 'Menunggu Konfirmasi':
                                                            $background_color = '#1452D7';
                                                            break;
                                                        case 'Diterima':
                                                            $background_color = '#06A44B';
                                                            break;
                                                        case 'Ditolak':
                                                            $background_color = '#f5325c';
                                                            break;
                                                        default:
                                                            $background_color = 'transparent';
                                                            break;
                                                    }
                                                @endphp

                                                <div
                                                    style="background-color: {{ $background_color }}; padding: 5px; border-radius: 5px;">
                                                    <span style="color: white;">{{ $status }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="belumSelesai" class="tabcontent" style="display: none;">
                        <div class="card-body">
                            <table id="datatable2" class="table dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <th>No</th>
                                    <th width="100px">Aksi</th>
                                    <th>Nama Event</th>
                                    <th>Pohon Yang Hidup</th>
                                    <th>Jumlah Penanaman</th>
                                </thead>
                                <tbody>
                                    @foreach ($list_event_belum_selesai->where('tanggal_event', '>', now()) as $event)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="btn-group ml-2">
                                                    <a href="{{ url('Admin/Event', $event->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                                    <a href="{{ url('Admin/Event', $event->id) }}/edit"
                                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <x-button.delete id="{{ $event->id }}" />
                                                </div>
                                            </td>
                                            <td>{{ $event->nama_event }}</td>
                                            <td>{{ $jumlah_pohon_hidup[$event->id] }} pohon</td>
                                            <td>{{ $jumlah_penanaman[$event->id] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="berlangsung" class="tabcontent" style="display: none;">
                        <div class="card-body">
                            <table id="datatable_berlangsung" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Nama Event</th>
                                    <th>Jumlah Penanaman</th>
                                </thead>
                                <tbody>
                                    @foreach ($list_event_berlangsung as $event)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="btn-group ml-2">
                                                    <a href="{{ url('Admin/Event', $event->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                                    <a href="{{ url('Admin/Event', $event->id) }}/edit"
                                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <x-button.delete id="{{ $event->id }}" />
                                                </div>
                                            </td>
                                            <td>{{ $event->nama_event }}</td>
                                            <td>{{ $jumlah_penanaman[$event->id] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
<style>
    /* Style untuk tombol tab-link */
    .tab button {
        float: left;
        cursor: pointer;
        transition: 0.3s;
    }

    /* Style untuk tombol tab-link aktif */
    .tab button.active {
        background-color: #1452D7 !important;
        color: white !important;
    }
</style>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
        $('#datatable2').DataTable();
        $('#datatable_berlangsung').DataTable();
    });

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
