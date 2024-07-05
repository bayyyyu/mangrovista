<x-app>
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-user bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>User</h5>
                        <span>Halaman User</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ url('Admin/Dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="">User</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong style="font-weight:bolder">Data User</strong>
                        <a href="{{ url('Admin/User/create') }}" class="btn btn-inverse btn-mat float-right mr-2"><i
                                class="feather icon-plus"></i> Tambah User</a>
                    </div>
                    <div class="card-block">
                        <div class=" dt-responsive table-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
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
                </div>
            </div>
        </div>
    </div>
</x-app>
