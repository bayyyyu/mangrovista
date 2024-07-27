<!DOCTYPE html>
<html lang="en">

<head>
    <title>MangroVista</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/assets-web2/assets/images/x-icon/6.png">

    <!-- CSS Libraries -->
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/lightbox/magnific-popup.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/all.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/icofont.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/lightcase.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/swiper.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/datatables/dataTables.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/datatables/buttons.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/datatables/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets-admin/dastone/plugins/jquery-steps/jquery.steps.css">
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/dropify/css/dropify.min.css" rel="stylesheet">
</head>

<body>
    <x-web.layout.header />

    {{ $slot }}
    <!-- jQuery harus dimuat terlebih dahulu -->
    <script src="{{ url('/') }}/assets-web2/assets/js/jquery.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --> <!-- Dihapus karena duplikasi -->

    <!-- Memuat skrip lain setelah jQuery -->
    <script src="{{ url('/') }}/assets-web2/assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/lightbox/jquery.magnific-popup.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/pages/jquery.lightbox.init.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/fontawesome.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/waypoints.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/swiper.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/jquery.countdown.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/lightcase.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/functions.js"></script>

    <script src="{{ url('/') }}/assets-admin/dastone/plugins/jquery-steps/jquery.steps.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/pages/jquery.form-wizard.init.js"></script>

    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/dataTables.bootstrap5.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/buttons.bootstrap5.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/jszip.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/buttons.colVis.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/pages/jquery.datatable.init.js"></script>

    <script src="{{ url('/') }}/assets-admin/dastone/plugins/dropify/js/dropify.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/pages/jquery.form-upload.init.js"></script>

    <script src="{{ url('/') }}/assets-admin/dastone/plugins/repeater/jquery.repeater.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/pages/jquery.form-repeater.js"></script>

    <!-- Select2 dimuat setelah jQuery -->
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/select2/select2.min.js"></script>
    @stack('script')
</body>

</html>
