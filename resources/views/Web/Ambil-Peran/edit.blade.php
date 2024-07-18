<x-web.app-webNoSlider>
    <div class="container">
        <div class="faq-section mt-5" style="margin-bottom: 40px; ">
            <h6 style="text-align: center; justify-content:center; color: #064635">Form Edit Pengajuan Pengambilan
                Peran Penyelenggara Event
            </h6>
            <p style="text-align: center; color: #929292;  font-style: italic; font-size:12px; margin-top:-5px">
                Anda hanya bisa melakukan pengeditan sekali untuk pengajuan ini. Harap pastikan data yang Anda masukkan
                sudah benar sebelum disubmit.
            </p>
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-4">
                        <form action="{{ url('Ambil-Peran', $role_request->id) }}" method="POST" class="comment-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_lengkap" class="control-label"
                                            style="color:black; font-size:13px">Nama Lengkap<span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control"
                                            style="height:30px" value="{{ Auth::user()->nama_lengkap ?? '' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="control-label"
                                            style="color:black; font-size:13px">Email<span
                                                style="color: red">*</span></label>
                                        <input type="email" class="form-control" style="height:30px"
                                            value="{{ Auth::user()->email ?? '' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_telpon" class="control-label"
                                            style="color:black; font-size:13px">No. Telpon Aktif/WhatsApp<span
                                                style="color: red">*</span></label>
                                        <input type="tel" required class="form-control"
                                            style="height:30px" value="{{ Auth::user()->no_telpon ?? '' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat" class="control-label"
                                            style="color:black; font-size:13px">Alamat Lengkap<span
                                                style="color: red">*</span></label>
                                        <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat', $role_request->alamat) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pengalaman" class="control-label"
                                            style="color:black; font-size:13px">Pengalaman Terkait<span
                                                style="color: red">*</span></label>
                                        <textarea name="pengalaman" id="pengalaman" class="form-control" required>{{ old('pengalaman', $role_request->pengalaman) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alasan" class="control-label"
                                            style="color:black; font-size:13px">Alasan Mengambil Peran<span
                                                style="color: red">*</span></label>
                                        <textarea name="alasan" id="alasan" class="form-control" required>{{ old('alasan', $role_request->alasan) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="rencana_acara" class="control-label"
                                            style="color:black; font-size:13px">Rencana Acara<span
                                                style="color: red">*</span></label>
                                        <textarea name="rencana_acara" id="rencana_acara" class="form-control" required>{{ old('rencana_acara', $role_request->rencana_acara) }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="la-btn float-right">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media (max-width: 767px) {
            .faq-section {
                margin-top: 100px !important;
            }
        }
    </style>
</x-web.app-webNoSlider>
