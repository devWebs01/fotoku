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
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

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
    </div>
    <!-- header section end -->
    <!-- banner section stert -->
    <div class="banner_section">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('frontend/images/contoh1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/images/contoh1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/images/contoh1.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- banner section end -->
    <!-- profile section start -->
    <div class="profile_section layout_padding" id="profile">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <select id="jumpMenu" onchange="goToPage()">
                        <option value="#" disabled>Pilih Halaman</option>
                        <option value="{{ '/fotografer/?kec=all' }}">Semua</option>
                        @foreach ($kecamatan as $item)
                            <option value="{{ '/fotografer/?kec=' . $item->id }}"
                                {{ $item->id == $param ? 'selected' : '' }}>{{ $item->nama_kecamatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <select id="jumpMenu2" onchange="goToPage2()">
                        <option value="#" disabled>Pilih Rate Transaksi</option>
                        <option value="{{ '/fotografer' }}">Semua</option>
                        <option value="{{ '/fotografer/?transaksi=0' }}">Belum Pernah</option>
                        <option value="{{ '/fotografer/?transaksi=5' }}">Sering (> 5x Transaksi)</option>
                        <option value="{{ '/fotografer/?transaksi=10' }}">Pengalaman (> 10x Transaksi)</option>
                    </select>
                </div>
            </div>
            <div class="profile_section_2 row flex-container">
                @if ($fotografer->isEmpty())
                    <div class="col-sm-6 col-md-4 col-12" style="margin-bottom: 50px; margin: auto;">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    Tidak Ada Fotografer
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($fotografer as $item)
                        @switch($_GET['transaksi']??null)
                            @case(!null)
                                @if ($item->countData >= $_GET['transaksi'])
                                    <div class="col-sm-6 col-md-4 col-12" style="margin-bottom: 50px;">
                                        <div class="card card-primary card-outline">
                                            <div class="card-body box-profile">
                                                <div class="text-center">
                                                    @if ($item->foto_profile)
                                                        <img class="profile-user-img img-fluid img-circle"
                                                            src="{{ Storage::url($item->foto_profile) }}"
                                                            alt="User profile picture">
                                                    @else
                                                        <img class="profile-user-img img-fluid img-circle"
                                                            src="{{ asset('user-default.jpg') }}" alt="User profile picture">
                                                    @endif
                                                </div>
                                                <p class="text-muted text-center">{{ $item->nama }}</p>
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <p class="text-center">Spesialisasi :
                                                        &nbsp;&nbsp;<strong>{{ $item?->spesialisasi }}</strong>
                                                    </p>
                                                    <li class="list-group-item">
                                                        <b>Transaksi</b> <a class="float-right">{{ $item->transaksi() }} X</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Kecamatan</b> <a
                                                            class="float-right">{{ $item->kecamatan?->nama_kecamatan }}</a>
                                                    </li>
                                                </ul>
                                                <a href="{{ url('fotografer_detail/' . $item->id) }}"
                                                    class="btn btn-primary btn-block "><b>Detail</b></a>
                                                <button class="btn btn-success btn-block whatsapp-button" id="whatsapp-button"
                                                    data-hp="{{ $item->no_telp }}"><b>Whatsapp</b></button>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @if ($loop->index)
                                        <div class="col-sm-6 col-md-4 col-12" style="margin-bottom: 50px; margin: auto;">
                                            <div class="card card-primary card-outline">
                                                <div class="card-body box-profile">
                                                    <div class="text-center">
                                                        Tidak Ada Data
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @break

                            @endif
                        @break

                        @default
                            <div class="col-sm-6 col-md-4 col-12" style="margin-bottom: 50px;">
                                <div class="card card-primary card-outline" style="height: 600px">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            @if ($item->foto_profile)
                                                <img class="profile-user-img img-fluid img-circle"
                                                    style="object-fit: cover;"
                                                    src="{{ Storage::url($item->foto_profile) }}"
                                                    alt="User profile picture">
                                            @else
                                                <img class="profile-user-img img-fluid img-circle"
                                                    style="object-fit: cover;" src="{{ asset('user-default.jpg') }}"
                                                    alt="User profile picture">
                                            @endif
                                        </div>
                                        <p class="text-muted text-center">{{ $item->nama }}</p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <p class="text-center">
                                                Spesialisasi
                                                <br>
                                                <strong>{{ $item?->spesialisasi }}</strong>
                                            </p>
                                            <li class="list-group-item">
                                                <b>Transaksi</b> <a class="float-right">{{ $item->transaksi() }} X</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Kecamatan</b> <a
                                                    class="float-right">{{ $item->kecamatan?->nama_kecamatan }}</a>
                                            </li>
                                        </ul>
                                        <a href="{{ url('fotografer_detail/' . $item->id) }}"
                                            class="btn btn-primary btn-block "><b>Detail</b></a>
                                        <button class="btn btn-success btn-block whatsapp-button" id="whatsapp-button"
                                            data-hp="{{ $item->no_telp }}"><b>Whatsapp</b></button>
                                    </div>
                                </div>
                            </div>
                    @endswitch
                @endforeach
            @endif

        </div>
    </div>
</div>
<!-- profile section end -->
<!-- footer section start -->
<div class="footer_section">
    <div class="container">
        <div class="footer_logo"><img src="{{ asset('icon.png') }}"></div>
        <p class="long_text">Bergabunglah dengan kami sekarang dan ciptakan kenangan yang tak terlupakan melalui
            fotografi yang indah</p>
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
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
    function goToPage() {
        var selectElement = document.getElementById("jumpMenu");
        var selectedValue = selectElement.options[selectElement.selectedIndex].value;

        if (selectedValue) {
            window.location.href = selectedValue;
        }
    }

    function goToPage2() {
        var selectElement = document.getElementById("jumpMenu2");
        var selectedValue = selectElement.options[selectElement.selectedIndex].value;

        if (selectedValue) {
            window.location.href = selectedValue;
        }
    }


    $(document).ready(function() {
        document.getElementById('whatsapp-button').addEventListener('click', function() {
            var phoneNumber = $(this).attr(
                "data-hp"); // Ganti dengan nomor telepon yang ingin Anda tuju
            var message =
                'Halo, saya ingin menghubungi Anda.'; // Ganti dengan pesan yang ingin Anda kirim
            // Membuat URL Scheme WhatsApp dengan nomor telepon dan pesan
            var url = 'https://api.whatsapp.com/send?phone=' + encodeURIComponent(phoneNumber) +
                '&text=' + encodeURIComponent(message);
            // Buka URL Scheme WhatsApp di tab atau jendela baru
            window.open(url, '_blank');
        });

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
</script>



</body>

</html>
