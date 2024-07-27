<x-web.app-webNoSlider>
    <div class="blog-section blog-page">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class=" col-12">
                        <article>
                            <div class="post-item-2">
                                <div class="post-inner">
                                    <div class="post-content ">
                                        <div class="tab">
                                            <button class="tablink btn btn-sm" onclick="openTab(event, 'belumSelesai')"
                                                id="defaultOpen"
                                                style="margin-right:10px; border-radius:5px; background-color:white; border:2px solid #064635; font-weight:bolder; color:#064635">Belum
                                                Selesai</button>
                                            <button class="tablink btn btn-sm" onclick="openTab(event, 'berlangsung')"
                                                style="margin-right:10px; border-radius:5px; background-color:white; border:2px solid #064635; font-weight:bolder; color:#064635">Berlangsung</button>
                                            <button class="tablink btn btn-sm active"
                                                onclick="openTab(event, 'telahSelesai')"
                                                style="margin-right:10px; border-radius:5px; background-color:white; border:2px solid #064635; font-weight:bolder; color:#064635">Telah
                                                Selesai</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--- Konten Event Belum Selesai--->
                            @include('Web.Event.Data-Index.Tabs.belumSelesai')
                            <!--- Konten Event Belum Selesai--->

                            <!--- Konten Event Berlangsung--->
                            @include('Web.Event.Data-Index.Tabs.berlangsung')
                            <!--- Konten Event Berlangsung--->

                            <!--- Konten Event Telah Selesai --->
                            @include('Web.Event.Data-Index.Tabs.telahSelesai')
                            <!--- Konten Event Telah Selesai --->
                           
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Web.Event.Data-Index.Assets.style')
    
    @include('Web.Event.Data-Index.Assets.script')
</x-web.app-webNoSlider>
