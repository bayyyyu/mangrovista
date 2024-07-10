<x-app>
    <div class="row mt-3">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="col-md-12 py-2 px-2 d-print-none">
                    <a href="{{ url('Admin/Katalog-Pohon') }}" class="btn btn-sm btn-outline-primary mb-2">
                        <i class="fa fa-arrow-left ">
                        </i>
                        Kembali
                    </a>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled faq-qa">
                                        <div class="col-lg-6  mx-auto text-center">
                                            <h4 class="card-title" style="font-weight: bold">{{ $katalog_pohon->nama_pohon }}{{ $katalog_pohon->nama_lain_pohon }}</h4>
                                            <div class="card-body">
                                                <a href="{{ asset($katalog_pohon->foto) }}" class="image-popup-vertical-fit">
                                                    <img src="{{ asset($katalog_pohon->foto) }}" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div><!--end card-body-->
                                        </div><!--end col-->
                                    
                                        <li class="mb-5 mb-lg-0">
                                            <h6 class="text-center" style="text-decoration: underline">Deskripsi</h6>
                                            <p class="font-14" style="text-align: justify">
                                                {!! $katalog_pohon->deskripsi !!}</p>
                                        </li>            
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
