<x-web.app-webNoSlider>
    <x-auth.app-login>
        <div class="content-halaman">
            <section class="container-1">
                <div class="login-container">
                    <div class="circle circle-one"></div>
                    <div class="form-container">
                        <form action="{{ route('verification.send') }}" method="post">
                            @csrf
                            <img src="{{ url('/') }}/assets-web2/assets/images/logo/6.png" alt="logo"
                                style="height: 30px; width: 100%; object-fit: contain"><span
                                style="display: block; text-align: center; color:#064635; font-weight:bold">Login</span>
                            <button type="button" class="btn btn-sm btn-outline-green">Kirim ulang verifikasi</button>
                        </form>
                        <hr class="garis-bawah">
                    </div>
                    <div class="circle circle-two"></div>
                </div>
            </section>
        </div>
    </x-auth.app-login>
</x-web.app-webNoSlider>
