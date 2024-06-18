<x-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="col-md-12 mt-5">
                    <a href="{{ url('Admin/User') }}" class="btn btn-dark mb-2"><i class="fa fa-arrow-left "></i>Kembali</a>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <p style="color: white">Detail user </p>
                            <div class="card-tools">
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="card-body">
                                        <h3 class="text-center">Detail</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="block">
                                                    <div class="product-item">
                                                        <div class="product-img"
                                                            style="margin-right:10px; margin-left:10px; margin-bottom:20px; ">
                                                            <img src="{{ asset($user->foto_profil) }}" alt="Image"
                                                                style=" display: block;width: 250px;height: 250px;object-fit: cover;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row p-t-20 p-b-30">
                                                    <div class="col-auto text-right update-meta p-r-0"> <i class="b-primary update-icon ring"></i></div>
                                                    <div class="col p-l-5"><h6>Nama : {{$user->nama_lengkap}}</h6>
                                                    </div>
                                                </div>
                                                <div class="row p-b-30">
                                                    <div class="col-auto text-right update-meta p-r-0"> <i class="b-success update-icon ring"></i></div>
                                                    <div class="col p-l-5"><h6>Username : {{$user->username}}</h6>
                                                    </div>
                                                </div>
                                                <div class="row p-b-30">
                                                    <div class="col-auto text-right update-meta p-r-0"> <i class="b-danger update-icon ring"></i></div>
                                                    <div class="col p-l-5"><h6>Email : {{$user->email}}</h6>
                                                    </div>
                                                </div>
                                                <div class="row p-b-30">
                                                    <div class="col-auto text-right update-meta p-r-0"> <i class="b-warning update-icon ring"></i></div>
                                                    <div class="col p-l-5"><h6>Role : {{$user->role}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app>
