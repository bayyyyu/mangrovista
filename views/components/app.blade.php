<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admindek {{ $title }}</title>


    <!--[if lt IE 10]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link rel="icon" href="{{url('/')}}/assets/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/files/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{url('/')}}/assets/files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/files/assets/icon/feather/css/feather.css">


    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/files/assets/css/font-awesome-n.min.css">

    <link rel="stylesheet" href="{{url('/')}}/assets/files/bower_components/chartist/css/chartist.css" type="text/css"
        media="all">

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/files/assets/css/widget.css">
</head>

<body>

    {{-- <div class="loader-bg">
        <div class="loader-bar"></div>
    </div> --}}

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            {{-- header start --}}
            <x-layout.header />
            {{-- header end --}}

            {{-- sidebar chat start --}}
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-search-box">
                                <a class="back_friendlist">
                                    <i class="feather icon-x"></i>
                                </a>
                                <div class="right-icon-control">
                                    <div class="input-group input-group-button">
                                        <input type="text" id="search-friends" name="footer-email"
                                            class="form-control" placeholder="Search Friend">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary waves-effect waves-light" type="button"><i
                                                    class="feather icon-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box waves-effect waves-light" data-id="1"
                                    data-status="online" data-username="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius"
                                            src="{{url('/')}}/assets/files/assets/images/avatar-3.jpg"
                                            alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="2"
                                    data-status="online" data-username="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{url('/')}}/assets/files/assets/images/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="3"
                                    data-status="online" data-username="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{url('/')}}/assets/files/assets/images/avatar-4.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="4"
                                    data-status="offline" data-username="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{url('/')}}/assets/files/assets/images/avatar-3.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-default"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia<small class="d-block text-muted">10 min
                                                ago</small></div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="5"
                                    data-status="offline" data-username="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{url('/')}}/assets/files/assets/images/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-default"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen<small class="d-block text-muted">15 min
                                                ago</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- sidebar chat end --}}


            {{-- <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-x"></i> Josephin Doe
                    </a>
                </div>
                <div class="main-friend-chat">
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5"
                                src="{{url('/')}}/assets/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">I'm just looking around. Will you tell me something about
                                    yourself?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <div class="media-body chat-menu-reply">
                            <div class="">
                                <p class="chat-cont">Ohh! very nice</p>
                            </div>
                            <p class="chat-time">8:22 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5"
                                src="{{url('/')}}/assets/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">can you come with me?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="chat-reply-box">
                    <div class="right-icon-control">
                        <div class="input-group input-group-button">
                            <input type="text" class="form-control" placeholder="Write hear . . ">
                            <div class="input-group-append">
                                <button class="btn btn-primary waves-effect waves-light" type="button"><i
                                        class="feather icon-message-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    {{-- sidebar start --}}
                    <x-layout.sidebar  />
                    {{-- sidebar end --}}

                    <div class="pcoded-content">

                        
                        {{ $slot }}
                        
                    </div>

                    <div id="styleSelector">
                    </div>

                </div>

            </div>

            {{-- footer start --}}
            <x-layout.footer/>
            {{-- footer end --}}
        </div>
    </div>

    <script data-cfasync="false" src="{{url('/')}}/assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script src="{{url('/')}}/assets/files/assets/pages/waves/js/waves.min.js"></script>

    <script type="text/javascript" src="{{url('/')}}/assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <script src="{{url('/')}}/assets/files/assets/pages/chart/float/jquery.flot.js"></script>
    <script src="{{url('/')}}/assets/files/assets/pages/chart/float/jquery.flot.categories.js"></script>
    <script src="{{url('/')}}/assets/files/assets/pages/chart/float/curvedLines.js"></script>
    <script src="{{url('/')}}/assets/files/assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>

    <script src="{{url('/')}}/assets/files/bower_components/chartist/js/chartist.js"></script>

    <script src="{{url('/')}}/assets/files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="{{url('/')}}/assets/files/assets/pages/widget/amchart/serial.js"></script>
    <script src="{{url('/')}}/assets/files/assets/pages/widget/amchart/light.js"></script>

    <script src="{{url('/')}}/assets/files/assets/js/pcoded.min.js"></script>
    <script src="{{url('/')}}/assets/files/assets/js/vertical/vertical-layout.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/files/assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/files/assets/js/script.min.js"></script>
</body>

</html>
