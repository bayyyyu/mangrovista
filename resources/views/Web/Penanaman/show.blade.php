<x-web.app-webNoSlider>
    <div class="blog-single gray-bg">
        <div class="container">
            <div class="judul-atas" style="margin-top:2vh">
                <i class="icofont-arrow-left btn btn-sm custom-back-button" onclick="goBack()"
                    style="color: #064635; border:1px solid#064635">Kembali</i>
            </div>
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="{{ asset($tanaman->foto) }}">
                        </div>
                        <div class="media-body float-right mt-2">
                            <span style="color: #064635; font-size:15px"><i
                                    class="icofont-info-circle"></i>{{ $tanaman->status_penanaman }}</span>
                        </div>
                        <div class="article-title">
                            <h6><a><i class="icofont-google-map"></i>{{ $tanaman->lokasi }}</a></h6>
                            <h2>Penanaman yang dilakukan pada event {{ $tanaman->eventPenanaman->nama_event }}</h2>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="card-body">
                                        <hr>
                                        <div class="row" style="color: black">
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
                                                <strong style="font-weight: bolder">Masa Pembibitan</strong>
                                                @if ($tanaman->masa_tumbuh)
                                                    <p style="font-size:15px">{{ $tanaman->masa_tumbuh }}
                                                    </p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Umur Tanaman Saat Ditanam</strong>
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
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="avatar">
                                    <img src="{{ asset($tanaman->penulis->foto_profil) }}">
                                </div>
                                <div class="media-body">
                                    <label>{{ $tanaman->penulis->nama_lengkap }}</label>
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                    @endphp
                                    <span>{{ $tanaman->created_at->format('d M Y') }} (
                                        {{ $tanaman->created_at->diffForHumans() }} )</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <p style="text-align:justify">{!! $tanaman->deskripsi !!}</p>
                        </div>
                        {{-- <div class="nav tag-cloud" style="color: white">
                            <a >Design</a>
                            <a >Development</a>
                            <a >Travel</a>
                            <a >Web Design</a>
                            <a >Marketing</a>
                            <a >Research</a>
                            <a >Managment</a>
                        </div> --}}
                    </article>
                    {{-- <div class="contact-form article-comment">
                        <h4>Leave a Reply</h4>
                        <form id="contact-form" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Name" id="name" placeholder="Name *" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Email" id="email" placeholder="Email *" class="form-control"
                                            type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" placeholder="Your message *" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send">
                                        <button class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- Author -->
                    <div class="widget widget-author">
                        <div class="widget-title">
                            <h3>Uploader</h3>
                        </div>
                        <div class="widget-body">
                            <div class="media align-items-center">
                                <div class="avatar">
                                    <img src="{{ asset($tanaman->penulis->foto_profil) }}" title=""
                                        alt="">
                                </div>
                                <div class="media-body">
                                    <h6>Hello, saya<br> {{ $tanaman->penulis->nama_lengkap }}</h6>
                                </div>
                            </div>
                            <p>{{ $tanaman->penulis->bio }}</p>
                        </div>
                    </div>
                    <!-- End Author -->
                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="widget-body">
                            @foreach ($recent_upload as $tanaman)
                                <div class="latest-post-aside media">
                                    <div class="lpa-left media-body">
                                        <div class="lpa-title">
                                            <h5><a href="{{ url('Penanaman', $tanaman->id) }}">Penanaman yang dilakukan
                                                    pada event {{ $tanaman->eventPenanaman->nama_event }}</a></h5>
                                        </div>
                                        <div class="lpa-meta">
                                            <a class="name" href="{{ url('Penanaman', $tanaman->id) }}">
                                                {{ $tanaman->lokasi }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="lpa-right">
                                        <a href="{{ url('Penanaman', $tanaman->id) }}">
                                            <img src="{{ asset($tanaman->foto) }}" title="" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Latest Post -->
                    <!-- widget Tags -->
                    {{-- <div class="widget widget-tags">
                        <div class="widget-title">
                            <h3>Latest Tags</h3>
                        </div>
                        <div class="widget-body">
                            <div class="nav tag-cloud">
                                <a href="#">Design</a>
                                <a href="#">Development</a>
                                <a href="#">Travel</a>
                                <a href="#">Web Design</a>
                                <a href="#">Marketing</a>
                                <a href="#">Research</a>
                                <a href="#">Managment</a>
                            </div>
                        </div>
                    </div> --}}
                    <!-- End widget Tags -->
                </div>
            </div>
        </div>
    </div>
    <style>
        .judul-atas {
            margin-top: 30px;
        }

        .blog-grid {
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            border-radius: 5px;
            overflow: hidden;
            background: #ffffff;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .blog-grid .blog-img {
            position: relative;
        }

        .blog-grid .blog-img .date {
            position: absolute;
            background: #064635;
            color: #ffffff;
            padding: 8px 15px;
            left: 10px;
            top: 10px;
            border-radius: 4px;
        }

        .blog-grid .blog-img .date span {
            font-size: 22px;
            display: block;
            line-height: 22px;
            font-weight: 700;
        }

        .blog-grid .blog-img .date label {
            font-size: 14px;
            margin: 0;
        }

        .blog-grid .blog-info {
            padding: 20px;
        }

        .blog-grid .blog-info h5 {
            font-size: 22px;
            font-weight: 700;
            margin: 0 0 10px;
        }

        .blog-grid .blog-info h5 a {
            color: black;
        }

        .blog-grid .blog-info p {
            margin: 0;
        }

        .blog-grid .blog-info .btn-bar {
            margin-top: 20px;
        }

        .article-img img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        @media (max-width: 767px) {
            .article-img img {
                object-fit: contain;
            }
        }


        /* Blog Sidebar
-------------------*/
        .blog-aside .widget {
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            border-radius: 5px;
            overflow: hidden;
            background: #ffffff;
            margin-top: 15px;
            margin-bottom: 15px;
            width: 100%;
            display: inline-block;
            vertical-align: top;
        }

        .blog-aside .widget-body {
            padding: 15px;
        }

        .blog-aside .widget-title {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .blog-aside .widget-title h3 {
            font-size: 20px;
            font-weight: 700;
            color: #064635;
            margin: 0;
        }

        .blog-aside .widget-author .media {
            margin-bottom: 15px;
        }

        .blog-aside .widget-author p {
            font-size: 16px;
            margin: 0;
        }

        .blog-aside .widget-author .avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
        }

        .blog-aside .widget-author h6 {
            font-weight: 600;
            color: black;
            font-size: 22px;
            margin: 0;
            padding-left: 20px;
        }

        .blog-aside .post-aside {
            margin-bottom: 15px;
        }

        .blog-aside .post-aside .post-aside-title h5 {
            margin: 0;
        }

        .blog-aside .post-aside .post-aside-title a {
            font-size: 18px;
            color: black;
            font-weight: 600;
        }

        .blog-aside .post-aside .post-aside-meta {
            padding-bottom: 10px;
        }

        .blog-aside .post-aside .post-aside-meta a {
            color: #6F8BA4;
            font-size: 12px;
            text-transform: uppercase;
            display: inline-block;
            margin-right: 10px;
        }

        .blog-aside .latest-post-aside+.latest-post-aside {
            border-top: 1px solid #eee;
            padding-top: 15px;
            margin-top: 15px;
        }

        .blog-aside .latest-post-aside .lpa-right {
            width: 90px;
        }

        .blog-aside .latest-post-aside .lpa-right img {
            border-radius: 3px;
        }

        .blog-aside .latest-post-aside .lpa-left {
            padding-right: 15px;
        }

        .blog-aside .latest-post-aside .lpa-title h5 {
            margin: 0;
            font-size: 15px;
        }

        .blog-aside .latest-post-aside .lpa-title a {
            color: black;
            font-weight: 600;
        }

        .blog-aside .latest-post-aside .lpa-meta a {
            color: #6F8BA4;
            font-size: 12px;
            text-transform: uppercase;
            display: inline-block;
            margin-right: 10px;
        }

        .tag-cloud a {
            padding: 4px 15px;
            font-size: 13px;
            color: #ffffff;
            background: black;
            border-radius: 3px;
            margin-right: 4px;
            margin-bottom: 4px;
        }

        .tag-cloud a:hover {
            background: #064635;
        }

        .blog-single {
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .article {
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            border-radius: 5px;
            overflow: hidden;
            background: #ffffff;
            padding: 15px;
            margin: 15px 0 30px;
        }

        .article .article-title {
            padding: 15px 0 20px;
        }

        .article .article-title h6 {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .article .article-title h6 a {
            text-transform: uppercase;
            color: #064635;
            border-bottom: 1px solid #064635;
        }

        .article .article-title h2 {
            color: black;
            font-weight: 600;
        }

        .article .article-title .media {
            padding-top: 15px;
            border-bottom: 1px dashed #ddd;
            padding-bottom: 20px;
        }

        .article .article-title .media .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            overflow: hidden;
        }

        .article .article-title .media .media-body {
            padding-left: 8px;
        }

        .article .article-title .media .media-body label {
            font-weight: 600;
            color: #064635;
            margin: 0;
        }

        .article .article-title .media .media-body span {
            display: block;
            font-size: 12px;
        }

        .article .article-content h1,
        .article .article-content h2,
        .article .article-content h3,
        .article .article-content h4,
        .article .article-content h5,
        .article .article-content h6 {
            color: black;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .article .article-content blockquote {
            max-width: 600px;
            padding: 15px 0 30px 0;
            margin: 0;
        }

        .article .article-content blockquote p {
            font-size: 20px;
            font-weight: 500;
            color: #064635;
            margin: 0;
        }

        .article .article-content blockquote .blockquote-footer {
            color: black;
            font-size: 16px;
        }

        .article .article-content blockquote .blockquote-footer cite {
            font-weight: 600;
        }

        .article .tag-cloud {
            padding-top: 10px;
        }

        .article-comment {
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            border-radius: 5px;
            overflow: hidden;
            background: #ffffff;
            padding: 20px;
        }

        .article-comment h4 {
            color: black;
            font-weight: 700;
            margin-bottom: 25px;
            font-size: 22px;
        }

        img {
            max-width: 100%;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        /* Contact Us
---------------------*/
        .contact-name {
            margin-bottom: 30px;
        }

        .contact-name h5 {
            font-size: 22px;
            color: black;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .contact-name p {
            font-size: 18px;
            margin: 0;
        }

        .social-share a {
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            text-align: center;
            margin-right: 10px;
        }

        .social-share .dribbble {
            box-shadow: 0 8px 30px -4px rgba(234, 76, 137, 0.5);
            background-color: #ea4c89;
        }

        .social-share .behance {
            box-shadow: 0 8px 30px -4px rgba(0, 103, 255, 0.5);
            background-color: #0067ff;
        }

        .social-share .linkedin {
            box-shadow: 0 8px 30px -4px rgba(1, 119, 172, 0.5);
            background-color: #0177ac;
        }

        .contact-form .form-control {
            border: none;
            border-bottom: 1px solid black;
            background: transparent;
            border-radius: 0;
            padding-left: 0;
            box-shadow: none !important;
        }

        .contact-form .form-control:focus {
            border-bottom: 1px solid #064635;
        }

        .contact-form .form-control.invalid {
            border-bottom: 1px solid #ff0000;
        }

        .contact-form .send {
            margin-top: 20px;
        }

        @media (max-width: 767px) {
            .contact-form .send {
                margin-bottom: 20px;
            }
        }

        .section-title h2 {
            font-weight: 700;
            color: black;
            font-size: 45px;
            margin: 0 0 15px;
            border-left: 5px solid #064635;
            padding-left: 15px;
        }

        .section-title {
            padding-bottom: 45px;
        }

        .contact-form .send {
            margin-top: 20px;
        }

        .px-btn {
            padding: 0 50px 0 20px;
            line-height: 60px;
            position: relative;
            display: inline-block;
            color: black;
            background: none;
            border: none;
        }

        .px-btn:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            border-radius: 30px;
            background: transparent;
            border: 1px solid rgba(252, 83, 86, 0.6);
            border-right: 1px solid transparent;
            -moz-transition: ease all 0.35s;
            -o-transition: ease all 0.35s;
            -webkit-transition: ease all 0.35s;
            transition: ease all 0.35s;
            width: 60px;
            height: 60px;
        }

        .px-btn .arrow {
            width: 13px;
            height: 2px;
            background: currentColor;
            display: inline-block;
            position: absolute;
            top: 0;
            bottom: 0;
            margin: auto;
            right: 25px;
        }

        .px-btn .arrow:after {
            width: 8px;
            height: 8px;
            border-right: 2px solid currentColor;
            border-top: 2px solid currentColor;
            content: "";
            position: absolute;
            top: -3px;
            right: 0;
            display: inline-block;
            -moz-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</x-web.app-webNoSlider>
