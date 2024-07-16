<x-app>
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/leaflet/leaflet.css" rel="stylesheet">

    <div class="row">
        <div class="col-md-3 py-2">
            <a href="{{ url('Admin/User') }}" class="btn btn-primary btn-sm "><i class="fa fa-arrow-left "></i>
                Kembali</a>
        </div>
        <div class="card">
            <div class="col-12">
                <div class="card-body">
                    <div class="dastone-profile">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="dastone-profile-main">
                                    <div class="dastone-profile-main-pic">
                                        <img src="{{ asset($user->foto_profil) }}" alt="" height="100"
                                            width="100" style="object-fit: cover" class="rounded-circle">
                                    </div>
                                    <div class="dastone-profile_user-detail">
                                        <h5 class="dastone-user-name">{{ $user->nama_lengkap }}</h5>
                                        <p class="mb-0 dastone-user-name-post">{{ $user->role }}</p>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-4 ms-auto align-self-center">
                                <ul class="list-unstyled personal-detail mb-0">
                                    <li class=""><i
                                            class="ti ti-mobile me-2 text-secondary font-16 align-middle"></i> <b>
                                            phone
                                        </b> :
                                        @if (!$user->no_telpon)
                                            -
                                        @endif
                                        {{ $user->no_telpon }}
                                    </li>
                                    <li class="mt-2"><i
                                            class="ti ti-email text-secondary font-16 align-middle me-2"></i> <b>
                                            Email
                                        </b> : {{ $user->email }}</li>
                                </ul>

                            </div><!--end col-->

                        </div><!--end row-->
                    </div><!--end f_profile-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->

        <div class="pb-4">
            <ul class="nav-border nav nav-pills mb-0" id="pills-tab" role="tablist">
                <li class="nav-item ">
                    <a class="nav-link active" id="Profile_Project_tab" data-bs-toggle="pill"
                        href="#Profile_Project">Event</a>
                </li>

            </ul>
        </div><!--end card-body-->
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="Profile_Project" role="tabpanel"
                        aria-labelledby="Profile_Project_tab">
                        <div class="row">
                            @if ($list_event->isEmpty())
                                <div class="col-12 text-center">
                                    <p>Tidak ada data</p>
                                </div>
                            @else
                                @foreach ($list_event as $event)
                                    <div class="col-3 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body d-flex flex-column">
                                                <div class="">
                                                    <img src="{{ asset($event->foto) }}" alt=""
                                                        class="d-block mx-auto mt-2 loading-lazy" height="125">
                                                    <h4 class="fw-semibold text-dark font-16 mt-3">
                                                        {{ \Illuminate\Support\Str::limit($event->nama_event, 30, '...') }}
                                                    </h4>
                                                </div>
                                                <div class="row mt-4 d-flex align-items-center mt-auto">
                                                    <div class="col-auto">
                                                        <a href="{{ url('Admin/Event', $event->id) }}"
                                                            class="btn btn-sm btn-outline-secondary px-4">
                                                            Detail
                                                        </a>
                                                    </div>
                                                </div>
                                            </div><!--end card-body-->
                                        </div> <!--end card-->
                                    </div><!--end col-->
                                @endforeach
                            @endif

                        </div><!--end row-->

                    </div><!--end tab-pane-->

                </div><!--end tab-content-->
            </div><!--end col-->
        </div><!--end row-->
        <script src="{{ url('/') }}/assets-admin/dastone/plugins/leaflet/leaflet.js"></script>
        <script src="{{ url('/') }}/assets-admin/assets/pages/jquery.profile.init.js"></script>
</x-app>
