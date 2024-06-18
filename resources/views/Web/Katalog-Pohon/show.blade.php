<x-web.app-webNoSlider>
    {{-- <div class="blog-section blog-single mt-3"> --}}
    <div class="container katalog-pohon" >
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="text-center mb-3" style="font-size: 12px; font-weight:bolder">
                        <span property="itemListElement" typeof="ListItem"><a href="{{ url('Katalog-Pohon') }}"
                                class="home"><span property="name">Katalog Pohon</span></a>
                        </span> &gt;
                        <span property="itemListElement" typeof="ListItem"><a href="{{ url('Katalog-Pohon') }}"
                                class="home"><span
                                    property="name">{{ $katalog_pohon->nama_pohon }}{{ $katalog_pohon->nama_lain_pohon }}:
                                    Klasifikasi, Ciri-ciri dan Manfaatanya</span></a>
                        </span>
                    </div>
                    <div class="text-center mb-3">
                        <h5>{{ $katalog_pohon->nama_pohon }}{{ $katalog_pohon->nama_lain_pohon }}: </h5>
                        <h5>
                            Klasifikasi, Ciri-ciri dan Manfaatanya
                        </h5> 
                    </div>
                    <article>
                        <div class="post-item-2">
                            <div class="post-inner">
                                <div class="col-lg-9" style="text-align:justify; margin:auto">
                                    <div class="post-thumb">
                                        <img src="{{ asset($katalog_pohon->foto) }}"
                                            alt="gambar pohon {{ $katalog_pohon->nama_pohon }}"
                                            style="width:100%;height:400px;object-fit:cover;border-radius:10px">
                                    </div>
                                </div>
                                <div class="post-content">
                                    <h4>{{ $katalog_pohon->nama_pohon }}{{ $katalog_pohon->nama_lain_pohon }} </h4>
                                    <div style="text-align:justify">{!! $katalog_pohon->deskripsi !!}</div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    <style>
        .katalog-pohon{
            margin-top: 1rem
        }
        @media screen and (max-width: 991.98px) {
            .katalog-pohon {
                margin-top: 5rem;
            }
        }
    </style>
</x-web.app-webNoSlider>
