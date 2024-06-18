<x-web.app-webNoSlider>
    <x-auth.app-login>
        <div class="content-halaman">
            <section class="container-1">
                <div class="login-container">
                    <div class="circle circle-one"></div>
                    <div class="form-container">
                        <form action="{{ url('Login') }}" method="post">
                            @csrf
                            <img src="{{ url('/') }}/assets-web2/assets/images/logo/6.png" alt="logo"
                                style="height: 30px; width: 100%; object-fit: contain"><span
                                style="display: block; text-align: center; color:#064635; font-weight:bold">Login</span>
                            <x-utils.notif />
                            <hr class="garis">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" />
                            </div>
                            <div class="password-container">
                                <input type="password" name="password" id="passwordInput" placeholder="Password" />
                                <div class="password-toggle" onclick="togglePasswordVisibility()">
                                    <i id="eyeOpen" class="fas fa-eye"></i>
                                    <i id="eyeClosed" class="fas fa-eye-slash"></i>
                                </div>
                            </div>
                            <div class="remember-me">
                                <input type="checkbox" name="remember_token" id="rememberMe" />
                                <label for="rememberMe" class="checkmark"></label>
                                <span>Remember Me</span>
                            </div>
                            <button>Login</button>
                        </form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="" class="forgot-password-link" style="color: white"><span>Lupa
                                                Password?</span></a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ url('Register') }}" class="register-link"
                                            style="color: white"><span>Daftar</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="garis-bawah">
                        {{-- <form class="google-login" action="{{ url('login/google') }}" method="get">
                            <button type="submit"><i class="fab fa-google mt-1" style="float:left"></i>Register</button>
                        </form> --}}
                    </div>
                    <div class="circle circle-two"></div>
                </div>
            </section>
        </div>
    </x-auth.app-login>
</x-web.app-webNoSlider>
