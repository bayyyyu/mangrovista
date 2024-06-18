<section class="mobile-banner">
    <div class="banner-slider-box swiper-container-mobile">
        <div class="swiper-wrapper">
            <div class="swiper-slide swiper-mobile">
                <a href="{{ url('Event') }}">
                    <img src="{{ url('/') }}/assets-web2/assets/images/banner/bg-images/1.png">
                    <div class="banner-text text-center">
                        <h2>Mulai Langkah Pertama</h2>
                        <p> Menghijaukan Bumi Dengan Berpartisipasi Di Event Penanaman</p>
                    </div>
                </a>
            </div>

            <div class="swiper-slide swiper-mobile">
                <img src="{{ url('/') }}/assets-web2/assets/images/banner/bg-images/2.png">
                <div class="banner-text">
                    <h2>Temukan Informasi</h2>
                    <p>Mengenai Pohon Mangrove</p>
                    <a href="{{ url('Katalog-Pohon') }}"><button class="btn btn-ms"
                            style="background-color: #064635; color:white">KATALOG POHON</button></a>
                </div>
            </div>

            <div class="swiper-slide swiper-mobile">
                <img src="{{ url('/') }}/assets-web2/assets/images/banner/bg-images/3.png">
                <div class="banner-text">
                    <h2>Jelajahi </h2>
                    <p>Hasil Penanaman Pohon Mangrove</p>
                    <a href="{{ url('Penanaman') }}"><button class="btn btn-ms"
                            style="background-color: #064635; color:white">LIHAT PENANAMAN</button></a>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>

    </div>
</section>

<style>
    .mobile-banner {
        display: none;
    }

    .banner .swiper-pagination {
        z-index: 10;
    }

    @media (max-width: 767px) {
        .mobile-banner {
            display: flex;
        }

        .banner-slider-box {
            position: relative;
            width: 100%;
            height: auto;
            overflow: hidden;
            border-radius: 20px;
            border: 2px solid #064635;
            margin: 80px 10px 20px 10px;
        }

        .swiper-slide.swiper-mobile {
            display: flex;
            align-items: center;
            width: 100%;
            height: 100%;
            background-color: white;
            padding: 20px;
            transition: transform 0.5s ease;
        }

        .swiper-slide.swiper-mobile img {
            max-width: 50%;
            height: auto;
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            justify-content: center;
            display: flex;

        }

        .swiper-slide.swiper-mobile .banner-text {
            display: block;
            margin: 0 auto;
            width: auto;
            height: auto;
            justify-content: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.137);
        }

        .swiper-slide.swiper-mobile .banner-text h2 {
            font-size: 30px;
            -webkit-text-stroke-width: 2px;
            -webkit-text-stroke-color: #064635;
            color: rgb(255, 255, 255);
        }

        .swiper-slide.swiper-mobile .banner-text p {
            font-size: 20px;
            hyphens: auto;
            font-weight: bold;
        }


        .banner {
            display: none;
        }

    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
<script>
    $(document).ready(function() {
        var swiper = new Swiper('.swiper-container-mobile', {
            autoplay: {
                delay: 5000,
            },
            loop: true,
            navigation: {
                nextEl: null,
                prevEl: null,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className +
                        '" style="background-color: #064635;"></span>';
                },
            },
        });
    });
</script>
