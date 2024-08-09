<x-auth-layout>
    <div class="login-box w-100">
        <!-- /.login-logo -->
        <section class="py-5">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="pe-lg-3 px-2">
                            <h1 class="display-5 font-weight-bold mb-2 mb-md-3">Selamat Datang di eMarketplace
                                Fotografer!

                            </h1>
                            <p class=" mb-4">Kami adalah platform yang menghubungkan fotografer
                                freelance berbakat
                                dengan klien yang mencari keindahan dalam setiap jepretan. Dengan banyak fotografer dari
                                berbagai latar belakang dan spesialisasi, kamu hanya perlu beberapa klik untuk menemukan
                                yang tepat untuk kebutuhan kamu.
                            </p>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="ps-lg-5">
                            <div class="card shadow-lg text-left h-100">
                                <div class="card-body p-4 p-xl-5">
                                    <div class="text-center">
                                        <a href="/">
                                            <img src="{{ asset('icon.png') }}" alt="" class="w-25">
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" id="#recaptcha-form" action="{{ route('login') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus placeholder="Email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="Password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit"
                                                    class="btn btn-primary btn-block">{{ __('Login') }}</button>

                                                <div class="row mt-3">
                                                    <a href="/#register" class="col-6 font-weight-bold">Buat Akun!</a>
                                                    <a href="{{ route('password.request') }}"
                                                        class="col-6 font-weight-bold text-right">Lupa Password</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /.card -->
    </div>
</x-auth-layout>
