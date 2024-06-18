<x-App>
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col">
                                <h4 class="page-title">Dashboard</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">MangroVista</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="card calendar-cta">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="{{ asset(auth()->user()->foto_profil) }}" alt=""
                                                class="" height="100" style="border-radius: 10px">
                                        </div><!--end col-->
                                        <div class="col">
                                            <h5 class="font-20">Selamat datang
                                                <strong style="font-weight: bolder">
                                                    @if (auth()->check())
                                                        {{ auth()->user()->nama_lengkap }}
                                                </strong>
                                                di Halaman Dashboard MangroVista
                                                @endif
                                            </h5>
                                        </div><!--end col-->

                                    </div><!--end row-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 font-weight-semibold">Event Selesai</p>
                                            <h3 class="m-0">{{ $totalEventSelesai }}</h3>
                                            <p class="mb-0 text-truncate text-muted"><span class="text-success"><i
                                                        class="mdi mdi-checkbox-marked-circle-outline me-1"></i></span>{{ $totalEventSelesai }}
                                                Event Selesai</p>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="report-main-icon bg-light-alt">
                                                <i data-feather="calendar"
                                                    class="align-self-center text-muted icon-md"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->
                        <div class="col-md-6 col-lg-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 font-weight-semibold">Event Belum Selesai</p>
                                            <h3 class="m-0">{{ $totalEventBelumSelesai }}</h3>
                                            <p class="mb-0 text-truncate text-muted"><span class="text-danger"><i
                                                        class="mdi mdi-checkbox-marked-circle-outline me-1"></i></span>{{ $totalEventBelumSelesai }}
                                                Event belum selesai</p>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="report-main-icon bg-light-alt">
                                                <i data-feather="calendar"
                                                    class="align-self-center text-muted icon-md"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->
                        <div class="col-md-6 col-lg-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 font-weight-semibold">Event Berlangsung</p>
                                            <h3 class="m-0">{{ $totalEventBerlangsung }}</h3>
                                            <p class="mb-0 text-truncate text-muted"><span class="text-warning"><i
                                                        class="mdi mdi-checkbox-marked-circle-outline me-1"></i></span>{{ $totalEventBerlangsung }}
                                                Event berlangsung</p>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="report-main-icon bg-light-alt">
                                                <i data-feather="calendar"
                                                    class="align-self-center text-muted icon-md"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->
                        <div class="col-md-6 col-lg-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 font-weight-semibold">Total Event</p>
                                            <h3 class="m-0">{{ $event }}</h3>
                                            <p class="mb-0 text-truncate text-muted"><span class="text-info"><i
                                                        class="mdi mdi-checkbox-marked-circle-outline me-1"></i></span>{{ $totalEventBelumSelesai }}
                                                Total event</p>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="report-main-icon bg-light-alt">
                                                <i data-feather="calendar"
                                                    class="align-self-center text-muted icon-md"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->
                        <div class="col-md-6 col-lg-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 font-weight-semibold">Total Penanaman</p>
                                            <h3 class="m-0">{{ $tanaman }}</h3>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="report-main-icon bg-light-alt">

                                                <i class="fa fa-tree align-self-center text-muted icon-md"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->
                        <div class="col-md-6 col-lg-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 font-weight-semibold">Pohon Yang Hidup</p>
                                            <h3 class="m-0">{{  $totalPohonHidup }}</h3>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="report-main-icon bg-light-alt">

                                                <i class="fa fa-tree align-self-center text-muted icon-md"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->
                        <div class="col-md-6 col-lg-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 font-weight-semibold">Pohon Yang Mati</p>
                                            <h3 class="m-0">{{  $totalPohonMati }}</h3>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="report-main-icon bg-light-alt">

                                                <i class="fa fa-tree align-self-center text-muted icon-md"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->
                        <div class="col-md-6 col-lg-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 font-weight-semibold">Pohon Yang Baru Ditanam</p>
                                            <h3 class="m-0">{{  $totalPohonBaru }}</h3>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="report-main-icon bg-light-alt">

                                                <i class="fa fa-tree align-self-center text-muted icon-md"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
                <div class="col-lg-3">
                    <div class="dash-datepick mb-3">
                        <input type="hidden" id="light_datepick" />
                    </div>
                </div>
                <!--end col-->
            </div><!--end row-->

        </div><!-- container -->

    </div>
</x-App>
<style>
    .dash-datepick {
        position: relative;
        z-index: 1;
    }
</style>
