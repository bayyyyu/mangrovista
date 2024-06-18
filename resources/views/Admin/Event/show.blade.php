<x-app>
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="col-md-12">
                    <a href="{{ url('Admin/Event') }}" class="btn btn-dark mb-2"><i
                            class="fa fa-arrow-left "></i>Kembali</a>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <p style="color: white">Detail Data penanaman </p>
                            <div class="card-tools">
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="card-body">
                                        <h3 class="text-center">Detail</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder" >Nama Event</strong>
                                                @if ($event->nama_event)
                                                    <p style="font-size:15px">{{ $event->nama_event }}</p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Waktu Kegiatan</strong>
                                                    <p style="font-size:15px">{!! date('d F Y', strtotime($event->tanggal_event)) !!} jam {!! date('H:i', strtotime($event->jam)) !!}</p>
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Jumlah Penanaman</strong>
                                                    <p style="font-size:15px">{{ $jumlah_penanaman }} pohon</p>
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Jumlah Pohon Yang Hidup</strong>
                                                    <p style="font-size:15px">{{ $jumlah_pohon_hidup[$event->id]}} pohon</p>
                                            </div>
                                            
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-center">
                                                    <strong style="font-weight: bolder;">Deskripsi</strong>
                                                </div>
                                                <p style="font-size:15px">{!! $event->deskripsi !!}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3 class="text-center">Foto</h3>
                                        <hr>
                                        <div class="block">
                                            <div class="product-item">
                                                    <img src="{{ asset($event->foto) }}" alt="Image"
                                                        style="  display: block;width: 100%;height: auto;object-fit: cover;object-position: center;box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <div class="row mt-3">
        <div class="col-lg-12 mx-auto">
            <a href="{{ url('Admin/Pengajuan-Peran') }}" class="btn btn-primary mb-2">
                <i class="fa fa-arrow-left ">
                </i>
                Kembali
            </a>
            <div class="card">
                <div class="card-body invoice-head">
                    <div class="row">
                        <div class="col-md-10 align-self-center">
                            <img src="{{ url('/') }}/assets-web2/assets/images/logo/blue.png" alt="logo-small"
                                class="logo-sm me-1" height="30">
                            <img src="{{ url('/') }}/assets-web2/assets/images/logo/text-black.png"
                                alt="logo-small" class="logo-sm me-1 mt-2" height="20">
                        </div><!--end col-->
                        <div class="col-md-2 float-end">
                            @php
                                $status = $event->status;
                                $background_color = '';

                                switch ($status) {
                                    case 'Menunggu Konfirmasi':
                                        $background_color = '#4E9ED4';
                                        break;
                                    case 'Diterima':
                                        $background_color = '#06A44B';
                                        break;
                                    case 'Ditolak':
                                        $background_color = '#f5325c';
                                        break;
                                    default:
                                        $background_color = 'transparent';
                                        break;
                                }
                            @endphp
                            <div
                                style="background-color: {{ $background_color }}; color: #fff; padding: 5px; border-radius: 5px;">
                                {{ $event->status }}
                            </div>
                        </div>

                    </div><!--end row-->
                </div><!--end card-body-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <h6 class="mb-0"><b>Tanggal Pengajuan :</b>
                                    {{ $event->created_at->isoFormat('DD MMMM YYYY') }}</h6>
                                <h6><b>ID Pengajuan :</b> {{ $event->id }}</h6>
                            </div>
                        </div><!--end col-->
                        <div class="col-md-6">
                            <div class="float-left">
                                <address class="font-13">
                                    <strong class="font-14">Diajukan Oleh :</strong><br>
                                    {{ $event->user->nama_lengkap }}<br>
                                </address>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled faq-qa">
                                        <li>
                                            <h6 class="">Nama Event</h6>
                                            <p class="font-14 text-muted ms-3">{{ $event->nama_event }}</p>
                                        </li>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <li>
                                                    <h6 class="">Tanggal Pelaksanaan Event</h6>
                                                    <p class="font-14 text-muted  ms-3">
                                                        {{ \Carbon\Carbon::parse($event->tanggal_event)->isoFormat('DD MMMM YYYY') }}
                                                        s/d
                                                        {{ \Carbon\Carbon::parse($event->tanggal_selesai)->isoFormat('DD MMMM YYYY') }}
                                                    </p>
                                                </li>
                                            </div>
                                            <div class="col-md-6">
                                                <li>
                                                    <h6 class="">Jam</h6>
                                                    <p class="font-14 text-muted  ms-3"> {{ $event->jam }}</p>
                                                </li>
                                            </div>
                                        </div>
                                        <hr>
                                        <li class="mb-5 mb-lg-0">
                                            <h6 class="text-center">Deskripsi</h6>
                                            <p class="font-14 text-muted ms-3">{{ strip_tags($event->deskripsi) }}</p>
                                        </li>
                                        <hr>
                                        <div class="row">
                                            <div class="text-center">
                                                <h6>Titik Koordinasi</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <li>
                                                    <h6 class="">Latitude</h6>
                                                    <p class="font-14 text-muted  ms-3"> {{ $event->lat }}</p>
                                                </li>
                                            </div>
                                            <div class="col-md-4">
                                                <li>
                                                    <h6 class="">Longitude</h6>
                                                    <p class="font-14 text-muted  ms-3"> {{ $event->lng }}</p>
                                                </li>
                                            </div>
                                            <div class="col-md-4">
                                                <li>
                                                    <h6 class="">Lokasi</h6>
                                                    <a class="btn btn-outline-primary popup-gmaps"
                                                        href="https://maps.google.com/maps?q={{ $event->lat }},{{ $event->lng }}&hl=en&t=v">Lihat
                                                        Lokasi</a>
                                                </li>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title text-center">Dokumen Tambahan</h4>
                                                        </div><!--end card-header-->
                                                        <div class="file-box-content mt-2 mb-2"
                                                            style="margin-left: 10px">
                                                            @if ($event->data_tambahan_event !== null && $event->data_tambahan_event->count() > 0)
                                                                <div class="file-box-content mt-2 mb-2"
                                                                    style="margin-left: 10px">
                                                                    @foreach ($event->data_tambahan_event as $dokumen)
                                                                        <div class="file-box">
                                                                            @php
                                                                                $extension = pathinfo(
                                                                                    $dokumen->dokumen_tambahan,
                                                                                    PATHINFO_EXTENSION,
                                                                                );
                                                                                switch ($extension) {
                                                                                    case 'pdf':
                                                                                        $icon =
                                                                                            'lar la-file-pdf text-danger';
                                                                                        $iconDownload = 'lar la-eye';
                                                                                        $isPdf = true;
                                                                                        break;
                                                                                    case 'doc':
                                                                                    case 'docx':
                                                                                        $icon =
                                                                                            'lar la-file-alt text-primary';
                                                                                        $iconDownload =
                                                                                            'dripicons-download';
                                                                                        $isPdf = false;
                                                                                        break;
                                                                                    case 'jpg':
                                                                                    case 'jpeg':
                                                                                    case 'png':
                                                                                        $icon =
                                                                                            'lar la-file-image text-warning';
                                                                                        $iconDownload =
                                                                                            'las la-arrows-alt image-popup-vertical-fit';
                                                                                        $isPdf = false;
                                                                                        break;
                                                                                    default:
                                                                                        $icon =
                                                                                            'lar la-file text-secondary';
                                                                                        $iconDownload =
                                                                                            'dripicons-download';
                                                                                        $isPdf = false;
                                                                                        break;
                                                                                }
                                                                            @endphp
                                                                            @if ($isPdf)
                                                                                <a href="{{ url($dokumen->dokumen_tambahan) }}"
                                                                                    target="popup"
                                                                                    class="download-icon-link"
                                                                                    onClick="window.open('{{ url($dokumen->dokumen_tambahan) }}','popup','width=800,height=600'); return false;">
                                                                                    <i
                                                                                        class="{{ $iconDownload }} file-download-icon"></i>
                                                                                </a>
                                                                                @elseif ($extension == 'docx')
                                                                                <a href="{{ url($dokumen->dokumen_tambahan) }}"
                                                                                    class="download-icon-link">
                                                                                    <i class="{{ $iconDownload }} file-download-icon"></i>
                                                                                </a>
                                                                                @else
                                                                                <a href="{{ url($dokumen->dokumen_tambahan) }}"
                                                                                    class="download-icon-link image-popup-vertical-fit">
                                                                                    <i class="{{ $iconDownload }} file-download-icon"></i>
                                                                                </a>
                                                                            @endif
                                                                            <div class="text-center">
                                                                                <i class="{{ $icon }}"></i>
                                                                                <h6 class="text-truncate">
                                                                                    {{ $dokumen->nama_berkas }}</h6>
                                                                                <small
                                                                                    class="text-muted">{{ $dokumen->created_at->isoFormat('DD MMMM YYYY') }}
                                                                                    /
                                                                                    {{ $dokumen->nama_berkas }}</small>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <p>Tidak ada dokumen tambahan.</p>
                                                            @endif
                                                        </div>
                                                    </div><!--end card-->
                                                </div><!--end col-->
                                            </div>

                                            <hr>
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Foto</h4>
                                                    </div><!--end card-header-->
                                                    <div class="card-body">
                                                        <a href="{{ asset($event->foto) }}"
                                                            class="image-popup-vertical-fit">
                                                            <img src="{{ asset($event->foto) }}" alt=""
                                                                class="img-fluid">
                                                        </a>
                                                    </div><!--end card-body-->
                                                </div><!--end card-->
                                            </div><!--end col-->
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Dokumentasi</h4>
                                                    </div><!--end card-header-->
                                                    <div class="card-body">
                                                        <a href="{{ asset($event->foto_dokumentasi) }}"
                                                            class="image-popup-vertical-fit">
                                                            <img src="{{ asset($event->foto_dokumentasi) }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </div><!--end card-body-->
                                                </div><!--end card-->
                                            </div><!--end col-->
                                        </div>
                                    </ul>
                                </div>
                            </div> <!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->

                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <h5 class="mt-4">Syarat dan Ketentuan :</h5>
                            <ul class="ps-3">
                                <li><small class="font-12">Penyelenggara event harus mengajukan proposal dengan
                                        detail event.</small></li>
                                <li><small class="font-12">Proposal event perlu disetujui dan divalidasi</small></li>
                                <li><small class="font-12">Event harus mematuhi hukum dan peraturan yang
                                        berlaku.</small></li>
                                <li><small class="font-12">Penyelenggara bertanggung jawab atas semua aspek
                                        event.</small></li>
                                <li><small class="font-12">Penyelenggara harus memberikan laporan dan evaluasi setelah
                                        event selesai.</small></li>
                                <li><small class="font-12">Penyelenggara harus mengisi data penanaman di setiap event jika telah selesai</small></li>
                            </ul>
                        </div> <!--end col-->
                        <div class="col-lg-6 align-self-end">
                            <div class="float-end" style="width: 30%;">
                                <small>
                                    @if (auth()->check())
                                        {{ auth()->user()->nama_lengkap }}
                                    @endif
                                </small>
                                <img src="{{ url('/') }}/assets-admin/assets/images/signature.png"
                                    alt="png" class="mt-2 mb-1" height="20">
                                <p class="border-top">Signature</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12 col-xl-4 ms-auto align-self-center">
                            <div class="text-center"><small class="font-12">Terima kasih banyak telah bergabung dengan
                                    kami.</small></div>
                        </div><!--end col-->
                        <div class="col-lg-12 col-xl-4">
                            <div class="float-end d-print-none">
                                <form action="{{ url('Admin/Event/' . $event->id . '/confirm') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="_method" value="PUT">
                                    <a href="javascript:window.print()" class="btn btn-soft-info btn-sm">Print</a>
                                    {{-- <a href="#" class="btn btn-soft-success btn-sm">Konfirmasi</a> --}}
                                    <button type="submit" class="btn btn-soft-success btn-sm">Konfirmasi</button>
                                    <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalLarge">
                                        Tolak
                                    </button>
                                </form>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
</x-app>

<script>
    PSPDFKit.beban({
            wadah: " #pspdfkit ",
            document: " document.pdf " // Tambahkan jalur ke dokumen Anda di sini.
        })
        .then(fungsi(contoh) {
            console.log(" PSPDFKit dimuat ", contoh);
        })
        .menangkap(fungsi(kesalahan) {
            console.error(kesalahan.pesan);
        });
</script>
