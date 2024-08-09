<x-auth-layout>
    <div class="login-box w-100">

        <!-- Password Reset 4 - Bootstrap Brain Component -->
        <section class="p-3 p-md-4 p-xl-5">
            <div class="container">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="col-12 col-md-6">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <div class="text-center">
                                                <a href="/">
                                                    <img src="{{ asset('icon.png') }}" alt="" class="w-25">
                                                </a>
                                                <h2 class="h4">Buat Ulang Password</h2>
                                                <small
                                                    class="fs-6 font-weight-bold text-secondary text-center m-0">Selamat
                                                    datang di halaman reset password! Untuk melindungi akun kamu,
                                                    silakan buat password baru yang kuat dan aman.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email"
                                            autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>

                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label for="password-confirm"
                                            class="form-label">{{ __('Ulangi Password') }}</label>

                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="d-grid mb-0">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                src="https://i.pinimg.com/564x/60/42/24/604224beec23fb006096e5ee541849a5.jpg"
                                alt="BootstrapBrain Logo">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</x-auth-layout>
