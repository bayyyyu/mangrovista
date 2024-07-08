<x-app>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">User</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">MangroVista</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div><!--end col-->
                    <div class="col-auto align-self-center tab">
                        <a href="{{ url('Admin/User/create') }}" class="btn btn-sm btn-outline-primary">
                            <i data-feather="plus" class="align-self-center icon-xs"></i>
                            Tambah User
                        </a>
                    </div>
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
                        <thead class="bg-primary">
                            <th width="10px" class="text-white">No</th>
                            <th width="150px" class="text-white">Aksi</th>
                            <th class="text-white">Role</th>
                            <th class="text-white">Nama</th>
                            <th class="text-white">Email</th>
                        </thead>
                        <tbody>
                            @foreach ($list_user as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('Admin/User', $user->id) }}"
                                                class="btn btn-outline-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="{{ url('Admin/User', $user->id) }}/edit"
                                                class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <x-button.delete id="{{ $user->id }}" />
                                        </div>
                                    </td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->nama_lengkap }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

</x-app>
