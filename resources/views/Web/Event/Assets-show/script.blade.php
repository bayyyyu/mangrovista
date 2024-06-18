<script>
    $(document).ready(function() {
        $('#demo').on('slid.bs.carousel', function() {
            var carouselIndex = $('.carousel-inner .carousel-item.active').index();
            $('.deskripsi-item').removeClass('active');
            $('.deskripsi-item').eq(carouselIndex).addClass('active');
        });
    });
</script>
