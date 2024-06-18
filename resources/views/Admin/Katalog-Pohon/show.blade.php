<x-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="col-md-12">
                    <a href="{{ url('Admin/Katalog-Pohon') }}" class="btn btn-dark mb-2"><i
                            class="fa fa-arrow-left "></i>Kembali</a>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <p style="color: white">Detail Pohon </p>
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
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Nama Pohon</strong>
                                                    <p style="font-size:15px">{{$katalog_pohon->nama_pohon}}{{$katalog_pohon->nama_lain_pohon}}</p>
                                            </div>                           
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong style="font-weight: bolder;">Deskripsi</strong>
                                                    <p style="font-size:15px">{!! $katalog_pohon->deskripsi !!}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3 class="text-center">Foto</h3>
                                        <hr>
                                        <div class="block">
                                            <div class="product-item">
                                                    <img src="{{ asset($katalog_pohon->foto) }}" alt="Image"
                                                        style="  display: block;width: 100%;height: auto;object-fit: cover;object-position: center;box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                                            </div>
                                        </div>
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
