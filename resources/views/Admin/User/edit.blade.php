<x-app>
    <div class="row">
        <div class="col-md-3 py-2">
            <a href="{{ url('Admin/User') }}" class="btn btn-primary btn-sm "><i class="fa fa-arrow-left "></i>
                Kembali</a>
        </div>
        <div class="col-md-12">

            <div class="card">
                <div class="card-header bg-primary">
                    <p style="color: white"> Edit Data {{ $user->role }}</p>
                </div>
                <div class="card-body">
                    <form action="{{ url('Admin/User', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Tampilkan semua pesan error -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">   
                            <div class="form-group">
                                <label for="nama_lengkap" class="control-label">Nama</label>
                                <input type="text" class="form-control" name="nama_lengkap"
                                    value="{{ old('nama_lengkap', $user->nama_lengkap) }}">
                                @error('nama_lengkap')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role" class="control-label">Role</label>
                                    <select class=" form-select" name="role" id="role">
                                        <option value="" {{ $user->role === '' ? 'selected' : '' }}>Pilih</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="pengguna" {{ $user->role === 'pengguna' ? 'selected' : '' }}>Pengguna
                                        </option>
                                        <option value="penyelenggara"
                                            {{ $user->role === 'penyelenggara' ? 'selected' : '' }}>
                                            Penyelenggara</option>
                                    </select>
                                    @error('role')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" class="control-label">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="{{ old('username', $user->username) }}">
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="control-label">Password (Opsional)</label>
                                    <input type="password" class="form-control" name="password">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label for="foto_profil" class="control-label">Foto Profil</label>
                                    <input type="file" class="form-control" name="foto_profil" accept="image/*"
                                        id="foto_profil" onchange="previewImage(event)">
                                    <img id="preview" src="{{ $user->foto_profil ? asset($user->foto_profil) : '#' }}">
                                    @error('foto_profil')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
                        <div class="col-md-12">
                            <div class="btn-group mb-2 float-end">
                                <button class="btn btn-success "><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app>
