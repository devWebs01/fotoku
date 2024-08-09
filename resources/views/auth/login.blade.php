<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ ENV('APP_NAME') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/admin/dist/css/adminlte.min.css') }}">

</head>

<body class="hold-transition login-page">
    @php
        if (!$errors->isEmpty()) {
            alert()->error('Pemberitahuan', implode('<br>', $errors->all()))->toToast()->toHtml();
        }
    @endphp
    <div class="login-box w-100">
        <!-- /.login-logo -->
        <section class="py-5">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="pe-lg-3">
                            <h1 class="display-5 font-weight-bold mb-2 mb-md-3">Selamat Datang di eMarketplace
                                Fotografer!

                            </h1>
                            <p class="lead mb-4">Kami adalah platform yang menghubungkan fotografer freelance berbakat
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

                                            <div class="input-group mb-3">
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
                                            <div class="input-group mb-3">
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
                                                    <a href="/#register" class="col-md font-weight-bold">Buat Akun!</a>
                                                    <a href="{{ route('password.request') }}" class="col-md font-weight-bold text-right">Lupa Password</a>
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
    @include('sweetalert::alert')
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="{{ asset('template/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/admin/dist/js/adminlte.js') }}"></script>
</body>

</html>
