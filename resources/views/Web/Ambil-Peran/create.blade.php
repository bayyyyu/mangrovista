<x-web.app-webNoSlider>
    <div class="container">
        <div class="faq-section mt-5" style="margin-bottom: 40px; ">
            <h6 style="text-align: center; justify-content:center; color: #064635">Form Pengajuan Pengambilan
                Peran
                Penyelenggara Event</h6>
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-4">
                        <form action="{{ url('Ambil-Peran') }}" method="POST" class="comment-form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="control-label"
                                            style="color:black; font-size:13px">Nama
                                            Lengkap<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" style="height:30px"
                                            placeholder="{{ Auth::user()->nama_lengkap ?? '' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label"
                                            style="color:black; font-size:13px">Email<span
                                                style="color: red">*</span></label>
                                        <input type="email" class="form-control" style="height:30px"
                                            placeholder="{{ Auth::user()->email ?? '' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label"
                                            style="color:black; font-size:13px">No.Telpon
                                            Aktif/WhatsApp<span style="color: red">*</span></label>
                                        <input type="tel" required class="form-control" style="height:30px"
                                            placeholder="{{ Auth::user()->no_telpon ?? '' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat" class="control-label"
                                            style="color:black; font-size:13px">Alamat<span
                                                style="color: red">*</span></label>
                                        <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="alert alert-danger" style="font-size:13px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pengalaman" class="control-label"
                                            style="color:black; font-size:13px">Pengalaman Terkait<span
                                                style="color: red">*</span></label>
                                        <textarea name="pengalaman" id="pengalaman" class="form-control">{{ old('pengalaman') }}</textarea>
                                        @error('pengalaman')
                                            <div class="alert alert-danger" style="font-size:13px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alasan" class="control-label"
                                            style="color:black; font-size:13px">Alasan Mengambil Peran<span
                                                style="color: red">*</span></label>
                                        <textarea name="alasan" id="alasan" class="form-control">{{ old('alasan') }}</textarea>
                                        @error('alasan')
                                            <div class="alert alert-danger" style="font-size:13px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="rencana_acara" class="control-label"
                                            style="color:black; font-size:13px">Rencana Acara<span
                                                style="color: red">*</span></label>
                                        <textarea name="rencana_acara" id="rencana_acara" class="form-control">{{ old('rencana_acara') }}</textarea>
                                        @error('rencana_acara')
                                            <div class="alert alert-danger" style="font-size:13px">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-outline-green float-right">
                                Ajukan Pengambilan Peran
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web.app-webNoSlider>
