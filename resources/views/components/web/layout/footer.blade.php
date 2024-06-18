<footer>
    <div class="footer-top relative padding-tb bg-ash relative">
        <div class="shape-images">
            <img src="{{ url('/') }}/assets-web2/assets/images/shape-img/01.png" alt="shape-images">
        </div>
        <div class="container">
            <div class="section-wrapper row">
                <div class="col-xl-3 col-md-6">
                    <div class="post-item">
                        <div class="footer-logo">
                            <img src="{{ url('/') }}/assets-web2/assets/images/logo/with-text.png" style="height: 70px" alt="footer-logo">
                        </div>
                        <p>MangroVista merupakan website yang menyiapkan wadah untuk menyebarluaskan event penanaman pohon manggrove  yang mempunyai kode dan titik 
                            koordinat label lokasi dan mengunakan SIG.</p>
                        <p> SIG menyertakan detail dari penanaman yang dilakukan.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="post-item">
                        <div class="post-title">
                            <h5>Keep In Touch</h5>
                        </div>
                        <ul class="lab-ul footer-location">
                            <li>
                                <div class="icon-part">
                                    <i class="icofont-phone"></i>
                                </div>
                                <div class="content-part">
                                    <p>+88130-589-745-6987</p>
                                    <p>+1655-456-523</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon-part">
                                    <i class="icofont-wall-clock"></i>
                                </div>
                                <div class="content-part">
                                    <p>Mon - Fri 09:00 - 18:00</p>
                                    <p>(except public holidays)</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon-part">
                                    <i class="icofont-location-pin"></i>
                                </div>
                                <div class="content-part">
                                    <p>25/2 Lane2 Vokte Street Building <br>Melborn City</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-md-6">
					<div class="post-item">
						<div class="post-title">
									<h5>Penanaman</h5>
						</div>
						<div class="lab-ul footer-post">
							<div class="media mb-3">
								<div class="fp-thumb mr-3">
									<img src="" alt="recent-post">
								</div>
								<div class="media-body">
									<a href="#">
										<h6 class="mt-0">Light Brown Eggs</h6>
									</a>
									<span class="price">$25.99</span>
								</div>
							</div>
							<div class="media mb-3">
								<div class="fp-thumb mr-3">
									<img src="" alt="recent-post">
								</div>
								<div class="media-body">
									<a href="#">
										<h6 class="mt-0">Little Chicken Broiler</h6>
									</a>
									<span class="price">$25.99</span>
								</div>
							</div>
						</div>		
					</div>
				</div>		 --}}
                <div class="col-xl-3 col-md-6">
                    <div class="post-item">
                        <div class="post-title">
                            <h5>Jenis Mangrove</h5>
                        </div>
                        <div class="lab-ul footer-gellary">
                            <figure class="figure">
                                <a href="{{ url('/') }}/assets-web2/assets/images/katalog-pohon/api-api.jpg"
                                    data-rel="lightcase:myCollection:slideshow"><img
                                        src="{{ url('/') }}/assets-web2/assets/images/katalog-pohon/api-api.jpg" 
                                        class="img-fluid rounded" alt="footer-gellary" style="height:80px; width:80px; object-fit:cover"></a>
                            </figure>
                            <figure class="figure">
                                <a href="{{ url('/') }}/assets-web2/assets/images/katalog-pohon/bakau.jpg"
                                    data-rel="lightcase:myCollection:slideshow"><img
                                        src="{{ url('/') }}/assets-web2/assets/images/katalog-pohon/bakau.jpg" 
                                        class="img-fluid rounded" alt="footer-gellary" style="height:80px; width:80px; object-fit:cover"></a>
                            </figure>
                            <figure class="figure">
                                <a href="{{ url('/') }}/assets-web2/assets/images/katalog-pohon/lacang.jpg"
                                    data-rel="lightcase:myCollection:slideshow"><img
                                        src="{{ url('/') }}/assets-web2/assets/images/katalog-pohon/lacang.jpg" 
                                        class="img-fluid rounded" alt="footer-gellary" style="height:80px; width:80px; object-fit:cover"></a>
                            </figure>
                            <figure class="figure">
                                <a href="{{ url('/') }}/assets-web2/assets/images/katalog-pohon/nipah.jpg"
                                    data-rel="lightcase:myCollection:slideshow"><img
                                        src="{{ url('/') }}/assets-web2/assets/images/katalog-pohon/nipah.jpg" 
                                        class="img-fluid rounded" alt="footer-gellary" style="height:80px; width:80px; object-fit:cover"></a>
                            </figure>
                            <figure class="figure">
                                <a href="{{ url('/') }}/assets-web2/assets/images/katalog-pohon/pepada.jpg"
                                    data-rel="lightcase:myCollection:slideshow"><img
                                        src="{{ url('/') }}/assets-web2/assets/images/katalog-pohon/pepada.jpg" 
                                        class="img-fluid rounded" alt="footer-gellary" style="height:80px; width:80px; object-fit:cover"></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="section-wrapper" >
                <p class="text-center" style="color:#064635">Copyright &copy; <span class="default-color">Bayu Pratama 2024
                        @if (date('Y') > '2024')
                            - {{ date('Y') }}
                        @endif.</span>All rights reserved</p>
            </div>
        </div>
    </div>
</footer>
