<x-web.app-webNoSlider>
    <div class="col-md-9 col-md-offset-1" id="edit">
        <div class="container">
            <div class="judul-atas" style="margin-top:20px; text-align:center">
                <p style="color:rgb(27, 27, 27); font-weight:bold">Halaman monitoring penanaman pada event
                    "{{ $event->nama_event }}"</p>
                <p>MangroVista</p>
            </div>
            <hr>
            <div class="section-wrapper">
                <form action="{{ url('Event/' . $event->id . '/monitoring_store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <div class="row">
                        <div class="col-md-5 mt-3">
                            <div class="form-group ">
                                <label class="text-dark">Pilih foto terbaik yang dilakukan saat monitoring<span
                                        style="color: red">*</span></label>
                                <div class="card">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="foto_monitoring" required accept="image/*"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div>
                                    <div class="center-block"><label class="col-form-label text-dark">Tanggal Monitoring: </label>
                                        <input type="date" class="form-control" name="tanggal_monitoring" required>
                                    </div>
                                    <div class="center-block"> <label class="col-form-label text-dark">Deskripsi Monitoring:</label>
                                        <input type="text" class="form-control" placeholder="Contoh: Pemngamtan Awal" name="monitoring_deskripsi" required>
                                    </div>
                                    <div class="center-block"> <label class="col-form-label text-dark">Pohon Hidup:</label>
                                        <input type="number" class="form-control"  name="pohon_hidup" required>
                                    </div>
                                    <div class="center-block"> <label class="col-form-label text-dark">Pohon Mati:</label>
                                        <input type="number" class="form-control"  name="pohon_mati" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label text-dark">Rata-Rata Diameter Pohon (cm)</label>
                                <input type="number" class="form-control" name="diameter_pohon" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label text-dark">Rata-Rata Tinggi Pohon (cm)</label>
                                <input type="number" class="form-control" name="tinggi_pohon" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('Event', $event->id) }}" class="btn btn-sm btn-outline-green">Kembali</a>
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
