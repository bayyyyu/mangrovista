<div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-contact-tab"
    style="overflow-y: auto; max-height: 400px;">
    <div class="container animated animated-done bootdey" data-animate="fadeIn" data-animate-delay="0.05"
        style="animation-delay: 0.05s;">
        @foreach ($event->monitoring_events as $monitoring)
            <div class="timeline timeline-left timeline-breaker-bottom mx-lg-10 mb-3">
                <div class="timeline-breaker">{{ \Carbon\Carbon::parse($event->tanggal_monitoring)->translatedFormat('d F Y') }}</div>
                <!--Timeline item 1-->
                <div class="timeline-item mt-3 row text-center p-2">
                    <div class="col font-weight-bold text-md-left">
                        {{ $monitoring->monitoring_deskripsi }}
                    </div>

                </div>
                <!--Timeline item 2 - NOTE: the .right class-->
                <div class="timeline-item mt-3  p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="img-fluid p-3">
                                <img src="{{ asset($monitoring->foto_monitoring) }}"
                                    style="height:auto; width:100%; object-fit:cover; border-radius: 15px"
                                    class="img-responsive">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="wrapper-detail">
                                        <div class="p-2">
                                            <img class="img img-responsive lazy"
                                                style="width: 80px; margin: 0px auto; display: block;"
                                                src="{{ url('/') }}/assets-web2/assets/images/icon/update/hidup.png">
                                            <div class="detail-value mt-2 text-center">
                                                Pohon Hidup
                                            </div>
                                            <div class="detail-info text-bold text-center">
                                                {{ $monitoring->pohon_hidup }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="wrapper-detail">
                                        <div class="p-2">
                                            <img class="img img-responsive lazy"
                                                style="width: 80px; margin: 0px auto; display: block;"
                                                src="{{ url('/') }}/assets-web2/assets/images/icon/update/mati.png">
                                            <div class="detail-value mt-2 text-center">
                                                Pohon Mati
                                            </div>
                                            <div class="detail-info text-bold text-center">
                                                {{ $monitoring->pohon_mati }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="wrapper-detail">
                                        <div class="p-2">
                                            <img class="img img-responsive lazy"
                                                style="width: 80px; margin: 0px auto; display: block;"
                                                src="{{ url('/') }}/assets-web2/assets/images/icon/update/diameter.png">
                                            <div class="detail-value mt-2 text-center">
                                                Rata-Rata Diameter Pohon
                                            </div>
                                            <div class="detail-info text-bold text-center">
                                                {{ $monitoring->diameter_pohon }} cm
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="wrapper-detail">
                                        <div class="p-2">
                                            <img class="img img-responsive lazy"
                                                style="width: 80px; margin: 0px auto; display: block;"
                                                src="{{ url('/') }}/assets-web2/assets/images/icon/update/tinggi.png">
                                            <div class="detail-value mt-2 text-center">
                                                Rata-Rata Tinggi Pohon
                                            </div>
                                            <div class="detail-info text-bold text-center">
                                                {{ $monitoring->tinggi_pohon }} cm
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
