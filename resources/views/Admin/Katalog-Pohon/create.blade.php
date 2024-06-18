<x-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <a href="{{ url('Admin/Katalog-Pohon') }}" class="btn btn-dark btn-mat mb-1"><i class="feather icon-arrow-left"></i>
                    Kembali</a>
                <div class="card">
                    <div class="card-header bg-dark">
                        <p style="color:white"> Tambah Data Pohon </p>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('Admin/Katalog-Pohon') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Nama Pohon</label>
                                        <input type="text" class="form-control" name="nama_pohon">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Nama Laing / Nama Latin
                                            Pohon</label>
                                        <input type="text" class="form-control" name="nama_lain_pohon">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Foto</label>
                                        <input type="file" class="form-control" name="foto"
                                            onchange="previewImage()" id="fileInput" accept="image/*" >
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <img id="preview" src="#">

                                    <style>
                                        #preview {
                                            display: block;
                                            margin: 20px auto;
                                            width: 100%;
                                            height: 300px;
                                            object-fit: contain;
                                            object-position: center;
                                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                                        }
                                    </style>
                                </div>
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
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    @endpush

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#deskripsi').summernote({
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link']],
                        ]
                 });
            });
        </script>
    @endpush
</x-app>
