<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="colorlib" />

    <link rel="icon" href="{{ url('/') }}/assets/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/icon/feather/css/feather.css">

    <link href="{{ url('/') }}/assets/files/assets/pages/jquery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="{{ url('/') }}/assets/files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css"
        rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/icon/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/css/pages.css">
</head>

<body>
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <x-layout.header />
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <x-layout.sidebar />
                    <div class="pcoded-content">
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <a href="{{ url('Admin/Event') }}" class="btn btn-dark ml-3"><i
                                    class="fa fa-arrow-left "></i>Kembali</a>
                            </div>
                        </div>
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Tambah Dokumentasi Event</h5>
                                            </div>
                                            <form action="{{ route('dokumentasi.store', $event) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div>
                                                    <label for="photos">Foto:</label>
                                                    <input type="file" name="foto_dokumentasi[]" id="photos" multiple accept="image/*">
                                                </div>
                                                <div>
                                                    <label for="descriptions">Deskripsi:</label>
                                                    <textarea name="deskripsi[]" id="descriptions" rows="4" cols="50"></textarea>
                                                </div>
                                                <button type="submit">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="styleSelector">
                    </div>
                </div>
            </div>
        </div>
        <x-layout.footer />
    </div>


    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script src="{{ url('/') }}/assets/files/assets/pages/waves/js/waves.min.js"></script>

    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <script src="{{ url('/') }}/assets/files/assets/pages/file-upload/dropzone-amd-module.min.js"></script>

    <script src="{{ url('/') }}/assets/files/assets/js/pcoded.min.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/js/vertical/vertical-layout.min.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/assets/js/script.js"></script>
</body>

</html>

