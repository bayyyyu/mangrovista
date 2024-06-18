<x-App>
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
                                $status = $role_request->status_request;
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
                                {{ $role_request->status_request }}
                            </div>
                        </div>

                    </div><!--end row-->
                </div><!--end card-body-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <h6 class="mb-0"><b>Tanggal Pengajuan :</b>
                                    {{ $role_request->created_at->isoFormat('DD MMMM YYYY') }}</h6>
                                <h6><b>ID Pengajuan :</b> {{ $role_request->id }}</h6>
                            </div>
                        </div><!--end col-->
                        <div class="col-md-6">
                            <div class="float-left">
                                <address class="font-13">
                                    <strong class="font-14">Diajukan Oleh :</strong><br>
                                    {{ $role_request->nama_lengkap }}<br>
                                    {{ $role_request->alamat }}<br>
                                    0{{ $role_request->no_telpon }}
                                </address>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled faq-qa">
                                        <li class="mb-5">
                                            <h6 class="">Alasan Pengajuan</h6>
                                            <p class="font-14 text-muted ms-3">{{ $role_request->alasan }}</p>
                                        </li>
                                        <li class="mb-5">
                                            <h6 class="">Pengalaman Terkait</h6>
                                            <p class="font-14 text-muted  ms-3">{{ $role_request->pengalaman }}</p>
                                        </li>
                                        <li class="mb-5 mb-lg-0">
                                            <h6 class="">Rencana Acara</h6>
                                            <p class="font-14 text-muted ms-3">{{ $role_request->rencana_acara }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div> <!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->

                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <h5 class="mt-4">Syarat dan Ketentuan :</h5>
                            <ul class="ps-3">
                                <li><small class="font-12">Calon penyelenggara event harus mengajukan proposal dengan
                                        detail event.</small></li>
                                <li><small class="font-12">Proposal event perlu disetujui dan divalidasi</small></li>
                                <li><small class="font-12">Event harus mematuhi hukum dan peraturan yang
                                        berlaku.</small></li>
                                <li><small class="font-12">Penyelenggara bertanggung jawab atas semua aspek
                                        event.</small></li>
                                <li><small class="font-12">Penyelenggara harus memberikan laporan dan evaluasi setelah
                                        event selesai.</small></li>
                            </ul>
                        </div> <!--end col-->
                        <div class="col-lg-6 align-self-end">
                            <div class="float-end" style="width: 30%;">
                                <small>
                                    @if (auth()->check())
                                        {{ auth()->user()->nama_lengkap }}
                                    @endif
                                </small>
                                <img src="{{ url('/') }}/assets-admin/assets/images/signature.png" alt="png"
                                    class="mt-2 mb-1" height="20">
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
                                <form action="{{ url('Admin/Pengajuan-Peran/' . $role_request->id . '/confirm')}}" method="post"
                                    enctype="multipart/form-data">
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

    {{-- modal untuk penolakan pengajuan --}}
    <div class="modal fade bd-example-modal-lg" id="exampleModalLarge" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Alasan Penolakan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('Admin/Pengajuan-Peran/' . $role_request->id . '/reject') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <textarea id="rejectionReason" name="alasan_penolakan" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-App>
