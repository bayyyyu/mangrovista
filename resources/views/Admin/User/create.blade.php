<x-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <a href="{{ url('Admin/User') }}" class="btn btn-dark btn-mat mb-1"><i class="feather icon-arrow-left"></i>
                    Kembali</a>
                <div class="card">
                    <div class="card-header bg-dark">
                        <p style="color:white"> Tambah Data user </p>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('Admin/User') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="control-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="control-label">Foto Profil</label>
                                    <input type="file" class="form-control" name="foto_profil" onchange="previewImage()"
                                        id="fileInput" accept="image/*">

                                    <img id="preview" src="#">
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
                            </div>
                            <br>
                            <button class="btn btn-dark float-right"><i class="fa fa-save "></i> Simpan</button>
                        </form>
                    </div>
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
