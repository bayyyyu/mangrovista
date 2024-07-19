<x-web.app-webNoSlider>
    <link rel="stylesheet" href="{{url('/')}}/assets-web2/assets/css/Profil/style.css">
    <div class="container">
        <div class="faq-section mt-5" style="margin-bottom: 40px; ">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="faq-tab">
                            @include('Web.Profil.Buttons.tab')
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content faq-content" id="tab-content">
                            <!-- Konten untuk tab Ringkasan akun -->
                            @include('Web.Profil.Tabs.ringkasan')
                            <!-- Konten untuk tab Partisipasi -->
                            @include('Web.Profil.Tabs.partisipasi')
                            <!-- Konten untuk tab pengajuan event -->
                            @include('Web.Profil.Tabs.kelola-event')
                            <!-- Konten untuk tab Peran -->
                            @include('Web.Profil.Tabs.peran')
                            <!-- Konten untuk tab Pengaturan Akun -->
                            @include('Web.Profil.Tabs.pengaturan')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Keluar start-->
    {{-- <x-button.keluar /> --}}
    @include('Web.Profil.Modal.keluar')
    <!-- Modal Keluar end-->

    <!-- Modal Preview Image start-->
    @include('Web.Profil.Modal.preview')
    <!-- Modal Preview Image end-->

    <!-- Script-->
    <script src="{{url('/')}}/assets-web2/assets/js/Front-end/profil.js"></script>
</x-web.app-webNoSlider>
