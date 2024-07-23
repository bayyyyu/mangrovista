<x-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ url('Admin/Katalog-Pohon') }}" class="btn btn-primary btn-sm mb-1"> <i
                        class="fa fa-arrow-left ">
                    </i>
                    Kembali</a>
                <div class="card">
                    <div class="card-header bg-primary">
                        <p style="color:white"> Tambah Data Pohon </p>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('Admin/Katalog-Pohon') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pohon" class="control-label">Nama Pohon</label>
                                        <input type="text"
                                            class="form-control @error('nama_pohon') is-invalid @enderror"
                                            name="nama_pohon" value="{{ old('nama_pohon') }}">
                                        @error('nama_pohon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_lain_pohon" class="control-label">Nama Lain / Nama Latin
                                            Pohon</label>
                                        <input type="text"
                                            class="form-control @error('nama_lain_pohon') is-invalid @enderror"
                                            name="nama_lain_pohon" value="{{ old('nama_lain_pohon') }}">
                                        @error('nama_lain_pohon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="control-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Foto</h4>
                                    </div><!--end card-header-->
                                    <div class="card-body">
                                        <input type="file" id="input-file-now"
                                            class="dropify @error('foto') is-invalid @enderror" name="foto"
                                            accept="image/*" />
                                        @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div><!--end card-body-->
                                </div>
                            </div>
                            <br>
                            <x-button.save/>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

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
                $('.dropify').dropify();

                // Cek apakah ada error untuk input foto
                @if ($errors->has('foto'))
                    var dropifyErrorElement = $('input[name="foto"]').closest('.dropify-wrapper');
                    dropifyErrorElement.addClass('has-error'); // Menambahkan kelas error ke Dropify wrapper
                    dropifyErrorElement.find('.dropify-errors-container').html(
                        '<ul><li>{{ $errors->first('foto') }}</li></ul>').show(); // Menampilkan pesan error
                @endif
            });
        </script>
    @endpush
</x-app>
