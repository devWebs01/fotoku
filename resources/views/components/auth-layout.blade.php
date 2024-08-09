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
    {{-- @vite([]) --}}
</head>

<body class="hold-transition login-page">
    @php
        if (!$errors->isEmpty()) {
            alert()->error('Pemberitahuan', implode('<br>', $errors->all()))->toToast()->toHtml();
        }
    @endphp
    {{ $slot }}
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
