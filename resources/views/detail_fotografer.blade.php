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
    <title>eMarketplace Fotografer</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('template/admin/dist/css/adminlte.min.css') }}"> --}}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/ekko-lightbox/ekko-lightbox.css">
    <link rel="stylesheet" href="{{ asset('template/admin/dist/css/adminlte.min.css') }}">

</head>

<body>
    <!-- top header section start -->
    <!-- header section start -->
    <div class="header_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 col-sm-3">
                    <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('logo-header.jpg') }}"
                                width="150px;"></a></div>
                    {{-- <div class="logo"><a href="index.html"><img src="{{ asset('frontend/images/logo.png') }}"></a></div> --}}
                </div>
                <div class="col-12 col-sm-9 float-right">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light float-right">
                        <button class="navbar-toggler " type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon float-right"></span>
                        </button>
                        <div class="collapse navbar-collapse float-right" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <ul>
                                    <li><a class="nav-item nav-link" href="{{ url('/') }}">Home</a></li>
                                    <li>|</li>
                                    <li><a class="nav-item nav-link" href="{{ url('/') }}#about">Tentang Kami</a>
                                    </li>
                                    <li>|</li>
                                    <li><a class="nav-item nav-link" href="{{ url('fotografer') }}">Fotografer</a></li>
                                    <li>|</li>
                                    @auth

                                        <li><a class="nav-item nav-link" href="/admin/dashboard">Kembali Ke Dashboard</a>
                                        </li>
                                    @else
                                        <li><a class="nav-item nav-link" href="{{ url('/') }}#register">Register
                                                Pengguna</a></li>
                                        <li>|</li>
                                        <li><a class="nav-item nav-link" href="{{ url('login') }}">Login</a></li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- header section end -->
        <section class="content">
            <div class="row" style="margin-top: 50px;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-md">
                                    <h3>Profile Fotografer</h3>
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Nama</th>
                                            <td>:</td>
                                            <td>{{ $fotografer->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>Spesialisasi</th>
                                            <td>:</td>
                                            <td>{{ $fotografer->spesialisasi }}</td>
                                        </tr>
                                        <tr>
                                            <th>No Telp</th>
                                            <td>:</td>
                                            <td>{{ $fotografer->no_telp }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>:</td>
                                            <td>{{ $fotografer->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>:</td>
                                            <td>{{ $fotografer->alamat }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md" style="text-align-last: center;">
                                    @if ($fotografer->foto_profile)
                                        <img class="profile-user-img img-fluid img-circle"
                                            style="width: 300px;height: 300px; object-fit: cover;"
                                            src="{{ Storage::url($fotografer->foto_profile) }}"
                                            alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            style="width: 300px;height: 300px; object-fit: cover;"
                                            src="{{ asset('user-default.jpg') }}" alt="User profile picture">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if (!$produk->isEmpty())
                        <h3>Paket Produk</h3>

                        <div class="row" style="display: flex;">
                            @foreach ($produk as $item)
                                <div class="col">
                                    <div class="small-box bg-success" style="padding: 10px;">
                                        <div class="inner" style="display: flex; gap: 20px;">
                                            <div class="content text-left">
                                                <h3>Rp. {{ number_format($item->harga, 0, ',', '.') }}</h3>

                                                <p class="p-0 m-0">Info:
                                                    <br>
                                                    {{ $item->info }}
                                                </p>
                                            </div>
                                            <div class="foto text-right justify-content-end">
                                                <a href="{{ Storage::url($item->gambar_1) }}" data-toggle="lightbox"
                                                    data-title="{{ $item->nama_produk }}">
                                                    <img src="{{ Storage::url($item->gambar_1) }}" class="img mb-2"
                                                        style="object-fit: cover; width: 200px;" alt="white sample">
                                                </a>
                                                <a href="{{ Storage::url($item->gambar_2) }}" data-toggle="lightbox"
                                                    data-title="{{ $item->nama_produk }}">
                                                    <img src="{{ Storage::url($item->gambar_2) }}" class="img mb-2"
                                                        style="object-fit: cover; width: 200px;" alt="white sample">
                                                </a>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.booking.create', ['produk' => $item->id]) }}"
                                            class="small-box-footer">Booking Sekarang <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Tidak ada produk yang tersedia.</p>
                    @endif

                </div>
            </div>
            <div class="card" style="background-color: #a100ac41;">
                <div class="card-header">
                    <h4 class="card-title"><b>Galeri Foto</b></h4>
                </div>
                <div class="card-body" style="text-align: -webkit-center;">
                    <div class="filter-container p-0 row"
                        style="padding: 3px; position: relative; width: 100%; display: flex; flex-wrap: wrap; height: 337px;">
                        @foreach ($galeri as $item)
                            <div class="filtr-item col-auto text-center" data-category="1"
                                data-sort="{{ $item->judul }}"
                                style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 270.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                <a href="{{ Storage::url($item->name) }}" data-toggle="lightbox"
                                    data-title="{{ $item->judul }}" data-footer="{{ $item->deskripsi }}">
                                    <img src="{{ Storage::url($item->name) }}" class="img-fluid mb-2"
                                        alt="white sample" style="width: 200px; height: 200px; object-fit: cover">
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- footer section start -->
        <div class="footer_section">
            <div class="container">
                <div class="footer_logo"><img src="{{ asset('icon.png') }}"></div>
                <p class="long_text">It is a long established fact that a reader will be It is a long established fact
                    that a reader will be </p>
                <div class="footer_section_2">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="icon_main">
                                <ul>
                                    <li><a href="#"><img src="{{ asset('frontend/images/map-icon.png') }}"></a>
                                    </li>
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/images/email-icon.png') }}"></a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/images/contact-icon.png') }}"></a></li>
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
                                    <li><a href="#"><img src="{{ asset('frontend/images/fb-icon.png') }}"></a>
                                    </li>
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/images/twitter-icon.png') }}"></a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/images/instagram-icon.png') }}"></a></li>
                                </ul>
                            </div>
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
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

    <script src="{{ asset('template/admin/dist/js/adminlte.js') }}"></script>
    <script src="https://adminlte.io/themes/v3/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/filterizr/jquery.filterizr.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });


        $('#myCarousel').carousel({
            interval: false
        });

        //scroll slides on swipe for touch enabled devices

        $("#myCarousel").on("touchstart", function(event) {

            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function(event) {

                var yMove = event.originalEvent.touches[0].pageY;
                if (Math.floor(yClick - yMove) > 1) {
                    $(".carousel").carousel('next');
                } else if (Math.floor(yClick - yMove) < -1) {
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function() {
                $(this).off("touchmove");
            });
        });

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



</body>

</html>
