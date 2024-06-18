<x-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="col-md-12">
                    <a href="{{ url('Admin/Tanaman') }}" class="btn btn-dark mb-2"><i
                            class="fa fa-arrow-left "></i>Kembali</a>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <p style="color: white">Detail Data penanaman </p>
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
                                                <strong style="font-weight: bolder" >Lokasi</strong>
                                                @if ($tanaman->lokasi)
                                                    <p style="font-size:15px">{{ $tanaman->lokasi }}</p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder" >Lokasi</strong>
                                                @if ($tanaman->user->nama_lengkap)
                                                    <p style="font-size:15px">{{ $tanaman->user->nama_lengkap }}</p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Sample</strong>
                                                @if ($tanaman->sample)
                                                    <p style="font-size:15px">{{ $tanaman->sample }}</p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Tanggal Penanaman</strong>
                                                @if ($tanaman->tanggal_penanaman)
                                                    <p style="font-size:15px">
                                                        {{ $tanaman->tanggal_penanaman }}</p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Jenis Mangrove</strong>
                                                @if ($tanaman->jenis_mangrove)
                                                    <p style="font-size:15px">
                                                        {{ $tanaman->jenis_mangrove }}</p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Jenis Tanah</strong>
                                                @if ($tanaman->jenis_tanah)
                                                    <p style="font-size:15px">{{ $tanaman->jenis_tanah }}
                                                    </p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Masa Tumbuh</strong>
                                                @if ($tanaman->masa_tumbuh)
                                                    <p style="font-size:15px">{{ $tanaman->masa_tumbuh }}
                                                    </p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Umur Tanaman</strong>
                                                @if ($tanaman->umur_tanaman)
                                                    <p style="font-size:15px">{{ $tanaman->umur_tanaman }}
                                                    </p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Status Penanaman</strong>
                                                @if ($tanaman->status_penanaman)
                                                    <p style="font-size:15px">{{ $tanaman->status_penanaman }}
                                                    </p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12 col-sm-3 text-center">
                                            <strong style="font-weight: bolder">Deskripsi</strong>
                                            @if ($tanaman->deskripsi)
                                                <p style="font-size:15px">{{ $tanaman->deskripsi }}</p>
                                            @else
                                                <p style="font-size:15px">-</p>
                                            @endif
                                        </div>
                                        <hr>
                                        <h3 class="text-center">Foto</h3>
                                        <hr>
                                        <div class="block">
                                            <div class="product-item">
                                                    <img src="{{ asset($tanaman->foto) }}" alt="Image"
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
