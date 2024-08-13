<x-app>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Lokasi</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">MangroVista</a></li>
                            <li class="breadcrumb-item active">Lokasi</li>
                        </ol>
                    </div><!--end col-->
                    <div class="col-auto align-self-center tab">
                        <a href="{{ url('Admin/Lokasi/create') }}" class="btn btn-sm btn-outline-primary">
                            <i data-feather="plus" class="align-self-center icon-xs"></i>
                            Tambah Lokasi
                        </a>
                    </div>
                    <!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="bg-primary" style="color: white">
                            <th width="10px" class="text-white">No</th>
                            <th width="150px" class="text-white">Aksi</th>
                            <th class="text-white">Nama Lokasi</th>
                            <th class="text-white">Jumlah Event</th>
                            <th class="text-white">Pohon Ditanam</th>
                        </thead>
                        <tbody>
                            @foreach ($list_lokasi as $lokasi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('Admin/Lokasi', $lokasi->id) }}"
                                                class="btn btn-outline-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="{{ url('Admin/Lokasi', $lokasi->id) }}/edit"
                                                class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <x-button.delete id="{{ $lokasi->id }}" />
                                        </div>
                                    </td>
                                    <td>{{ $lokasi->nama_lokasi }}</td>
                                    <td>{{ $lokasi->events()->count() }}</td>
                                    <td>{{ $lokasi->total_pohon_ditanam }} Pohon</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</x-app>
