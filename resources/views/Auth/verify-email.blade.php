<x-web.app-login>
    <x-auth.app-login>
        <div class="content-halaman">
            <section class="container-1">
                @if ($isVerified)
                    <div class="message-container">
                        <div class="form-container text-center">
                            <p class="text-white">Email Anda telah berhasil diverifikasi. Anda sekarang dapat mengakses
                                semua fitur.</p>
                            <img src="{{ url('/') }}/assets-web2/assets/images/login/gmail-check2.png" alt="logo"
                                style="height: 80px; width: 100%; object-fit: contain">
                        </div>
                    </div>
                @else
                    <div class="message-container">
                        <div class="form-container text-center">
                            <p class="text-white">Verifikasi sudah dikirim ke email Anda. Silakan periksa email Anda dan
                                verifikasi akun Anda.</p>
                            <img src="{{ url('/') }}/assets-web2/assets/images/login/gmail.png" alt="logo"
                                style="height: 50px; width: 100%; object-fit: contain">
                        </div>
                    </div>
                @endif
            </section>
        </div>
    </x-auth.app-login>
</x-web.app-login>
