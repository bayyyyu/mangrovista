<div class="tab-pane fade show tab-content-item mt-1" id="dashboard-content">
    <h6>Ringkasan Akun</h6>
    <p style="font-size:15px">Ringkasan peran, partisipasi event & pengajuan event</p>
    <div class="row">
        <div class="col-md-4">
            <div class="lab-item service-item" style="background-color: #F5FAF8; height: 150px;">
                <div class="lab-inner p-4 mb-4 text-left">
                    <div class="service-top d-flex align-items-center mb-4">
                        <div class="st-thumb mr-3">
                            <img src="{{ url('/') }}/assets-web2/assets/images/dashboard/3.png"
                                alt="dashboard image">
                        </div>
                        <div class="st-content mt-2">
                            <a href="#">
                                <h6 style="font-size: 15px">Informasi Peran:</h6>
                                @if (auth()->check())
                                    <!-- Check if user is authenticated -->
                                    @if (auth()->user()->role === 'pengguna')
                                        <h6> Pengguna </h6>
                                    @elseif(auth()->user()->role === 'penyelenggara')
                                        <h6> Penyelenggara </h6>
                                    @endif
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="lab-item service-item" style="background-color: #F5FAF8; height: 150px;">
                <div class="lab-inner p-4 mb-4 text-left">
                    <div class="service-top d-flex align-items-center mb-4">
                        <div class="st-thumb mr-3">
                            <img src="{{ url('/') }}/assets-web2/assets/images/dashboard/1.png"
                                alt="dashboard image">
                        </div>
                        <div class="st-content mt-2">
                            <a href="#">
                                <h6 style="font-size: 15px">Partisipasi Event: </h6>
                                <h6>{{ $totalPartisipasi }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="lab-item service-item" style="background-color: #F5FAF8; height: 150px;">
                <div class="lab-inner p-4 mb-4 text-left">
                    <div class="service-top d-flex align-items-center mb-4">
                        <div class="st-thumb mr-3">
                            <img src="{{ url('/') }}/assets-web2/assets/images/dashboard/2.png"
                                alt="dashboard image">
                        </div>
                        <div class="st-content mt-2">
                            <a href="#">
                                <h6 style="font-size: 15px">Pengajuan Event: </h6>
                                <h6>{{ $total_pengajuan_event }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
