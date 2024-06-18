<x-web.app-webNoSlider>
    <x-auth.app-login>
        <div class="content-halaman">

            <section class="container-1">
                <div class="login-container">
                    <div class="circle circle-one"></div>
                    <div class="form-container">
                        {{-- <form action="{{ url('Register') }}" method="post">
                            @csrf
                            <img src="{{ url('/') }}/assets-web2/assets/images/logo/6.png" alt="logo"
                                style="height: 30px; width: 100%; object-fit: contain"><span
                                style="display: block; text-align: center; color:#064635; font-weight:bold">Register</span>
                            <x-utils.notif />
                            <hr class="garis">
                            <div class="form-group">
                                <input type="text" value="{{ Session::get('nama_lengkap') }}" name="nama_lengkap"
                                    required="" value="{{ old('nama_lengkap') }}" placeholder="Nama Lengkap" />
                                @if ($errors->any('nama_lengkap'))
                                    <ul class="text-danger">
                                        @foreach ($errors->get('nama_lengkap') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ Session::get('username') }}" name="username"
                                    required="" value="{{ old('username') }}" placeholder="Username" />
                                @if ($errors->any('username'))
                                    <ul class="text-danger">
                                        @foreach ($errors->get('username') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="email" value="{{ Session::get('email') }}" name="email" required=""
                                    value="{{ old('email') }}" placeholder="Email" />
                                @if ($errors->any('email'))
                                    <ul class="text-danger">
                                        @foreach ($errors->get('email') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="password-container">
                                <input type="password" value="{{ Session::get('password') }}" name="password" required=""
                                    value="{{ old('password') }}" id="passwordInput" placeholder="Password" />
                                <div class="password-toggle" onclick="togglePasswordVisibility()">
                                    <i id="eyeOpen" class="fas fa-eye"></i>
                                    <i id="eyeClosed" class="fas fa-eye-slash"></i>
                                </div>
                                @if ($errors->any('password'))
                                    <ul class="text-danger">
                                        @foreach ($errors->get('password') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <button>Daftar</button>
                        </form> --}}
                        <form action="{{ url('Register') }}" method="post">
                            @csrf
                            <img src="{{ url('/') }}/assets-web2/assets/images/logo/6.png" alt="logo"
                                style="height: 30px; width: 100%; object-fit: contain">
                            <span
                                style="display: block; text-align: center; color:#064635; font-weight:bold">Register</span>
                            <x-utils.notif />
                            <hr class="garis">
                            <div class="form-group">
                                <input type="text" value="{{ old('nama_lengkap') }}" name="nama_lengkap"
                                    required="" placeholder="{{ $errors->first('nama_lengkap') ?: 'Nama Lengkap' }}"
                                    class="{{ $errors->has('nama_lengkap') ? 'error' : '' }}" onfocus="clearError(this)" />
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ old('username') }}" name="username" required=""
                                    placeholder="{{ $errors->first('username') ?: 'Username' }}"
                                    class="{{ $errors->has('username') ? 'error' : '' }}" onfocus="clearError(this)" />
                            </div>
                            <div class="form-group">
                                <input type="email" value="{{ old('email') }}" name="email" required=""
                                    placeholder="{{ $errors->first('email') ?: 'Email' }}"
                                    class="{{ $errors->has('email') ? 'error' : '' }}" onfocus="clearError(this)" />
                            </div>
                            <div class="password-container">
                                <input type="password" value="{{ old('password') }}" name="password" required=""
                                    id="passwordInput" placeholder="{{ $errors->first('password') ?: 'Password' }}"
                                    class="{{ $errors->has('password') ? 'error' : '' }}" onfocus="clearError(this)" />
                                <div class="password-toggle" onclick="togglePasswordVisibility()">
                                    <i id="eyeOpen" class="fas fa-eye"></i>
                                    <i id="eyeClosed" class="fas fa-eye-slash"></i>
                                </div>
                            </div>
                            <button>Daftar</button>
                        </form>
                        <div class="login-text">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="text">Sudah punya akun? <a href="{{ url('Login') }}"
                                            class="login-link" style="color: white"><span> Klik disini untuk
                                                masuk</span></a></span>
                                </div>
                            </div>
                        </div>
                        <hr class="garis-bawah">
                    </div>
                    <div class="circle circle-two"></div>
                </div>
            </section>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const inputsWithError = document.querySelectorAll('.error');
                inputsWithError.forEach(function(input) {
                    const originalPlaceholder = input.getAttribute('placeholder');

                    input.addEventListener('input', function() {
                        if (this.value.trim() === '') {
                            this.classList.add('error');
                            this.setAttribute('placeholder', originalPlaceholder);
                        } else {
                            this.classList.remove('error');
                        }
                    });

                    input.addEventListener('invalid', function() {
                        this.setCustomValidity('');
                        this.setAttribute('placeholder', this.validationMessage);
                    });
                });
            });
        </script>
    </x-auth.app-login>
</x-web.app-webNoSlider>
