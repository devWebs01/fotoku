<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>eMarketPlace Fotografer</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('template/admin/dist/css/adminlte.min.css') }}"> --}}
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('frontend/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/dist/css/adminlte.min.css') }}">
    {{-- flatpickr --}}
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/flatpickr/material_green.css') }}">
    <script src="{{ asset('template/admin/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/flatpickr/id.min.js') }}"></script>

</head>

<body>
    <!-- top header section start -->
    <!-- header section start -->
    <div class="header_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-3">
                    <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('logo-header.jpg') }}"
                                width="150px;"></a></div>
                    {{-- <div class="logo"><a href="index.html"><img src="{{ asset('frontend/images/logo.png') }}"></a></div> --}}
                </div>
                <div class="col-sm-5">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <ul>
                                    <li><a class="nav-item nav-link" href="{{ url('/') }}">Home</a></li>
                                    <li>|</li>
                                    <li><a class="nav-item nav-link" href="{{ url('/') }}#about">Tentang Kami</a>
                                    </li>
                                    <li>|</li>
                                    <li><a class="nav-item nav-link" href="{{ url('/fotografer') }}">Fotografer</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-sm-5 col-lg-4" style="text-align-last: right;">
                    <div class="search_main">
                        @auth
                            <div class="left_main">
                                <div class="login_text"><a href="/home">Kembali ke Dashboard</a></div>
                            </div>
                        @else
                            <div class="left_main">
                                <div class="login_text"><a href="#register">Register Pengguna</a></div>
                            </div>
                            <div class="right_main">
                                <div class="login_text"><a href="{{ url('login') }}">Login</a></div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header section end -->
    <section class="content" style="padding: 50px;">
        <div class="row" style="margin-top: 100px;">
            <div class="col-12">
                <div class="card">

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h1 class="m-0">{{ $title }}</h1>
            </div>
            <div class="card-body row ">
                <div class="col-6">
                    <form method="POST" action="{{ route('admin.booking.store') }}" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <x-form-select2 id='kecamatan_id' text='Kecamatan / Daerah' required='required'>
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}</option>
                                @endforeach
                            </x-form-select2>
                            <x-form-select2 id='fotografer_id' text='Fotografer' required='required'>
                            </x-form-select2>
                            <x-form-select2 id='produk_id' text='Produk / Paket' required='required'>
                            </x-form-select2>
                            <x-form-date id='tgl_acara' text='Tanggal Mulai Acara' addClass='dmy'
                                required='required' />
                            <x-form-date id='jam' text='Jam Mulai Acara' addClass='jam' required='required' />
                            <x-form-textarea id='deskripsi_acara' text='Deskripsi Acara'
                                required='required'></x-form-textarea>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Simpan" class="btn btn-success">
                            <a href="{{ route('admin.booking.index') }}" class="btn btn-light">Kembali</a>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <center>
                        <div class="box-profile">
                            <img class="profile-user-img img-fluid img-circle img-fotografer"
                                style="width: 300px;height: 300px; object-fit: cover;" src="{{ asset('user-default.jpg') }}"
                                alt="User profile picture">
                            <p class="text-muted text-center nama-fotografer" style="margin-top:20px;"></p>
                        </div>
                    </center>
                </div>

            </div>
    </section>
    <!-- footer section start -->
    <div class="footer_section">
        <div class="container">
            <div class="footer_logo"><img src="{{ asset('icon.png') }}"></div>
            <p class="long_text">It is a long established fact that a reader will be It is a long established fact that
                a reader will be </p>
            <div class="footer_section_2">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="icon_main">
                            <ul>
                                <li><a href="#"><img src="{{ asset('frontend/images/map-icon.png') }}"></a>
                                </li>
                                <li><a href="#"><img src="{{ asset('frontend/images/email-icon.png') }}"></a>
                                </li>
                                <li><a href="#"><img src="{{ asset('frontend/images/contact-icon.png') }}"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <h1 class="news_text">Newsletter</h1>
                        <input type="" class="email_bt" placeholder="Enter your email" name="">
                        <button class="subscribe_bt"><a href="#">Subscribe</a></button>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="social_icon">
                            <ul>
                                <li><a href="#"><img src="{{ asset('frontend/images/fb-icon.png') }}"></a></li>
                                <li><a href="#"><img src="{{ asset('frontend/images/twitter-icon.png') }}"></a>
                                </li>
                                <li><a href="#"><img
                                            src="{{ asset('frontend/images/instagram-icon.png') }}"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->

    <!-- copyright section end -->


    <!-- Javascript files-->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <!-- javascript -->
    <script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
    {{-- <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> --}}
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/autoNumeric.js') }}"></script>
    <script src="{{ asset('template/admin/dist/js/adminlte.js') }}"></script>
    <script>
        let produk = @json($produk) ?? null;
        $('.box-profile').hide();

        if (produk != null) {
            $('#kecamatan_id').val(produk.fotografer.kecamatan_id).trigger('change');
            $('#fotografer_id').empty().append('<option value="' + produk.fotografer_id + '">' + produk.fotografer.nama +
                '</option>');
            $('#produk_id').empty().append('<option value="' + produk.id + '">' + produk.nama_produk + ' ( Rp.' + produk
                .harga + ' )</option>');
            $('.box-profile').show();
            $('.img-fotografer').attr('src', 'http://localhost:8000/uploads/' + produk.fotografer.foto_profile);
            $('.nama-fotografer').html(produk.fotografer.nama);
        }

        $('#kecamatan_id').on('change', function(e) {
            if ($(this).val() != '') {
                $('#fotografer_id').empty().append('<option value="">[ Pilih Fotografer ]</option>');
                $('.box-profile').hide();

                var id = e.target.value;
                $.get("{{ url('admin/fotografer/getFotograferFromKecamatan') }}/" + id, function(response) {
                    $.each(response.data, function(key, data) {
                        $('#fotografer_id').append('<option data-name="' + data.nama + '" value="' +
                            data.id + '">' + data.nama + '</option>');
                    })
                });
            } else if ($(this).val() == '') {
                $('#fotografer_id').val('').trigger('change');
                $('#fotografer_id').empty().append('<option value="">[ Pilih Fotografer ]</option>');
                $('.box-profile').hide();
            }
        });

        // $('#fotografer_id').on('change', function(e) {
        //     if ($(this).val() != '') {
        //         $('#produk_id').empty().append('<option value="">[-- Pilih Select2 --]</option>');
        //         $('.box-profile').show();
        //         var id = e.target.value;
        //         $.get("{{ url('admin/produk/getProdukFromUser') }}/" + id, function(response) {
        //             $.each(response.data, function(key, data) {
        //                 $('#produk_id').append('<option value="' + data.id + '">' + data
        //                     .nama_produk + ' ( Rp.' + data.harga + ') </option>');
        //             })
        //         });
        //         $.get("{{ url('admin/fotografer/getFotograferFromId') }}/" + id, function(response) {
        //             let profile = response.data.foto_profile;
        //             if (profile != null) {
        //                 $('.img-fotografer').attr('src', 'http://localhost:8000/uploads/' + profile); // ini error tidak menampilkan gambar dari penyimpanan
        //             } else {
        //                 $('.img-fotografer').attr('src', 'http://localhost:8000/user-default.jpg');
        //             }
        //             $('.nama-fotografer').html(response.data.nama);
        //         });
        //     } else if ($(this).val() == '') {
        //         $('#produk_id').val('').trigger('change');
        //         $('#produk_id').empty().append('<option value="">[-- Pilih Select2 --]</option>');
        //     }
        // });

        $('#fotografer_id').on('change', function(e) {
            if ($(this).val() != '') {
                $('#produk_id').empty().append('<option value="">[-- Pilih Select2 --]</option>');
                $('.box-profile').show();
                var id = e.target.value;
                $.get("{{ url('admin/produk/getProdukFromUser') }}/" + id, function(response) {
                    $.each(response.data, function(key, data) {
                        $('#produk_id').append('<option value="' + data.id + '">' + data
                            .nama_produk + ' ( Rp.' + data.harga + ') </option>');
                    })
                });
                $.get("{{ url('admin/fotografer/getFotograferFromId') }}/" + id, function(response) {
                    let profile = response.data.foto_profile;
                    if (profile != null) {
                        let profileUrl = "{{ asset('storage') }}/" + profile;
                        $('.img-fotografer').attr('src',
                        profileUrl); // ini akan menampilkan gambar dari penyimpanan
                    } else {
                        $('.img-fotografer').attr('src', "{{ asset('user-default.jpg') }}");
                    }
                    $('.nama-fotografer').html(response.data.nama);
                });
            } else if ($(this).val() == '') {
                $('#produk_id').val('').trigger('change');
                $('#produk_id').empty().append('<option value="">[-- Pilih Select2 --]</option>');
            }
        });
    </script>
</body>

</html>
