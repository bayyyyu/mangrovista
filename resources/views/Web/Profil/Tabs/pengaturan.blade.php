<div class="tab-content-item " id="pengaturan-content" style="display:none;">
    <h6>Data Diri</h6>
    <div class="row">
        <form id="uploadForm" action="{{ url('Profil', Auth::user()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                @if (Auth::user()->foto_profil)
                    <img src="{{ asset(auth()->user()->foto_profil) }}" class="img-radius mt-2" alt="User-Profile-Image"
                        style="height: 70px; width:70px; object-fit:cover;  border:1px solid #018d58; border-radius:75%">
                @else
                    <img src="{{ asset('/assets-web2/assets/images/user.png') }}" class="img-radius mt-2"
                        alt="User-Profile-Image"
                        style="height: 70px; width: 70px; object-fit:cover; border:1px solid #018d58; border-radius:75%">
                @endif

                <label for="upload-photo" class="btn btn-sm btn-outline-green mt-3 ml-3" style=""><i class="icofont-camera"></i> Foto Profil</label>
                <input type="file" id="upload-photo" accept=".jpg, .png, .jpeg" style="display: none;"
                    name="foto_profil">
            </div>
            <button type="submit" id="btnSubmit" style="display: none;"></button>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="mt-4">
                <form action="{{ url('Profil', Auth::user()) }}" method="POST" class="comment-form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label" style="color:black; font-size:13px">Nama
                                    Lengkap<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="nama_lengkap" style="height:30px"
                                    value="{{ Auth::user()->nama_lengkap ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label"
                                    style="color:black; font-size:13px">Username<span
                                        style="color: red">*</span></label>
                                <input type="text" class="form-control" name="username" style="height:30px"
                                    value="{{ Auth::user()->username ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label" style="color:black; font-size:13px">
                                    Email<span style="color: red">*</span>
                                    {{-- @if(!Auth::user()->email_verified)
                                    <span style="color: red; font-size: 12px;">Belum diverifikasi</span>
                                     <a href="{{ url('verification/notice') }}" id="verification-link" style="font-size: 12px;">Verifikasi sekarang</a>
                                    @endif --}}
                                </label>
                                <input type="text" class="form-control" name="email"style="height:30px"
                                    value="{{ Auth::user()->email ?? '' }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label" style="color:black; font-size:13px">No.
                                    Telpon
                                    Aktif/WhatsApp<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="no_telpon" style="height:30px"
                                    value="{{ Auth::user()->no_telpon ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label" style="color:black; font-size:13px">Tanggal
                                    Lahir<span style="color: red">*</span></label>
                                <input type="date" class="form-control" name="tgl_lahir" style="height:30px"
                                    value="{{ Auth::user()->tgl_lahir ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label" style="color:black; font-size:13px">Jenis
                                    Kelamin<span style="color: red">*</span></label>
                                <select name="jenis_kelamin" class="form-control" style="height:30px">
                                    <option value="">-- Pilih Jenis Kelamin --
                                    </option>
                                    <option value="Laki-laki"
                                        {{ (Auth::user()->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan"
                                        {{ (Auth::user()->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="control-label"
                                    style="color:black; font-size:13px">Alamat</label>
                                <input type="text" class="form-control" name="alamat" style="height:30px"
                                    value="{{ Auth::user()->alamat ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="control-label"
                                    style="color:black; font-size:13px">Komunitas/Instansi/Universitas</label>
                                <input type="text" class="form-control" name="komunitas" style="height:30px"
                                    value="{{ Auth::user()->komunitas ?? '' }}">
                            </div>
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-sm btn-outline-green float-right">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
