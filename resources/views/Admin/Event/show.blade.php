<x-app>
    <div class="row mt-3">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="col-md-12 py-2 px-2 d-print-none">
                    <a href="{{ url('Admin/Event') }}" class="btn btn-sm btn-outline-primary mb-2">
                        <i class="fa fa-arrow-left ">
                        </i>
                        Kembali
                    </a>
                    <a href="javascript:window.print()" class="btn btn-soft-info btn-sm mb-2 float-end">Print</a>
                </div>
                <div class="card-body invoice-head">
                    <div class="row">
                        <div class="col-md-10 align-self-center">
                            <img src="{{ url('/') }}/assets-web2/assets/images/logo/blue.png" alt="logo-small"
                                class="logo-sm me-1" height="30">
                            <img src="{{ url('/') }}/assets-web2/assets/images/logo/text-black.png"
                                alt="logo-small" class="logo-sm me-1 mt-2" height="20">
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            {{-- <div class=""> --}}
                            <h6 class="mb-0"><b>Tanggal Pengajuan :</b>
                                {{ $event->created_at->isoFormat('DD MMMM YYYY') }}
                            </h6>
                            {{-- </div> --}}
                        </div><!--end col-->
                        <div class="col-md-6">
                            <div class="float-left">
                                <h6 class="mb-0"><b>Penyelnggara :</b>
                                    {{ $event->user->nama_lengkap }}
                                </h6>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled faq-qa">
                                        <div class="col-lg-6  mx-auto text-center">
                                            <h4 class="card-title">Thumbnail Event</h4>
                                            <div class="card-body">
                                                <a href="{{ asset($event->foto) }}" class="image-popup-vertical-fit">
                                                    <img src="{{ asset($event->foto) }}" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div><!--end card-body-->
                                        </div><!--end col-->
                                        <li>
                                            <h6 class="">Nama Event</h6>
                                            <p class="font-14">{{ $event->nama_event }}</p>
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
                                            <h6 class="text-center" style="text-decoration: underline">Deskripsi</h6>
                                            <p class="font-14" style="text-align: justify">
                                                {{ strip_tags($event->deskripsi) }}</p>
                                        </li>
                                        <hr>
                                        <div class="row">
                                            <div class="text-center">
                                                <h6 style="text-decoration: underline">Data Lokasi Event</h6>
                                            </div>

                                            @if ($event->lokasi)
                                                <div class="col-md-6">
                                                    <li>
                                                        <h6 class="">Nama Lokasi</h6>
                                                        <p class="font-14 text-muted">{{ $event->lokasi->nama_lokasi }}
                                                        </p>
                                                    </li>
                                                </div>
                                                <div class="col-md-6">
                                                    <li>
                                                        <h6 class="">Jenis Ekosistem</h6>
                                                        <p class="font-14 text-muted">
                                                            {{ $event->lokasi->jenis_ekosistem }}</p>
                                                    </li>
                                                </div>
                                                <div class="col-md-6">
                                                    <li>
                                                        <h6 class="">Alamat Lokasi</h6>
                                                        <p class="font-14 text-muted">
                                                            {{ $event->lokasi->alamat_lokasi }}</p>
                                                    </li>
                                                </div>
                                                <div class="col-md-6">
                                                    <li>
                                                        <h6 class="">Lokasi</h6>
                                                        <a class="btn btn-outline-primary popup-gmaps"
                                                            href="https://maps.google.com/maps?q={{ $event->lokasi->lat }},{{ $event->lokasi->lng }}&hl=en&t=v">Lihat
                                                            Lokasi</a>
                                                    </li>
                                                </div>
                                            @else
                                                <div class="col-md-12">
                                                    <p class="font-14 text-muted">Lokasi tidak tersedia.</p>
                                                </div>
                                            @endif
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
                                                                                    <i
                                                                                        class="{{ $iconDownload }} file-download-icon"></i>
                                                                                </a>
                                                                            @else
                                                                                <a href="{{ url($dokumen->dokumen_tambahan) }}"
                                                                                    class="download-icon-link image-popup-vertical-fit">
                                                                                    <i
                                                                                        class="{{ $iconDownload }} file-download-icon"></i>
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
                                        </div>
                                    </ul>
                                </div>
                            </div> <!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->

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
