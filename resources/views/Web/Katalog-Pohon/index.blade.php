<x-web.app-webNoSlider>
    <div class="shop-page mt-5 mb-5">
        <div class="container">
            <div class="judul-atas" style="margin-top:80px">
                <h3 style="font-weight:bolder">Katalog Pohon Mangrove</h3>
            </div>
            <hr style="margin-bottom:20px">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-12">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!-- Card 1 -->
                                @foreach ($list_katalog_pohon as $katalog_pohon)
                                    <div class="swiper-slide">
                                        <div class="card" data-id="{{ $katalog_pohon->id }}"
                                            style="border-radius: 10px; box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2); overflow: hidden; height:360px">
                                            <div class="swiper-slide swiper-slide-active">
                                                <div class="card-pohon">
                                                    <img src="{{ asset($katalog_pohon->foto) }}"
                                                        style="height:260px; object-fit:cover;">
                                                    <div class="gradient-overlay"
                                                        style="position: absolute; top: 100px; left: 0; right: 0; bottom: 98px; background: linear-gradient(to top, rgba(4, 95, 80, 0.9), rgba(4, 95, 80, 0));">
                                                    </div>
                                                    <div
                                                        style="position: absolute; top: 150px; left: 0; right: 0; bottom: 98px; padding: 0 1.5rem; z-index: 1;">
                                                        <div class="text-center fs-20 text-green-100 ellipsis-1">
                                                            <p
                                                                style="color: white; font-weight: bolder; margin-bottom: 0;">
                                                                {{ $katalog_pohon->nama_pohon }}</p>
                                                            <p
                                                                style="color: white; font-weight:initial; font-style: italic; margin-top: 0;">
                                                                {{ $katalog_pohon->nama_lain_pohon }}</p>
                                                        </div>
                                                    </div>
                                                    <div style="padding: 1.5rem;">
                                                        <div class="text-center fs-20 text-green-100 ellipsis-1">
                                                            <p style="color: #045F50; font-weight:bolder">
                                                                {{ $katalog_pohon->nama_pohon }}</p>
                                                            <p
                                                                style="color: black; font-weight:bolder;font-style:italic">
                                                                {{ $katalog_pohon->nama_lain_pohon }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Tombol navigasi swiper -->
                            <div class="swiper-button-next "
                                style=" background-image: url('assets-web2/assets/images/swiper/right.png')"></div>
                            <div class="swiper-button-prev"
                                style=" background-image: url('assets-web2/assets/images/swiper/back-arrow.png')"></div>
                        </div>
                        <div class="col-xs-12 mb-3" style="margin-top:50px;">
                            <h5 style="font-weight: inherit">Ringkasan Pohon</h5>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="card card-image">
                                        <div class="detail">
                                            <div class="gradient-overlay"
                                                style="position: absolute; top: 200px; left: 0; right: 0; bottom: 0px; background: linear-gradient(to top, rgba(4, 95, 80, 0.9), rgba(4, 95, 80, 0));">

                                            </div>
                                            <img src="" alt="" style="height: 300px; object-fit:cover">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="card card-detail" style="">
                                        <div class="content" style="">
                                            <div class="nama">
                                                <p style="color: #045F50; font-size:25px;font-weight:inherit"></p>
                                                <p
                                                    style="color: black; font-size:20px;font-weight:bold;font-style:italic;">
                                                </p>
                                            </div>
                                            <div class="deskripsi" style=" padding-right:20px;">
                                                <div style="text-align:justify"></div>
                                            </div>
                                            <br>
                                            <a class="btn btn-sm" href="#" role="button"
                                                style="border:2px solid #064635; border-radius:5px; margin-bottom:30px; color:#064635; font-weight:bolder">
                                                <i class="icofont-eye-alt"></i> Lihat Lebih Lengkap
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web.app-webNoSlider>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    #detail-manfaat-2::marker {
        /* gaya untuk marker elemen li dengan id "detail-manfaat-2" */
        color: red;
    }

    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #064635;
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #064635;
    }

    .custom-back-button {
        color: #064635;
        font-size: 35px;
        cursor: pointer;
    }

    #detail-pohon {
        transition: opacity 0.3s, transform 0.3s;
        transform-origin: top;
        max-height: 0;
        overflow: hidden;
        display: flex;
        align-items: center;
        /* Menyatukan vertikal elemen di tengah */
    }

    .card {
        overflow: hidden;
    }

    .card.card-image {
        border-radius: 10px 0 0 10px;
        margin-right: -15px;
    }

    .detail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card.card-detail {
        margin-left: -15px;
        border-left: none;
        border-right: 2px solid #064635;
        border-top: 2px solid #064635;
        border-bottom: 2px solid #064635;
        box-shadow: 0 1px 2px rgba(121, 121, 121, 0.2), 0 -1px 2px rgba(121, 121, 121, 0.2);
        height: 300px;
        border-radius: 0 10px 10px 0;
    }

    .card-detail .content {
        margin-left: 20px;
        margin-right: 20px;
        margin-top: 20px;
        max-height: 300px;
        overflow-y: auto;
    }

    .card-pohon img {
        width: 100%;
    }

    /* Media query untuk layar dengan lebar hingga 575.99px */
    @media only screen and (max-width: 575.99px) {

        /* Gaya spesifik untuk .card di dalam media query */
        .card.card-image {
            border-radius: 10px 10px 0 0;
            margin-right: 0;
        }

        .card.card-detail {
            margin-left: 0;
            border-right: 2px solid #064635;
            border-left: 2px solid #064635;
            border-top: none;
            border-bottom: 2px solid #064635;
            border-radius: 0 0 10px 10px;
        }
    }
</style>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var desktopMediaQuery = window.matchMedia('(min-width: 992px)');

    function updateSwiper() {
        if (desktopMediaQuery.matches) {
            swiper.params.slidesPerView = 4;
        } else {
            swiper.params.slidesPerView = 'auto';
        }
        swiper.update();
    }

    updateSwiper();
    window.addEventListener('resize', updateSwiper);

    $(document).ready(function() {
        var defaultPohon = $('.swiper-slide:first-child .card');
        showPohonData(defaultPohon);
        var urlParams = new URLSearchParams(window.location.search);
        var jenisPohon = urlParams.get('jenis_pohon');

        if (jenisPohon) {
            var slideFound = false;
            $('.swiper-slide').each(function(index) {
                var card = $(this).find('.card');
                var namaPohon = card.find('.fs-20 p').eq(0).text().trim();

                if (namaPohon === jenisPohon) {
                    swiper.slideTo(index, 500, false);
                    showPohonData(card); // Menampilkan detail pohon yang dipilih
                    slideFound = true;
                    return false;
                }
            });

            if (!slideFound) {
                console.log('Slide with jenis pohon', jenisPohon, 'not found.');
            }
        }

        $('.card').click(function() {
            var selectedPohon = $(this);
            showPohonData(selectedPohon);
        });

        function showPohonData(pohon) {
            var pohonId = pohon.data('id');
            var namaPohon = pohon.find('.fs-20 p').eq(0).text();
            var namaLainPohon = pohon.find('.fs-20 p').eq(1).text();
            var foto = pohon.find('img').attr('src');

            $.ajax({
                url: '/getDeskripsiPohon/' + pohonId,
                type: 'GET',
                success: function(response) {
                    var deskripsi = response.deskripsi;
                    var trimmedDeskripsi = deskripsi.split(' ').slice(0, 500).join(' ');
                    var displayDeskripsi = trimmedDeskripsi + (deskripsi.split(' ').length > 500 ?
                        '.........' : '');

                    $('.card.card-image .detail img').attr('src', foto);
                    $('.card.card-detail .nama p').eq(0).text(namaPohon);
                    $('.card.card-detail .nama p').eq(1).text(namaLainPohon);
                    $('.card.card-detail .deskripsi div').html(displayDeskripsi);

                    var showUrl = '/Katalog-Pohon/' + pohonId;
                    $('.card.card-detail .btn').attr('href', showUrl);

                    // Setelah menampilkan data pohon, gulir ke deskripsi pohon
                    scrollToDetail();
                },
                error: function() {
                    console.log('Failed to fetch pohon data');
                }
            });

            var detailPohon = $('.col-xs-12.mb-3');
            detailPohon.addClass('active');

            if (detailPohon.hasClass('loaded')) {
                detailPohon[0].scrollIntoView({
                    behavior: 'smooth',
                    block: 'center',
                    inline: 'center'
                });
            } else {
                detailPohon.addClass('loaded');
            }
        }

        // Fungsi untuk menggulir ke deskripsi pohon
        function scrollToDetail() {
            var detailPohon = $('.col-xs-12.mb-3');
            if (detailPohon.length > 0) {
                detailPohon[0].scrollIntoView({
                    behavior: 'smooth',
                    block: 'center',
                    inline: 'nearest'
                });
            }
        }
    });
</script>
