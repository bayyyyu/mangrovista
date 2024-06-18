<x-web.app-webnoSlider>
    <link href="{{ url('/') }}/assets-admin/dastone/plugins/select2/select2.min.css" rel="stylesheet"
        type="text/css" />
    <div class="container wrapper mb-5 lokasi">
        <div class="row justify-content-center mb-15">
            <div class="col-12 sticky-widget">
                <div class="lokasi-details">
                    <div style="margin-bottom: 3rem; margin-top:2rem">
                        <p class="text-title text-center">Temukan Lokasi</p>
                        <div class="custom-select">
                            <select class="select2 form-control mb-3" id="lokasi-select">
                                <option style="font-size: 10px" value="0">---Pilih Lokasi---</option>
                                @foreach ($list_lokasi as $lokasi)
                                    <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="scroll-lokasi" style="padding: 0 1rem 0 1rem">
                        <div id="hasilSearch">
                            <!-- Card Start -->
                            @foreach ($list_lokasi as $lokasi)
                                <div class="card-lokasi" data-id="{{ $lokasi->id }}">
                                    <div class="row ">
                                        <div class="col-md-5 dinamic-margin">
                                            <div class="gambar-lokasi">
                                                <img class="d-block" src="{{ asset($lokasi->foto_lokasi) }}"
                                                    alt="Foto Lokasi" loading="lazy">
                                            </div>
                                        </div>
                                        <div class="col-md-7 dinamix-margin">
                                            <div class="card-block">
                                                <p class="text-lokasi">{{ $lokasi->nama_lokasi }}</p>
                                                <div class="row"
                                                    style="padding: 0 !important; margin: 0 !important;">
                                                    <div class="col-12"
                                                        style="padding: 0 !important; margin: 0 !important;">
                                                        <p class="text-lokasi-sub margin-top-up">
                                                            {{ $lokasi->alamat_lokasi }}
                                                        </p>
                                                        <div class="lokasi-info"
                                                            style="display: flex; flex-direction:column; justify-content:space-between">
                                                            <p class="text-lokasi-sub margin-top-up"><b>Tipe
                                                                    Ekosistem :</b>
                                                                {{ $lokasi->jenis_ekosistem }}</p>
                                                            <p class="text-lokasi-sub margin-top-up"><b>Total Event
                                                                    :</b>
                                                                {{ $lokasi->events()->count() }}</p>

                                                        </div>
                                                        <div class="more"
                                                            style="display: flex; justify-content:space-between">
                                                            <p class="text-lokasi-sub margin-top-up"><b>Pohon
                                                                    Tertanam :</b>
                                                                {{ $lokasi->total_pohon_ditanam }}</p>
                                                            <a href="{{ url('Lokasi-Penanaman', $lokasi->id) }}/{{ $lokasi->nama_lokasi }}"
                                                                class="mt-auto btn btn-sm btn-outline-green float-right ">Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Carousel start -->

                                        <!-- End of carousel -->
                                    </div>
                                </div>
                            @endforeach
                            <!-- End of card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .custom-select {
            top: 15px;
            left: 15px;
            width: 100%;
            z-index: 1000;
            /* Pastikan berada di atas elemen peta */
            background-color: white;
            border-radius: 5px;
            padding: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            /* Bayangan untuk menonjolkan elemen */
        }

        .custom-select,
        .custom-select select {
            box-sizing: border-box;
        }

        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            font-size: 13px !important;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #43936C;
            color: white;
        }

        .text-title {
            font-weight: 700;
            font-size: 38px;
            color: #000;
        }

        .scroll-lokasi {
            height: 390px;
            overflow-y: auto;
        }

        .scroll-lokasi::-webkit-scrollbar {
            width: 5px;
        }

        .scroll-lokasi::-webkit-scrollbar-track {
            background: #b3b2b2;
            border-radius: 10px;
        }

        .scroll-lokasi::-webkit-scrollbar-thumb {
            background: #43936C;
            border-radius: 10px;
        }

        .scroll-lokasi::-webkit-scrollbar-thumb:hover {
            background: #b3b2b2;
        }

        .card-lokasi {
            background-color: #fff;
            border: 1px solid #e5e7e9;
            border-radius: 10px;
            box-shadow: 0 0 10px 0 rgba(138, 149, 158, .2);
            padding: 0% 2%;
            margin-top: 20px;
        }

        .btn-outline-green {
            padding-inline: 30px;
            font-weight: bolder;
            margin-bottom: 10px
        }

        .gambar-lokasi {
            padding: 20px;
        }

        .gambar-lokasi img {
            border-radius: 20px;
            height: 200px;
            width: 400px;
            object-fit: cover;

        }

        .text-lokasi {
            font-weight: 700;
            font-size: 24px;
            color: #00806a;
        }

        .text-lokasi-sub {
            font-weight: 400;
            font-size: 15px;
            color: #000;
        }


        .card-block {
            font-size: 1em;
            position: relative;
            margin: 0;
            padding: 1em;
            border: none;
            border-top: 1px solid rgba(34, 36, 38, .1);
            box-shadow: none;

        }

        .card {
            font-size: 1em;
            overflow: hidden;
            padding: 5;
            border: none;
            border-radius: .28571429rem;
            box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
            margin-top: 20px;
        }

        /* responsive */
        @media (max-width: 991.98px) {
            .container.wrapper {
                margin-top: 4rem;
                /* Margin top untuk layar kecil */
            }

            .scroll-lokasi {
                margin-top: -25px;
                padding-inline: 0 !important
                    /* Margin top untuk layar kecil */
            }
        }

        @media (max-width: 575.98px) {
            .container.wrapper {
                margin-top: 4rem;
                /* Atur margin top yang lebih kecil untuk layar ponsel */
            }

            .scroll-lokasi {
                margin-top: -25px;
                padding: 0 !important
            }
        }
    </style>

    <!-- jQuery harus dimuat terlebih dahulu -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 dimuat setelah jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Inisialisasi Select2 -->
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            $('#lokasi-select').select2();

            // Fungsi untuk menampilkan atau menyembunyikan card berdasarkan pilihan
            function filterLokasi() {
                var selectedId = $('#lokasi-select').val(); // Ambil nilai yang dipilih

                if (selectedId == "0") {
                    // Jika opsi default dipilih, tampilkan semua card
                    $('.card-lokasi').show();
                } else {
                    // Sembunyikan semua card terlebih dahulu
                    $('.card-lokasi').hide();

                    // Tampilkan hanya card yang sesuai dengan ID yang dipilih
                    $('.card-lokasi[data-id="' + selectedId + '"]').show();
                }
            }

            // Ketika opsi pada Select2 berubah, panggil fungsi filter
            $('#lokasi-select').change(function() {
                filterLokasi();
            });

            // Panggil filter saat halaman dimuat untuk memastikan tampilan sesuai pilihan default
            filterLokasi();
        });
    </script>

</x-web.app-webnoSlider>
