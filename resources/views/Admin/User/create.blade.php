<x-app>
    <div class="row">
        <div class="col-md-12 mt-3">
            <a href="{{ url('Admin/User') }}" class="btn btn-sm btn-outline-primary mb-2">
                <i class="fa fa-arrow-left ">
                </i>
                Kembali
            </a>
            <div class="card">
                <div class="card-header bg-primary">
                    <p style="color:white"> Tambah Data user </p>
                </div>
                <div class="card-body">
                    <form action="{{ url('Admin/User') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap"
                                        value="{{ old('nama_lengkap') }}">
                                    @error('nama_lengkap')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role" class="control-label">Role</label>
                                    <select class="form-control" name="role" id="role">
                                        <option value="">--Pilih Role--</option>
                                        <option value="admin">Admin</option>
                                        <option value="pengguna">Pengguna</option>
                                        <option value="penyelenggara">Penyelenggara</option>
                                    </select>
                                    @error('role')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="{{ old('username') }}">
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mx-auto text-center">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Foto Profil</h4>
                                    </div><!--end card-header-->
                                    <div class="card-body">
                                        <input type="file" id="input-file-now"
                                            class="dropify @error('foto') is-invalid @enderror" name="foto_profil"
                                            accept="image/*" />
                                        @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div><!--end card-body-->
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <button class="btn btn-success float-end"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#fileInput').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app>
