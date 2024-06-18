<x-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <a href="{{ url('Admin/User') }}" class="btn btn-dark btn-mat mb-1"><i class="feather icon-arrow-left"></i>
                    Kembali</a>
                <div class="card">
                    <div class="card-header bg-dark">
                        <p style="color: white"> Edit Data Pengelola</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('Admin/User', $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="role" class="control-label">Role</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="" {{ $user->role === '' ? 'selected' : '' }}>Pilih</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="pengguna" {{ $user->role === 'pengguna' ? 'selected' : '' }}>Pengguna</option>
                                    <option value="penyelenggara" {{ $user->role === 'penyelenggara' ? 'selected' : '' }}>Penyelenggara</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Nama</label>
                                <input type="text" class="form-control" name="nama_lengkap"
                                    value="{{ $user->nama_lengkap }}">
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Username</label>
                                <input type="text" class="form-control" name="username"
                                    value="{{ $user->username }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Foto Profil</label>
                                <input type="file" class="form-control" name="foto_profil" accept="image/*"
                                    value="{{ $user->foto_profil }}" id="foto_profil" onchange="previewImage(event)">
                                <img id="preview" src="{{ $user->foto_profil ? asset($user->foto_profil) : '#' }}">
                            </div>

                            <style>
                                #preview {
                                    display: block;
                                    margin: 20px auto;
                                    width: 200px;
                                    height: 200px;
                                    object-fit: cover;
                                    object-position: center;
                                    border-radius: 50%;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                                }
                            </style>
                            <script>
                                function previewImage(event) {
                                    var input = event.target;
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                            var preview = document.getElementById("preview");
                                            preview.setAttribute('src', e.target.result);
                                        }

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                    </div>
                    <br>
                    <div class="btn-group mb-2">
                        <button class="btn btn-dark float-right mr-3"><i class="fa fa-save "></i> Simpan</button>
                        <a href="{{ url('Admin/User') }}" class="btn btn-danger float-right "> Batal </a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app>
