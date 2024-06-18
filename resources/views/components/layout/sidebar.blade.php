<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{url('Admin/Dashboard')}}" class="logo">
            <span>
                <img src="{{ url('/') }}/assets-web2/assets/images/logo/blue.png" class="logo-sm">
            </span>
            <span>
                <img src="{{ url('/') }}/assets-web2/assets/images/logo/text-black.png" alt="logo-large"
                    class="logo-lg logo-dark mt-2">
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main</li>
            <hr class="hr-dashed hr-menu">
            <li class="{{ request()->is('Admin/Dashboard') ? 'active' : '' }}">
                <a href="{{url('Admin/Dashboard')}}"><i class="fa fa-home align-self-center menu-icon" aria-hidden="true"></i><span class="menu-icon">Dashboard</span></a>
            </li>
            <li class="{{ request()->is('Admin/Katalog-Pohon*') ? 'active' : '' }}">
                <a href="{{url('Admin/Katalog-Pohon')}}"><i class="fa fa-tree align-self-center menu-icon" ></i><span class="menu-icon">Katalog Pohon</span></a>
            </li>
            </li>
            <li class="{{ request()->is('Admin/Event*') ? 'active' : '' }}">
                <a href="{{url('Admin/Event')}}"><i class="fa fa-calendar align-self-center menu-icon" ></i><span class="menu-icon">Event</span></a>
            </li>
            <li class="{{ request()->is('Admin/Tanaman*') ? 'active' : '' }}">
                <a href="{{url('Admin/Tanaman')}}"><i class="fa fa-leaf align-self-center menu-icon" ></i><span class="menu-icon">Penanaman</span></a>
            </li>
            <li class="{{ request()->is('Admin/User*') ? 'active' : '' }}">
                <a href="{{url('Admin/User')}}"><i class="fa fa-user align-self-center menu-icon" ></i><span class="menu-icon">User</span></a>
            </li>
            <li class="{{ request()->is('Admin/Pengajuan-Peran*') ? 'active' : '' }}">
                <a href="{{url('Admin/Pengajuan-Peran')}}"><i class="fa fa-id-card align-self-center menu-icon" aria-hidden="true"></i><span class="menu-icon">Pengajuan Peran</span></a>

        </ul>
    </div>
</div>
