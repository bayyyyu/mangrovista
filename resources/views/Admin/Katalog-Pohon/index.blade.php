<x-app>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Katalog Pohon</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">MangroVista</a></li>
                            <li class="breadcrumb-item active">Katalog Pohon</li>
                        </ol>
                    </div><!--end col-->
                    <div class="col-auto align-self-center tab">
                        <a href="{{ url('Admin/Katalog-Pohon/create') }}" class="btn btn-sm btn-outline-primary">
                            <i data-feather="plus" class="align-self-center icon-xs"></i>
                            Tambah Katalog Pohon
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
                        <thead>
                            <th width="10px">No</th>
                            <th width="150px">Aksi</th>
                            <th>Nama Pohon</th>
                        </thead>
                        <tbody>
                            @foreach ($list_katalog_pohon as $katalog_pohon)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('Admin/Katalog-Pohon', $katalog_pohon->id) }}"
                                                class="btn btn-dark btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="{{ url('Admin/Katalog-Pohon', $katalog_pohon->id) }}/edit"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <x-button.delete id="{{ $katalog_pohon->id }}" />
                                        </div>
                                    </td>
                                    <td>{{ $katalog_pohon->nama_pohon }}{{ $katalog_pohon->nama_lain_pohon }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</x-app>
