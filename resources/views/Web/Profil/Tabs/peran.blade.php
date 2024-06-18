<div class="tab-content-item" id="peran-content" style="display:none;">
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'BelumKonfirmasi')" id="defaultOpen">Belum
            Konfirmasi</button>
        <button class="tablinks" onclick="openCity(event, 'SudahKonfirmasi')">Sudah
            Konfirmasi</button>
    </div>
    <!-- Tab content -->
    <div id="BelumKonfirmasi" class="tabcontent">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @if (!is_null($list_role_request) && count($list_role_request) > 0)
                        @foreach ($list_role_request as $role_request)
                            @if ($role_request->status_request == 'Menunggu Konfirmasi')
                                <div class="col-md-6 mb-2">
                                    <div class="wraps ">
                                        <div class="overlays">
                                            <div class="overlay-contents animate">
                                                @php
                                                    $image_path = '';

                                                    switch ($role_request->status_request) {
                                                        case 'Menunggu Konfirmasi':
                                                            $image_path =
                                                                url('/') . '/assets-web2/assets/images/peran/wait.png';
                                                            break;
                                                    }
                                                @endphp

                                                <div class="blue-rectangle animate slide">
                                                    <p style="color: white; font-weight: bolder; margin-top: -5px;">
                                                        {{ $role_request->status_request }}
                                                    </p>
                                                </div>
                                                <p class="animate slide " style="color: white; margin-bottom: -0.2rem;">
                                                    Diajukan Pada:
                                                    <br>
                                                    {{ \Carbon\Carbon::parse($role_request->created_at)->translatedFormat('d F Y') }}
                                                </p>
                                            </div>
                                            <div class="image-contents animate slide ">
                                                <img src="{{ $image_path }}" alt="">
                                            </div>
                                            <div class="dots animate">
                                                <div class="btn btn-sm button-transform animate slide-up mt-3 button-border"
                                                    onclick="toggleTransform(this)">
                                                    <span style="color: white; font-size:10px">Lihat
                                                        Detail</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <p style="text-align: center; justify-content:center; font-weight:bolder;">
                                                <span> Data Pengajuan Pengambilan Peran
                                                    @if (
                                                        $role_request->jumlah_edit < 1 &&
                                                            $role_request->status_request != 'Ditolak' &&
                                                            $role_request->status_request != 'Diterima')
                                                        <a href="{{ url('Ambil-Peran', $role_request->id) }}/edit"
                                                            class="btn btn-sm" style="display: inline-block">
                                                            <i class="icofont-edit"></i>
                                                            Edit
                                                        </a>
                                                    @endif
                                                </span>
                                            </p>
                                            <hr style="margin-top: -20px">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <span class="label-peran" class="label-peran">Nama
                                                                Lengkap</span>
                                                            <p>{{ $role_request->nama_lengkap }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="label-peran">Email</span>
                                                            <p>{{ $role_request->email }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="label-peran">No.
                                                                Telpon</span>
                                                            <p>+62
                                                                {{ $role_request->no_telpon }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="label-peran">Ambil
                                                                Peran
                                                                Sebagai</span>
                                                            <p>{{ $role_request->request_role }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr style="margin-top: -15px">
                                                    <div class="col-md-12" style="text-align: center">
                                                        <span class="label-peran">Alamat
                                                            Lengkap</span>
                                                        <p>{!! $role_request->alamat !!}</p>
                                                    </div>
                                                    <hr style="margin-top: -15px">
                                                    <div class="col-md-12" style="text-align: center">
                                                        <span class="label-peran">Pengalaman
                                                            Terkait</span>
                                                        <p>{!! $role_request->pengalaman !!}</p>
                                                    </div>
                                                    <hr style="margin-top: -15px">
                                                    <div class="col-md-12" style="text-align: center">
                                                        <span class="label-peran">Alasan
                                                            Mengambil
                                                            Peran</span>
                                                        <p>{!! $role_request->alasan !!}</p>
                                                    </div>
                                                    <hr style="margin-top: -15px">
                                                    <div class="col-md-12" style="text-align: center">
                                                        <span class="label-peran">Rencana
                                                            Acara</span>
                                                        <p>{!! $role_request->rencana_acara !!}</p>
                                                    </div>
                                                    <hr style="margin-top: -15px">
                                                </div>
                                                <div class="col-md-12 " style="margin-top: 20px;">
                                                    <div class="btn btn-sm " onclick="restoreOverlay()"
                                                        style="border: 1px solid #064635; border radius:5px">
                                                        <p style="color: #064635; margin-bottom:0; margin-top:-20px">
                                                            Tutup</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if ($role_request->status_request == 'Diterima')
                                    <p class="tab-belum-konfirmasi">Pengajuan Anda Sudah
                                        Diterima</p>
                                @else
                                    <div class="col-md-12"
                                        style="display: flex; justify-content: center; align-items: center; height: 60vh;">
                                        <div
                                            style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                            <img src="{{ url('/') }}/assets-web2/assets/images/peran/sad.png"
                                                style="width: 100px; height: 100px;" class="mb-3">
                                            <p>Opss!! Pengajuan Anda Sudah Ditolak</p>
                                            <a href="{{ url('Ambil-Peran/create') }}"
                                                class="btn btn-md button-transform button-border"
                                                style="color: white; font-size:15px">Ajukan
                                                Lagi?
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @else
                        <div class="col-md-12"
                            style="display: flex; justify-content: center; align-items: center; height: 60vh;">
                            <div
                                style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <img src="{{ url('/') }}/assets-web2/assets/images/icon/empty.png"
                                    style="width: 100px; height: 100px;" class="mb-3">
                                <p>Opss!! Nampaknya kamu belum ada mengajukan pengambilan
                                    peran.</p>
                                <a href="{{ url('Ambil-Peran/create') }}"
                                    class="btn btn-md button-transform button-border"
                                    style="color: white; font-size:15px">Ajukan
                                    Sekarang</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="SudahKonfirmasi" class="tabcontent">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @if (!is_null($list_role_request) && count($list_role_request) > 0)
                        @foreach ($list_role_request as $role_request)
                            @if ($role_request->status_request == 'Diterima' || $role_request->status_request == 'Ditolak')
                                <div class="col-md-6 mb-2">
                                    <div class="wraps ">
                                        <div class="overlays">
                                            <div class="overlay-contents animate">
                                                @php
                                                    $background_color = '';
                                                    $image_path = '';

                                                    switch ($role_request->status_request) {
                                                        case 'Diterima':
                                                            
                                                            $image_path =
                                                                url('/') .
                                                                '/assets-web2/assets/images/peran/confirm.png';
                                                            break;
                                                        case 'Ditolak':
                                                            
                                                            $image_path =
                                                                url('/') . '/assets-web2/assets/images/peran/sad.png';
                                                            break;
                                                    }
                                                @endphp

                                                @if ($role_request->status_request == 'Menunggu Konfirmasi')
                                                    <span
                                                        class="badge badge-pill badge-primary">{{ $role_request->status_request }}</span>
                                                @elseif ($role_request->status_request == 'Diterima')
                                                    <span
                                                        class="badge badge-pill badge-success">{{ $role_request->status_request }}</span>
                                                @elseif ($role_request->status_request == 'Ditolak')
                                                    <span
                                                        class="badge badge-pill badge-danger">{{ $role_request->status_request }}</span>
                                                @endif

                                                @if ($role_request->status_request == 'Ditolak')
                                                    <p class="animate slide"
                                                        style="text-align: center; color: #d6d6d6;  font-style: italic; font-size:12px; margin-top:-60px">
                                                        Lihat alasan penolakan di detail
                                                    </p>
                                                    <p class="animate slide"
                                                        style="text-align: center; color: #d6d6d6;  font-style: italic; font-size:12px; margin-top:-95px">
                                                        pengajuan anda </p>
                                                @endif
                                                <p class="animate slide "
                                                    style="color: white; margin-bottom: -0.2rem;">
                                                    Diajukan Pada:
                                                    <br>
                                                    {{ \Carbon\Carbon::parse($role_request->created_at)->translatedFormat('d F Y') }}
                                                </p>
                                            </div>
                                            <div class="image-contents animate slide ">
                                                <img src="{{ $image_path }}" alt="">
                                            </div>
                                            <div class="dots animate">
                                                <div class="btn btn-sm button-transform animate slide-up mt-3 button-border"
                                                    onclick="toggleTransform(this)">
                                                    <span style="color: white; font-size:10px">Lihat
                                                        Detail</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <p style="text-align: center; justify-content:center; font-weight:bolder;">
                                                <span> Data Pengajuan Pengambilan Peran
                                                    @if (
                                                        $role_request->jumlah_edit < 1 &&
                                                            $role_request->status_request != 'Ditolak' &&
                                                            $role_request->status_request != 'Diterima')
                                                        <a href="{{ url('Ambil-Peran', $role_request->id) }}/edit"
                                                            class="btn btn-sm" style="display: inline-block">
                                                            <i class="icofont-edit"></i>
                                                            Edit
                                                        </a>
                                                    @endif
                                                </span>
                                            </p>
                                            <hr style="margin-top: -20px">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <span class="label-peran" class="label-peran">Nama
                                                                Lengkap</span>
                                                            <p>{{ $role_request->nama_lengkap }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="label-peran">Email</span>
                                                            <p>{{ $role_request->email }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="label-peran">No.
                                                                Telpon</span>
                                                            <p>+62
                                                                {{ $role_request->no_telpon }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="label-peran">Ambil
                                                                Peran
                                                                Sebagai</span>
                                                            <p>{{ $role_request->request_role }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr style="margin-top: -15px">
                                                    <div class="col-md-12" style="text-align: center">
                                                        <span class="label-peran">Alamat
                                                            Lengkap</span>
                                                        <p>{!! $role_request->alamat !!}</p>
                                                    </div>
                                                    <hr style="margin-top: -15px">
                                                    <div class="col-md-12" style="text-align: center">
                                                        <span class="label-peran">Pengalaman
                                                            Terkait</span>
                                                        <p>{!! $role_request->pengalaman !!}</p>
                                                    </div>
                                                    <hr style="margin-top: -15px">
                                                    <div class="col-md-12" style="text-align: center">
                                                        <span class="label-peran">Alasan
                                                            Mengambil
                                                            Peran</span>
                                                        <p>{!! $role_request->alasan !!}</p>
                                                    </div>
                                                    <hr style="margin-top: -15px">
                                                    <div class="col-md-12" style="text-align: center">
                                                        <span class="label-peran">Rencana
                                                            Acara</span>
                                                        <p>{!! $role_request->rencana_acara !!}</p>
                                                    </div>
                                                    <hr style="margin-top: -15px">
                                                    @if ($role_request->status_request == 'Ditolak')
                                                        <div class="col-md-12" style="text-align: center">
                                                            <span class="label-peran">Alasan
                                                                Penolakan</span>
                                                            <p>{!! $role_request->alasan_penolakan !!}</p>
                                                        </div>
                                                    @endif
                                                    <hr style="margin-top: -15px">
                                                </div>
                                                <div class="col-md-12 " style="margin-top: 20px;">
                                                    <div class="btn btn-sm " onclick="restoreOverlay()"
                                                        style="border: 1px solid #064635; border radius:5px">
                                                        <p style="color: #064635; margin-bottom:0; margin-top:-20px">
                                                            Tutup</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p class="tab-sudah-konfirmasi">Pengajuan Anda Belum
                                    Dikonfirmasi
                                </p>
                            @endif
                        @endforeach
                    @else
                        <div class="col-md-12"
                            style="display: flex; justify-content: center; align-items: center; height: 60vh;">
                            <div
                                style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <img src="{{ url('/') }}/assets-web2/assets/images/icon/empty.png"
                                    style="width: 100px; height: 100px;" class="mb-3">
                                <p>Opss!! Nampaknya kamu belum ada mengajukan pengambilan
                                    peran.</p>
                                <a href="{{ url('Ambil-Peran/create') }}"
                                    class="btn btn-md button-transform button-border"
                                    style="color: white; font-size:15px">Ajukan
                                    Sekarang</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
