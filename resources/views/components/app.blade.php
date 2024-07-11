<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin | MangroVista</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/dist/css/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/dist/css/bootstrap-icons.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets-admin/assets/images/6.png">

    <!-- jvectormap -->
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/jvectormap/jquery-jvectormap-2.0.2.css"
        rel="stylesheet">

    <!-- App css -->
    <link href="{{ url('/') }}/assets-admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets-admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets-admin/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/daterangepicker/daterangepicker.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('/') }}/assets-admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/datatables/dataTables.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/datatables/buttons.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/datatables/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ url('public') }}/assets/css/leaflet.defaultextent.css">
    <script src="{{ url('public') }}/assets/js/leaflet.defaultextent.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!--calendar css-->
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/fullcalendar/packages/core/main.css"
        rel="stylesheet" />
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/fullcalendar/packages/daygrid/main.css"
        rel="stylesheet" />
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/fullcalendar/packages/bootstrap/main.css"
        rel="stylesheet" />
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/fullcalendar/packages/timegrid/main.css"
        rel="stylesheet" />
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/fullcalendar/packages/list/main.css"
        rel="stylesheet" />

    <link href="{{ url('/') }}/assets-admin/dastone/plugins/lightpick/lightpick.css" rel="stylesheet" />
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/lightbox/magnific-popup.css" rel="stylesheet"
        type="text/css" />

        
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/dropify/css/dropify.min.css" rel="stylesheet">
    @stack('style')
</head>

<body class="">
    <!-- Left Sidenav -->
    <x-layout.sidebar />
    <!-- end left-sidenav-->


    <div class="page-wrapper">
        <!-- Top Bar Start -->
        <x-layout.header />
        <!-- Top Bar End -->

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                <x-utils.Admin.notif />
                <!-- Page-Title -->
                {!! $slot !!}


            </div><!-- container -->

            <x-layout.footer />
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->




    <!-- jQuery  -->
    <script src="{{ url('/') }}/assets-admin/assets/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/js/metismenu.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/js/waves.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/js/feather.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/js/simplebar.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/js/moment.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/dropify/js/dropify.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/pages/jquery.form-upload.init.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/apex-charts/apexcharts.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/pages/jquery.analytics_dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{ url('/') }}/assets-admin/assets/js/app.js"></script>

    <!-- Required datatable js -->
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/dataTables.bootstrap5.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/buttons.bootstrap5.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/jszip.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/pages/jquery.datatable.init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src='{{ url('/') }}/assets-admin/dastone/plugins/fullcalendar/packages/core/main.js'></script>
    <script src='{{ url('/') }}/assets-admin/dastone/plugins/fullcalendar/packages/daygrid/main.js'></script>
    <script src='{{ url('/') }}/assets-admin/dastone/plugins/fullcalendar/packages/timegrid/main.js'></script>
    <script src='{{ url('/') }}/assets-admin/dastone/plugins/fullcalendar/packages/interaction/main.js'></script>
    <script src='{{ url('/') }}/assets-admin/dastone/plugins/fullcalendar/packages/list/main.js'></script>
    <script src="{{ url('/') }}/assets-admin/dastone/plugins/lightpick/lightpick.js"></script>
    <script src='{{ url('/') }}/assets-admin/assets/pages/jquery.calendar.js'></script>

    <script src="{{ url('/') }}/assets-admin/dastone/plugins/lightbox/jquery.magnific-popup.js"></script>
    <script src="{{ url('/') }}/assets-admin/assets/pages/jquery.lightbox.init.js"></script>
    @stack('script')
</body>

</html>
