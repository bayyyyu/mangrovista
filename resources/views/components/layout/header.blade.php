<div class="topbar">
    <!-- Navbar -->
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-nav float-end mb-0">

            {{-- <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i data-feather="bell" class="align-self-center topbar-icon"></i>
                    <span class="badge bg-danger rounded-pill noti-icon-badge">{{ $list_notifikasi->count() }}</span>

                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">
                    <h6
                        class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                        Notifications <span class="badge bg-primary rounded-pill">{{ $list_notifikasi->count() }}</span>
                    </h6>
                    <div class="notification-menu" data-simplebar>
                        @if ($list_notifikasi->isNotEmpty())
                            @foreach ($list_notifikasi as $notif)
                                <a href="{{ url('Admin/Pengajuan-Peran', $notif->roleRequest->id) }}"
                                    class="dropdown-item py-3 notification-item" data-id="{{ $notif->id }}">
                                    <small
                                        class="float-end text-muted ps-2">{{ $notif->created_at->diffForHumans() }}</small>
                                    <div class="media">
                                        <div class="avatar-md bg-soft-primary">
                                            <img src="{{ asset($notif->user->foto_profil) }}"
                                                class="align-self-center icon-lg rounded-circle">
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">{{ $notif->judul }}</h6>
                                            <small class="text-muted mb-0">{{ $notif->isi }}</small>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <p>Tidak Ada Notifikasi</p>
                        @endif
                    </div>


                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                        View all <i class="fi-arrow-right"></i>
                    </a>
                </div>
            </li> --}}

            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="ms-1 nav-user-name hidden-sm">
                        @if (auth()->check())
                            {{ auth()->user()->nama_lengkap }}
                        @endif
                    </span>
                    <img src="{{ asset(auth()->user()->foto_profil) }}" alt="profile-user"
                        class="rounded-circle thumb-xs" />
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="pages-profile.html"><i data-feather="user"
                            class="align-self-center icon-xs icon-dual me-1"></i> Profile</a>
                    <div class="dropdown-divider mb-0"></div>
                    <a class="dropdown-item" href="{{ url('Logout') }}"><i data-feather="power"
                            class="align-self-center icon-xs icon-dual me-1"></i> Logout</a>
                </div>
            </li>
        </ul><!--end topbar-nav-->

        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <button class="nav-link button-menu-mobile">
                    <i data-feather="menu" class="align-self-center topbar-icon"></i>
                </button>
            </li>
            <li class="creat-btn">
                <div class="nav-link">
                    <a class=" btn btn-sm btn-soft-primary" href="{{ url('Home') }}" role="button"><i
                            class="fa fa-arrows-alt" aria-hidden="true"></i> Halaman Pengunjung</a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- end navbar-->
</div>
