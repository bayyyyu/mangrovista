<div class="tab-pane fade" id="nav-dokumentasi" role="tabpanel" aria-labelledby="nav-profile-tab">
    @if ($list_dokumentasi->where('event_id', $event->id)->isNotEmpty())
        <div class="row">
            <div class="col-md-5">
                <div id="demo" data-ride="false" class="carousel slide mt-3">
                    <ul class="carousel-indicators">
                        @foreach ($list_dokumentasi as $key => $dokumentasi)
                            <li data-target="#demo" data-slide-to="{{ $key }}"
                                class="{{ $key == 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ul>

                    <div class="carousel-inner">
                        @foreach ($list_dokumentasi as $key => $dokumentasi)
                            @if (pathinfo($dokumentasi->file, PATHINFO_EXTENSION) === 'jpg' ||
                                    pathinfo($dokumentasi->file, PATHINFO_EXTENSION) === 'png')
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($dokumentasi->file) }}" width="500" height="300">
                                </div>
                            @elseif (pathinfo($dokumentasi->file, PATHINFO_EXTENSION) === 'mp4')
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <video controls style="width: 100%; height:300px;">
                                        <source src="{{ asset($dokumentasi->file) }}" type="video/mp4">
                                        Maaf, browser Anda tidak mendukung pemutaran
                                        video.
                                    </video>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <!-- Deskripsi -->
            <div class="deskripsi-dokumentasi col-md-7 mt-3" style="overflow-y: auto; max-height: 350px;">
                @foreach ($list_dokumentasi as $key => $dokumentasi)
                    <div class="deskripsi-item {{ $key == 0 ? 'active' : '' }}">
                        <p style="text-align: justify; color:black; ">
                            {{ $dokumentasi->deskripsi }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <style>

        </style>
    @else
        <div
            style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding-block:50px">
            <img src="{{ url('/') }}/assets-web2/assets/images/icon/empty.png" style="width: 100px; height: 100px;"
                class="mb-3">
            <p>Belum ada dokumentasi yang di upload</p>
        </div>
    @endif
</div>
