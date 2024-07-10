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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2 text-center">
                                    <div class="col-lg-12">
                                        @if ($list_dokumentasi->where('event_id', $event->id)->isNotEmpty())
                                            @php
                                                $dokumentasiCount = $list_dokumentasi->count();
                                                $isSingleFile = $dokumentasiCount === 1;
                                                $isMultipleFiles = $dokumentasiCount > 1;
                                            @endphp

                                            @if ($isSingleFile)
                                                @php
                                                    $singleDokumentasi = $list_dokumentasi->first();
                                                    $isVideo = preg_match(
                                                        '/\.(mp4|webm|ogg)$/i',
                                                        $singleDokumentasi->file,
                                                    );
                                                @endphp

                                                @if ($isVideo)
                                                    <video width="100%" controls>
                                                        <source src="{{ asset($singleDokumentasi->file) }}"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                    <img src="{{ asset($singleDokumentasi->file) }}"
                                                        class="d-block w-100" alt="...">
                                                @endif
                                            @elseif ($isMultipleFiles)
                                                <div id="carouselExampleIndicators" class="carousel slide">
                                                    <ol class="carousel-indicators">
                                                        @foreach ($list_dokumentasi as $index => $dokumentasi)
                                                            <li data-bs-target="#carouselExampleIndicators"
                                                                data-bs-slide-to="{{ $index }}"
                                                                class="{{ $index === 0 ? 'active' : '' }}"
                                                                style="background-color: black;"></li>
                                                        @endforeach
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        @foreach ($list_dokumentasi as $index => $dokumentasi)
                                                            @php
                                                                $isVideo = preg_match(
                                                                    '/\.(mp4|webm|ogg)$/i',
                                                                    $dokumentasi->file,
                                                                );
                                                            @endphp
                                                            <div
                                                                class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                                @if ($isVideo)
                                                                    <video width="100%" height="350px"
                                                                        style="object-fit: contain; padding-block:30px" controls>
                                                                        <source src="{{ asset($dokumentasi->file) }}"
                                                                            type="video/mp4">
                                                                        Your browser does not support the video tag.
                                                                    </video>
                                                                @else
                                                                    <img src="{{ asset($dokumentasi->file) }}"
                                                                        class="d-block w-100"
                                                                        style="height: 350px; object-fit: contain; padding-block:30px">
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                        role="button" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                            style="background-color: black;" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                        role="button" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                            style="background-color: black;" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </a>
                                                </div>
                                            @endif
                                        @else
                                            <div
                                                style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding-block:50px">
                                                <img src="{{ url('/') }}/assets-web2/assets/images/icon/empty.png"
                                                    style="width: 100px; height: 100px;" class="mb-3">
                                                <p>Belum ada dokumentasi yang di upload</p>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div> <!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
</x-app>
<style>
    .carousel-indicators li {
        background-color: black;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: black;
    }
</style>
