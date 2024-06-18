<x-app>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Pengajuan Peran</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">MangroVista</a></li>
                            <li class="breadcrumb-item active">Pengajuan Peran</li>
                        </ol>
                    </div><!--end col-->
                    <div class="col-auto align-self-center tab">
                        <button class="tablink btn btn-sm btn-outline-primary active" onclick="openTab(event, 'baru')"
                            id="defaultOpen" style="margin-right:10px; border-radius:5px; ">Baru</button>
                        <button class="tablink btn btn-sm btn-outline-primary" onclick="openTab(event, 'diterima')"
                            style="margin-right:10px; border-radius:5px; ">Diterima</button>
                        <button class="tablink btn btn-sm btn-outline-primary" onclick="openTab(event, 'ditolak')"
                            style="margin-right:10px; border-radius:5px; ">Ditolak</button>
                    </div>
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div id="baru" class="tabcontent" style="display: none;">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Nama Pemohon</th>
                                <th>Tanggal Pengajuan</th>
                                <th>status</th>
                            </thead>
                            <tbody>
                                @foreach ($list_menunggu_konfirmasi->where('status_request', 'Menunggu Konfirmasi') as $menunggu_konfirmasi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ url('Admin/Pengajuan-Peran', $menunggu_konfirmasi->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-info"></i>
                                            </a>
                                            <x-button.delete id="{{ $menunggu_konfirmasi->id }}" />
                                        </td>
                                        <td>{{ $menunggu_konfirmasi->nama_lengkap }}</td>
                                        <td>{{ $menunggu_konfirmasi->created_at->isoFormat('DD MMMM YYYY', 'Do MMMM YYYY') }}
                                            Pukul: {{ $menunggu_konfirmasi->created_at->isoFormat('HH:mm') }}</td>
                                        <td width="20px">
                                            @php
                                                $status = $menunggu_konfirmasi->status_request;
                                                $background_color = '';

                                                switch ($status) {
                                                    case 'Menunggu Konfirmasi':
                                                        $background_color = '#4E9ED4';
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
                {{-- konten pengajuan diterima --}}
                <div id="diterima" class="tabcontent" style="display: none;">
                    <div class="card-body">
                        <table id="datatable2" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <th width="10px">No</th>
                                <th width="150px">Aksi</th>
                                <th>Nama Pemohon</th>
                                <th>Tanggal Pengajuan</th>
                                <th>status</th>
                            </thead>
                            <tbody>
                                @foreach ($list_diterima->where('status_request', 'Diterima') as $diterima)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ url('Admin/Pengajuan-Peran', $diterima->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-info"></i>
                                            </a>
                                            <x-button.delete id="{{ $diterima->id }}" />
                                        </td>
                                        <td>{{ $diterima->nama_lengkap }}</td>
                                        <td>{{ $diterima->created_at->isoFormat('DD MMMM YYYY', 'Do MMMM YYYY') }}
                                            Pukul: {{ $diterima->created_at->isoFormat('HH:mm') }}</td>
                                        <td width="20px">
                                            @php
                                                $status = $diterima->status_request;
                                                $background_color = '';

                                                switch ($status) {
                                                    case 'Menunggu Konfirmasi':
                                                        $background_color = '#4E9ED4';
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
                {{-- konten pengajuan ditolak --}}
                <div id="ditolak" class="tabcontent" style="display: none;">
                    <div class="card-body">
                        <table id="datatable_berlangsung" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <th width="10px">No</th>
                                <th width="150px">Aksi</th>
                                <th>Nama Pemohon</th>
                                <th>Tanggal Pengajuan</th>
                                <th>status</th>
                            </thead>
                            <tbody>
                                @foreach ($list_ditolak->where('status_request', 'Ditolak') as $ditolak)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ url('Admin/Pengajuan-Peran', $ditolak->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-info"></i>
                                            </a>
                                            <x-button.delete id="{{ $ditolak->id }}" />
                                        </td>
                                        <td>{{ $ditolak->nama_lengkap }}</td>
                                        <td>{{ $ditolak->created_at->isoFormat('DD MMMM YYYY', 'Do MMMM YYYY') }}
                                            Pukul: {{ $ditolak->created_at->isoFormat('HH:mm') }}</td>
                                        <td width="20px">
                                            @php
                                                $status = $ditolak->status_request;
                                                $background_color = '';

                                                switch ($status) {
                                                    case 'Menunggu Konfirmasi':
                                                        $background_color = '#4E9ED4';
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
            </div>
        </div> <!-- end col -->
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
