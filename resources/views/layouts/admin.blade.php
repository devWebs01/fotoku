<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? '' }}</title>
    <link rel="icon" href="{{ asset(Setting::getValue('app_favicon')) }}" type="image/png" />
    {{-- select2 --}}
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{-- lightbox --}}
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/admin/dist/css/adminlte.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('css/font/css.css') }}" rel="stylesheet" /> --}}
    <!-- DataTables -->
    <link href="{{ asset('css/datatable/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('css/datatable/select.dataTables.min.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('css/datatable/buttons.dataTables.min.css') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"> --}}

    {{-- flatpickr --}}
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/flatpickr/material_green.css') }}">
    <script src="{{ asset('template/admin/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/flatpickr/id.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <script src="{{ asset('css/alertify/alertify.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/alertify/css/alertify.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/alertify/css/default.min.css') }}" />

    {{-- filepond --}}
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">
    <link href="https://adri-glez.github.io/filepond-plugin-pdf-preview/dist/filepond-plugin-pdf-preview.css"
        rel="stylesheet">

    @stack('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @php
        if (!$errors->isEmpty()) {
            alert()->error('Pemberitahuan', implode('<br>', $errors->all()))->toToast()->toHtml();
        }
    @endphp
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="card">
            <div class="card-body">
                @yield('content')
            </div>
        </div>
        <!-- /.content-wrapper -->
        @yield('modal')
        @include('layouts.modal')
        @include('sweetalert::alert')
        @include('layouts.footer')
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('template/admin/plugins/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    @yield('js')
    @include('layouts.script')
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('template/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- DataTables  & Plugins -->
    {{-- <script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script> --}}
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('template/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/admin/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('template/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/btn-datatable.js') }}"></script>
    <script src="{{ asset('js/autoNumeric.js') }}"></script>
    {{-- dipush ketika digunakan --}}
    {{-- <script src="{{ asset('js/config-ckeditor.js') }}"></script> --}}
    <!-- include FilePond library -->
    <script src="https://adri-glez.github.io/filepond-plugin-pdf-preview/dist/filepond-plugin-pdf-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script src="{{ asset('js/config-filepond.js') }}"></script>
    <script src="https://adminlte.io/themes/v3/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/filterizr/jquery.filterizr.min.js"></script>

    <script>
        let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
        let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
        let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
        let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
        let printButtonTrans = '{{ trans('global.datatables.print') }}'
        let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
        let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };
        let url = @json(url('/'));

        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
    @stack('scripts')
</body>

</html>
