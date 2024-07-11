<x-app>
    <div class="row">
        <div class="col-md-12 mt-3">
            <a href="{{ url('Admin/Event') }}" class="btn btn-primary btn-sm mb-1"> <i class="fa fa-arrow-left ">
                </i>
                Kembali</a>
            <div class="card">
                <div class="card-header bg-primary">
                    <p style="color:white"> Edit Data Event </p>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <form action="{{ url('Admin/Event', $event->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama_event" class="control-label">Nama Event</label>
                                                <input type="text" class="form-control" name="nama_event"
                                                    value="{{ old('nama_event', $event->nama_event) }}">
                                                @error('nama_event')
                                                    <ul class="text-danger">
                                                        @foreach ($errors->get('nama_event') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tanggal_event" class="control-label">Tanggal
                                                    Pelaksanaan</label>
                                                <div class="input-group">
                                                    <div class="col-md-5">
                                                        <input type="date" class="form-control" name="tanggal_event"
                                                            value="{{ old('tanggal_event', $event->tanggal_event) }}">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <span class="input-group-text">Hingga</span>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="date" class="form-control"
                                                            name="tanggal_selesai"
                                                            value="{{ old('tanggal_selesai', $event->tanggal_selesai) }}">
                                                    </div>
                                                </div>
                                                @error('tanggal_event')
                                                    <ul class="text-danger">
                                                        @foreach ($errors->get('tanggal_event') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                @enderror
                                                @error('tanggal_selesai')
                                                    <ul class="text-danger">
                                                        @foreach ($errors->get('tanggal_selesai') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam" class="control-label">Jam Pelaksanaan</label>
                                                <input type="time" class="form-control" name="jam"
                                                    value="{{ old('jam', $event->jam) }}">
                                                @error('jam')
                                                    <ul class="text-danger">
                                                        @foreach ($errors->get('jam') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="foto" class="control-label">Foto</label>
                                                <input type="file" class="form-control" name="foto"
                                                    accept="image/*">
                                                @error('foto')
                                                    <ul class="text-danger">
                                                        @foreach ($errors->get('foto') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="deskripsi" class="control-label">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi', $event->deskripsi) }}</textarea>
                                                @error('deskripsi')
                                                    <ul class="text-danger">
                                                        @foreach ($errors->get('deskripsi') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="button-group float-end">
                                        <button class="btn btn-success float-right"><i class="fa fa-save"></i>
                                            Simpan</button>
                                    </div>
                                </form>

                            </div>
                        </div>
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
                $('#deskripsi').summernote();
            });
        </script>
    @endpush
</x-app>
