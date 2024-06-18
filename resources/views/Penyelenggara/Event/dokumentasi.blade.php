<x-web.app-webNoSlider>
    <div class="col-md-9 col-md-offset-1" id="edit">
        <div class="container">
            <div class="judul-atas" style="margin-top:20px; text-align:center">
                <p style="color:rgb(27, 27, 27); font-weight:bold">Halaman dokumentasi pada event
                    "{{ $event->nama_event }}"</p>
                <p>MangroVista</p>
            </div>
            <hr>
            <div class="section-wrapper">
                <form action="{{ url('Event', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="repeater-custom-show-hide">
                        <div data-repeater-list="car">
                            <div data-repeater-item="" style="padding: 10px">
                                <div class="form-group row  d-flex align-items-end">
                                    <div class="col-md-6">
                                        <label class="text-dark">Pilih foto terbaik yang dilakukan saat
                                            monitoring<span style="color: red">*</span></label>
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="dropify" name="foto_monitoring" required
                                                    accept="image/*" />
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" rows="10"  required></textarea>
                                    </div><!--end col-->
                                    <div class="col-md-12 mt-2">
                                        <span data-repeater-delete="" class="btn"
                                            style="border: 1px solid red; color:red">
                                            <span class="far fa-trash-alt me-1"></span>
                                        </span>
                                    </div><!--end col-->

                                </div><!--end row-->
                                <hr>
                            </div><!--end /div-->
                        </div><!--end repet-list-->
                        <div class="form-group row mb-0">
                            <div class="col-sm-12">
                                <span data-repeater-create="" class="btn"
                                    style="border: 1px solid rgb(0, 119, 255); color:rgb(0, 119, 255)">
                                    <span class="fa fa-plus"></span> Tambah
                                </span>

                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('Profil?page=1#pengajuan') }}" class="btn btn-sm btn-outline-green">Kembali</a>
                        <button class="btn btn-sm btn-green">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        body {
            background-color: #F2F1F0;
        }

        .header-section {
            background-color: white;
        }

        #edit {
            border: 1px solid #064635;
            background-color: #fff;
            border-radius: 6px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .1), 0 6px 6px rgba(0, 0, 0, .1);
            padding: 5px;
            margin: auto;
            margin-bottom: 20px
        }

        @media (min-width: 1200px) {
            #edit {
                margin-top: 20px;
                /* Lebih besar di layar besar */
            }
        }

        /* Tablet dan perangkat medium */
        @media (min-width: 768px) and (max-width: 1199px) {
            #edit {
                margin-top: 80px;
                /* Sedang untuk tablet */
            }
        }

        /* Smartphone */
        @media (max-width: 767px) {
            #edit {
                margin-top: 80px;
                /* Lebih kecil di layar kecil */
            }
        }
    </style>
</x-web.app-webNoSlider>
