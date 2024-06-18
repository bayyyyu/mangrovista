    <!--search area-->
    <div class="search-input">
        <div class="search-close">
            <i class="icofont-close-circled"></i>
        </div>
        <form>
            <input type="text" name="text" placeholder="Search Heare">
            <button class="search-btn" type="submit">
                <i class="icofont-search-2"></i>
            </button>
        </form>
    </div>
    <!-- search area -->

    <!-- Mobile Menu Start Here -->
    <div class="mobile-menu transparent-header">
        <nav class="mobile-header">
            <div class="header-logo" style="display: flex; align-items: center;">
                <a href="{{ url('Home') }}"><img src="{{ url('/') }}/assets-web2/assets/images/logo/6.png"
                        alt="logo" style="width:100%; height:30px; object-fit:contain"></a>
                <p style="position: relative; margin-left: 10px; margin-top:20px; color:#064635; font-weight:bolder">
                    MangroVista</p>
            </div>
            <div class="header-bar">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <nav class="mobile-menu">
            <div class="mobile-menu-area">
                <div class="mobile-menu-area-inner">
                    <ul class="lab-ul">
                        <li class="active">
                            <a href="{{ url('Home') }}">Beranda</a>
                        </li>
                        <li class="{{ request()->is('Katalog-Pohon*') ? 'active2' : '' }}">
                            <a href="{{ url('Katalog-Pohon') }}">Katalog Pohon</a>
                        </li>
                        <li class="{{ request()->is('Event*') ? 'active2' : '' }}">
                            <a href="{{ url('Event') }}">Event</a>
                        </li>
                        <li class="{{ request()->is('Peta*') ? 'active2' : '' }}">
                            <a href="{{ url('Lokasi-Penanaman') }}">Lokasi Penanaman</a>
                        </li>
                        <li class="{{ request()->is('Profil*') ? 'active2' : '' }}">
                            <a href="{{ url('Profil') }}">Profil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Mobile Menu Ending Here -->

    <!-- desktop menu start here -->
    <header class="header-section fluid">
        <div class="header-bottom" style="border-bottom:2px solid #064635;">
            <div class="header-area">
                <div class="container" style="padding-inline: 30px">
                    <div class="primary-menu">
                        <div class="main-area w-100">
                            <div class="main-menu d-flex flex-wrap align-items-center justify-content-between w-100">
                                <div style="display: flex; align-items: center;">
                                    <a href="{{ url('Home') }}">
                                        <img src="{{ url('/') }}/assets-web2/assets/images/logo/6.png"
                                            alt="logo" style="height: 30px; width: 100%; object-fit: contain">
                                    </a>
                                    <a href="{{ url('Home') }}">
                                        <p
                                            style="position: relative; margin-left: 10px; margin-top:20px; color:#064635; font-weight:bolder">
                                            MangroVista</p>
                                    </a>
                                </div>
                                <div class="menu-profile d-flex align-items-center justify-content-end">
                                    <ul class="lab-ul d-flex align-items-center">
                                        <li class="{{ request()->is('Home') ? 'active2' : '' }}">
                                            <a href="{{ url('Home') }}"
                                                style="color: #064635; font-size:13px">Beranda</a>
                                        </li>
                                        <li class="{{ request()->is('Katalog-Pohon*') ? 'active2' : '' }}">
                                            <a href="{{ url('Katalog-Pohon') }}"
                                                style="color: #064635; font-size:13px">Katalog Pohon</a>
                                        </li>
                                        <li class="{{ request()->is('Event*') ? 'active2' : '' }}">
                                            <a href="{{ url('Event') }}"
                                                style="color: #064635; font-size:13px">Event</a>
                                        </li>
                                        <li class="{{ request()->is('Lokasi-Penanaman*') ? 'active2' : '' }}">
                                            <a href="{{ url('Lokasi-Penanaman') }}"
                                                style="color: #064635; font-size:13px">Lokasi Penanaman</a>
                                        </li>
                                        <li class="{{ request()->is('Peta*') ? 'active2' : '' }}">
                                            <a href="{{ url('Peta') }}"
                                                style="color: #064635; font-size:13px">Peta</a>
                                        </li>
                                    </ul>

                                    <!-- Profile/Login Section -->
                                    <div class="profile-login d-flex align-items-center">
                                        @if (Auth::check())
                                            @if (Auth::user()->role == 'admin')
                                                <a href="{{ url('Admin/Dashboard') }}" class="profile-btn">
                                                    <div class="profile-img-wrapper">
                                                        @if (Auth::user()->foto_profil)
                                                            <img src="{{ asset(auth()->user()->foto_profil) }}"
                                                                class="img-radius" alt="User-Profile-Image">
                                                        @else
                                                            <i class="fa-light fa-user"></i>
                                                        @endif
                                                    </div>
                                                </a>
                                            @else
                                                <a href="{{ url('Profil') }}" class="profile-btn">
                                                    <div class="profile-img-wrapper">
                                                        @if (Auth::user()->foto_profil)
                                                            <img src="{{ asset(auth()->user()->foto_profil) }}"
                                                                class="img-radius" alt="User-Profile-Image"
                                                                style="object-fit:cover">
                                                        @else
                                                            <img src="{{ asset('/assets-web2/assets/images/user.png') }}"
                                                                class="img-radius" alt="User-Profile-Image">
                                                        @endif
                                                    </div>
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{ url('Login') }}" class="btn btn-sm login-btn">Masuk</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <style>
        .lab-ul li.active2 a {
            border-bottom: 2px solid #064635;
        }

        .login-btn {
            color: #064635 !important;
            font-size: 13px;
            font-weight: bolder;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #064635;
        }

        .profile-btn {
            color: #064635 !important;
            font-size: 13px;
            font-weight: bolder;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
            text-decoration: none;
            padding: 1px 1px;
            border: 1px solid #064635;
            border-radius: 75%
        }

        .profile-img-wrapper {
            overflow: hidden;
            border-radius: 50%;
            height: 38px;
            width: 38px;
        }

        .profile-btn:hover,
        .login-btn:hover {
            background-color: #064635;
            color: white !important;
        }
    </style>
