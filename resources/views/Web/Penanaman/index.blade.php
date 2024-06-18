<x-web.app-webNoSlider>
    <div class="blog-section blog-page mt-5">
        <div class="container">
            <div class="judul-atas" style="margin-top:70px">
               
            </div>
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class=" col-12">
                        <article>
                            <div class="tabcontent">
                                <div class="shop-title d-flex flex-wrap justify-content-between ">
                                    <p>
                                        Daftar Penanaman
                                    </p>
                                    <div class="product-view-mode">
                                        <a class="active" data-target="grids"><i class="icofont-ghost"></i></a>
                                    </div>
                                </div>
                                <div class="shop-product-wrap grids row ">
                                    @foreach ($list_tanaman as $tanaman)
                                        <div class="col-lg-4 col-md-6 col-12 mb-3">
                                            <div class="campaign-card">
                                                <img src="{{ asset($tanaman->eventPenanaman->foto) }}"
                                                    style="height:170px; object-fit:cover">
                                                <div class="campaign-content">
                                                    <h3>Penanaman pada event {{ $tanaman->eventPenanaman->nama_event }}
                                                    </h3>
                                                    <p>{!! substr(nl2br($tanaman->deskripsi), 0, 100) !!}..... </p>
                                                </div>
                                                <div class="action-buttons">
                                                    <a href="{{ url('Penanaman', $tanaman->id) }}"
                                                        class="btn btn-sm">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex flex-wrap justify-content-center mt-2">
                                    {{ $list_tanaman->onEachSide(1)->links() }}
                                </div>
                                <div class="container">
                                    <div class="text-center">
                                        <p style="color: black; font-size:12px; font-weight:inherit">
                                            Menampilkan
                                            {{ $list_tanaman->firstItem() }}
                                            Sampai
                                            {{ $list_tanaman->lastItem() }}
                                            Dari
                                            {{ $list_tanaman->total() }}
                                            Item
                                        </p>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Style untuk tombol tab-link */
        .tab button {
            float: left;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Style untuk tombol tab-link aktif */
        .tab button.active {
            background-color: #064635 !important;
            color: white !important;
        }

        .search::-webkit-input-placeholder {
            color: #064635;
        }

        .search-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            margin-left: auto;
        }

        #searchInput {
            margin-right: 10px;
        }

        @media screen and (max-width: 768px) {
            .search-container {
                flex-direction: flex;
                align-items: center;
                justify-content: center;
                margin-top: 20px;
            }

            .tab {
                text-align: center;
            }

            .tab button {
                float: none;
                display: inline-block;

            }
        }

        /*card*/
        .campaign-card {
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            position: relative;
            height: 400px
        }

        .action-buttons {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 16px;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;

        }

        .action-buttons .status {
            color: black;
            font-size: 15px;
        }

        .action-buttons .btn {
            display: inline-block;
            background-color: #064635;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
        }

        .campaign-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .campaign-content {
            padding: 16px;
        }

        .campaign-content h3 {
            font-size: 18px;
            margin-top: 0;
        }

        .campaign-content p {
            margin-bottom: 12px;
        }

        /* Pagination*/
        .pagination .page-item.active .page-link {
            background-color: #064635;
            color: white;
        }

        .pagination .page-item:not(.disabled):first-child .page-link::before {
            content: '\2039';
        }

        .pagination .page-item:not(.disabled):last-child .page-link::before {
            content: '\203A';
        }
    </style>
</x-web.app-webNoSlider>
