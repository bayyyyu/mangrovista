<x-web.app-web>
    @include('Web.Home.Section.History.index')
    {{-- <section class="nilai-utama">
        <div class="shop-page" style="margin-bottom:100px">
            <div class="container">
                <div class="section-wrapper">
                    <div class="row justify-content-center">
                        <h3>
                            Nilai Utama Kami
                        </h3>
                        <div class="col-lg-12 col-12">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                   
                                    <div class="swiper-slide">
                                        <div class="card card-1">
                                            <div class="content">
                                                <div class="text">
                                                    <h3>Konservasi Lingkungan</h3>
                                                    <p>Menyoroti pentingnya penanaman pohon mangrove sebagai langkah
                                                        konservasi lingkungan. Menjelaskan manfaat ekosistem
                                                        mangrove dalam menjaga keanekaragaman hayati, melindungi
                                                        pesisir dari abrasi, dan menyimpan karbon.</p>
                                                </div>
                                                <img src="{{ url('/') }}/assets-web2/assets/images/nilai utama/01.png"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>

                                  
                                    <div class="swiper-slide">
                                        <div class="card card-2">
                                            <div class="content">
                                                <div class="text">
                                                    <h3>Edukasi</h3>
                                                    <p>Meningkatkan kesadaran masyarakat akan pentingnya pohon mangrove
                                                        dan dampak positifnya. Menyediakan informasi tentang ekologi
                                                        mangrove, manfaatnya bagi manusia dan lingkungan, serta cara
                                                        terlibat dalam kegiatan penanaman dan pemeliharaan mangrove.</p>
                                                </div>
                                                <img src="{{ url('/') }}/assets-web2/assets/images/nilai utama/02.png"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>

                                   
                                    <div class="swiper-slide">
                                        <div class="card card-3">
                                            <div class="content">
                                                <div class="text">
                                                    <h3>Kolaborasi dan Partisipasi</h3>
                                                    <p>Mendorong kolaborasi dengan komunitas lokal, pemerintah, dan
                                                        organisasi lingkungan untuk memperkuat upaya penanaman pohon
                                                        mangrove. Memotivasi orang-orang untuk bergabung, menjadi
                                                        sukarelawan, atau menyumbangkan dana untuk mendukung proyek
                                                        penanaman mangrove.</p>
                                                </div>
                                                <img src="{{ url('/') }}/assets-web2/assets/images/nilai utama/03.png"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="swiper-slide">
                                        <div class="card card-4">
                                            <div class="content">
                                                <div class="text">
                                                    <h3>Proyek Penanaman Mangrove</h3>
                                                    <p>Menampilkan informasi tentang proyek-proyek penanaman pohon
                                                        mangrove yang sedang berjalan atau telah selesai. Menampilkan
                                                        foto dan cerita sukses tentang bagaimana pohon mangrove telah
                                                        mengubah lingkungan setempat.</p>
                                                </div>
                                                <img src="{{ url('/') }}/assets-web2/assets/images/nilai utama/04.png"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    @include('Web.Home.Section.Informasi.index')

    @include('Web.Home.Section.Maps.index')
    <!-- Style css start-->
    @include('Web.Home.Data.Style.index')
    @push('style')
        <!-- leaflet start -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
            integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets-web2/assets/css/leaflet.defaultextent.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
        <!-- leaflet end -->
        <!-- Marker Cluster -->
        <link rel="stylesheet" href="{{ url('/') }}/assets-sig/assets/css/MarkerCluster.Default.css" />
        <link rel="stylesheet" href="{{ url('/') }}/assets-sig/assets/css/MarkerCluster.css" />
    @endpush
    <!-- Style css end-->

    @push('script')
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
        <script src="{{ url('/') }}/assets-web2/assets/js/leaflet.defaultextent.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/leaflet.markercluster.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- marker cluster --}}
        <script src="{{ url('/') }}/assets-sig/assets/js/leaflet.markercluster.js"></script>
        <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>
    @endpush
</x-web.app-web>
@include('Web.Home.Data.Script.index')
