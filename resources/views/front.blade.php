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
            <div class="row ">
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

                                        <li><a class="nav-item nav-link" href="/home">Kembali Ke Dashboard</a></li>
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
        <div class="container-fluid">
            <section class="slide-wrapper">
                <div class="container-fluid">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="images_1"><img src="{{ asset('frontend/images/banner-bg.png') }}">
                                        </div>
                                        <div class="banner_main">
                                            <div class="banner_left">
                                                <div class="red_bt">
                                                    &nbsp;
                                                    {{-- <a href="#">Selengkapnya</a> --}}
                                                </div>
                                            </div>
                                            <div class="banner_right">
                                                <h1 class="usiing_text">Using Cool camera</h1>
                                                <p class="point_text">point of using Lorem Ipsum is that it has a
                                                    more-or-less
                                                    distribution of letters,</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="images_2"><img src="{{ asset('frontend/images/img-12.jpg') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="images_1"><img
                                                src="{{ asset('frontend/images/banner-bg2.png') }}"></div>
                                        <div class="banner_main">
                                            <div class="red_bt">
                                                &nbsp;
                                                {{-- <a href="#">Selengkapnya</a> --}}
                                            </div>
                                            <div class="banner_right">
                                                {{-- <h1 class="usiing_text">Using Cool camera</h1> --}}
                                                {{-- <p class="point_text">point of using Lorem Ipsum is that it has a more-or-less
                                    distribution of letters,</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="images_2"><img src="{{ asset('frontend/images/img-4.png') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="images_1"><img
                                                src="{{ asset('frontend/images/banner-bg3.png') }}"></div>
                                        <div class="banner_main">
                                            <div class="red_bt">
                                                &nbsp;
                                                {{-- <a href="#">Selengkapnya</a> --}}
                                            </div>
                                            <div class="banner_right">
                                                <h1 class="usiing_text">Get the Moment</h1>
                                                <p class="point_text">point of using Lorem Ipsum is that it has a
                                                    more-or-less
                                                    distribution of letters,</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="images_2"><img src="{{ asset('frontend/images/img-13.jpg') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="images_1"><img
                                                src="{{ asset('frontend/images/banner-bg.png') }}"></div>
                                        <div class="banner_main">
                                            <div class="banner_left">
                                                <div class="red_bt"><a href="#">Selengkapnya</a></div>
                                            </div>
                                            <div class="banner_right">
                                                <h1 class="usiing_text">Using Cool camera</h1>
                                                <p class="point_text">point of using Lorem Ipsum is that it has a
                                                    more-or-less
                                                    distribution of letters,</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="images_2"><img src="{{ asset('frontend/images/img-1.png') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <!-- banner section end -->
    <!-- about section start -->
    <div class="about_section layout_padding" id="about">
        <div class="container">
            <h1 class="about_text">Tentang Kami</h1>
            <p class="lorem_text">Selamat datang di<br>
                eMarketplace Fotografer, <br>
                platform yang menghubungkan <br>
                fotografer profesional dengan <br>
                pelanggan yang mencari karya <br>
                fotografi berkualitas tinggi. Kami <br>
                menyediakan akses mudah ke fotografer <br>
                berbakat dalam berbagai genre, seperti <br>
                pernikahan, potret keluarga, mode, dan<br>
                lainnya. Dengan seleksi ketat dan portofolio <br>
                mengesankan, kami memastikan kepuasan <br>
                pelanggan. Dengan beberapa langkah <br>
                sederhana, temukan fotografer yang sesuai <br>
                dengan kebutuhan Anda. Kami juga memberikan <br>
                alat manajemen bisnis dan pemasaran untuk <br>
                membantu fotografer berkembang. Bergabunglah dengan <br>
                kami sekarang dan ciptakan kenangan yang tak terlupakan melalui fotografi yang indah.</p>
        </div>
    </div>
    <!-- about section end -->
    <!-- profile section start -->
    <div class="profile_section layout_padding" id="profile">
        <div class="container">
            <h1 class="Cameras_text">Fotografer</h1>
            <div class="profile_section_2 row flex-container">
                @foreach ($fotografer as $item)
                    <div class="col-sm-6 col-md-4 col-12" style="margin-bottom: 50px;">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile" style="height: 600px">
                                <div class="text-center">
                                    @if ($item->foto_profile)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ Storage::url($item->foto_profile) }}" alt="User profile picture"
                                            style="object-fit: cover">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('./user-default.jpg') }}" alt="User profile picture">
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
                @endforeach
            </div>
            <div class="send_text" style="margin-top: 50px;"><a
                    href="{{ route('fotografer_depan') }}">Selengkapnya</a></div>
        </div>
    </div>
    <!-- profile section end -->
    <!-- Our cameras section start -->
    <div class="cameras_section layout_padding">
        <div class="container">
            <h1 class="Cameras_text">Aneka Paket & Produk</h1>
            <div class="cameras_section_2">
                <div id="main_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="images_3"><img src="{{ asset('frontend/images/img-21.png') }}"></div>
                                    <div class="taital_main">
                                        <h2 class="best_text">&nbsp;</h2>
                                        <h2 class="dolar_text"><span style="color: #874ce0;">&nbsp;</span></h2>
                                    </div>
                                    <p class="lorem_ipsum_text">Kami juga menawarkan paket yang dapat disesuaikan
                                        dengan kebutuhan Anda. Segera hubungi kami untuk mengabadikan momen sebelum
                                        pernikahan Anda dalam foto prewedding yang menakjubkan.</p>

                                </div>
                                <div class="col-md-6">
                                    <p class="ipsum_text">Nikmati pengalaman prewedding studio indoor yang mengesankan
                                        dengan penawaran kami. Studio kami dilengkapi dengan peralatan modern dan
                                        berbagai latar belakang menarik untuk menciptakan suasana yang nyaman dan intim.
                                        Dengan bantuan fotografer profesional, Anda akan mendapatkan hasil foto
                                        prewedding yang indah dan berkesan.</p>
                                    <div class="images_3"><img src="{{ asset('frontend/images/img-3.png') }}"></div>
                                    <div class="taital_main">
                                        <h2 class="camera_text">Prewedding Studio Indoor</h2>

                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="images_3"><img src="{{ asset('frontend/images/img-22.png') }}"></div>
                                    <div class="taital_main">
                                        <h2 class="best_text">&nbsp;</h2>
                                        <h2 class="dolar_text">&nbsp;</h2>
                                    </div>
                                    <p class="lorem_ipsum_text">Dapatkan layanan fotografi terbaik untuk aqiqah dan
                                        pesta ulang tahun Anda. Tim kami akan hadir untuk menangkap momen berharga dalam
                                        acara tersebut, menciptakan foto-foto yang indah dan penuh emosi. Dengan paket
                                        yang dapat disesuaikan, Anda dapat memilih durasi pemotretan dan gaya fotografi
                                        yang sesuai dengan keinginan Anda. Jangan lewatkan kesempatan ini untuk
                                        mengabadikan momen berharga Anda dalam foto-foto yang berkesan. Segera hubungi
                                        kami dan dapatkan penawaran khusus untuk memastikan kenangan tak terlupakan
                                        dalam aqiqah dan pesta ulang tahun Anda.</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="ipsum_text">Nikmati momen berharga dalam perayaan aqiqah dan pesta ulang
                                        tahun dengan penawaran kami. Tim fotografer profesional kami akan mengabadikan
                                        setiap detail dari persiapan hingga acara utama, menghasilkan foto-foto indah
                                        yang akan menjadi kenangan abadi. Kami menawarkan paket yang dapat disesuaikan
                                        sesuai dengan kebutuhan Anda, memastikan pengalaman fotografi yang tak
                                        terlupakan. Hubungi kami sekarang untuk penawaran khusus dan jadikan momen
                                        aqiqah dan pesta ulang tahun Anda lebih berarti melalui foto-foto yang istimewa.
                                    </p>
                                    <div class="images_3"><img src="{{ asset('frontend/images/img-23.png') }}"></div>
                                    <div class="taital_main">
                                        <h2 class="camera_text">Aqiqah dan Birthday Party</h2>

                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="images_3"><img src="{{ asset('frontend/images/img-24.png') }}"></div>
                                    <div class="taital_main">
                                        <h2 class="best_text">&nbsp;</h2>
                                        <h2 class="dolar_text">&nbsp;</h2>
                                    </div>
                                    <p class="lorem_ipsum_text">Kami juga menawarkan paket yang dapat disesuaikan
                                        dengan kebutuhan dan preferensi Anda. Dari pemilihan lokasi, gaya fotografi,
                                        hingga pengeditan foto profesional, kami akan bekerja sama dengan Anda untuk
                                        memastikan bahwa setiap momen penting terabadikan dengan sempurna. </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="ipsum_text">Kami dengan senang hati mempersembahkan penawaran foto
                                        pertunangan yang akan mengabadikan momen indah dalam perjalanan menuju
                                        pernikahan Anda. Kami menawarkan jasa fotografi profesional untuk membuat
                                        kenangan yang tak terlupakan dari momen bersejarah ini.
                                    </p>
                                    <p>Dalam penawaran ini, tim fotografer kami akan hadir dalam acara pertunangan Anda,
                                        menangkap momen-momen istimewa, tawa, dan kebahagiaan. Kami akan menciptakan
                                        foto-foto yang indah dan autentik yang akan menjadi kenangan berharga sepanjang
                                        hidup.</p>
                                    <div class="images_3">
                                        <img src="{{ asset('frontend/images/img-25.png') }}">
                                    </div>
                                    <div class="taital_main">
                                        <h2 class="camera_text">Engagement</h2>

                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i></a>
                    </a>
                    <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Our cameras section end -->
    <!-- contact section start -->
    <div class="contact_section layout_padding" id="register">
        <div class="container">
            <form method="POST" id="form-daftar" action="{{ route('daftar') }}" accept-charset="UTF-8"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <h1 class="get_text">Register Pengguna</h1>
                <div class="mail_section">
                    <div class="row">
                        @if ($errors)
                            <span class="text-danger">
                                @foreach ($errors as $item)
                                    {{ $item }}
                                @endforeach
                            </span>
                        @endif
                        <div class="col-md-6">
                            <input type="text" class="input_text" placeholder="Nama ..." name="name" required>
                            <input type="email" class="input_text" placeholder="Email ..." name="email"
                                required>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="input_text" placeholder="No Telephone..." name="no_telp"
                                required>
                            <input type="password" class="input_text" placeholder="Password" name="password"
                                required>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check"
                                style="color: white; margin-bottom: 20px; font-size: 16px!important;">
                                <h2 style="margin-left: -20px; margin-bottom: -35px; color: white;">
                                    Daftar Sebagai :
                                </h2>
                                <br>
                                <span style="display: flex;">
                                    <input class="form-check-input" type="radio" name="role_id" id="role_id1"
                                        value="3" checked>
                                    <label class="form-check-label" for="role_id1">
                                        Pengguna Aplikasi / Pelanggan
                                    </label>
                                </span>

                                <span>
                                    <input class="form-check-input" type="radio" name="role_id" id="role_id2"
                                        value="2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Fotografer Profesional
                                    </label>
                                </span>

                            </div>
                        </div>
                    </div>
                    <textarea id="alamat" name="alamat" class="massage_box" placeholder="Alamat..."></textarea>
                    <div class="send_bt">
                        <div class="send_text">
                            <a href="#" onclick="submitForm()">
                                DAFTAR
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid padding_0">
        <div class="map_main">
            <div class="map-responsive">
                {{-- <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="508" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe> --}}
                <div class="mapouter">
                    <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=jambi&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                            href="https://capcuttemplate.org/">Capcut Templates</a></div>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            width: 100%;
                            height: 400px;
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            width: 100%;
                            height: 400px;
                        }

                        .gmap_iframe {
                            width: 100% !important;
                            height: 400px !important;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
    <!-- contact section end -->
    <!-- footer section start -->
    <div class="footer_section">
        <div class="container">
            <div class="footer_logo"><img src="{{ asset('frontend/images/icon.png') }}"></div>
            <p class="long_text">Bergabunglah dengan kami sekarang dan ciptakan kenangan yang tak terlupakan melalui
                fotografi yang indah </p>
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
        function submitForm() {
            $('#form-daftar').submit();
        }

        document.getElementById('whatsapp-button').addEventListener('click', function() {
            var phoneNumber = $(this).attr("data-hp"); // Ganti dengan nomor telepon yang ingin Anda tuju
            var message = 'Halo, saya ingin menghubungi Anda.'; // Ganti dengan pesan yang ingin Anda kirim
            // Membuat URL Scheme WhatsApp dengan nomor telepon dan pesan
            var url = 'https://api.whatsapp.com/send?phone=' + encodeURIComponent(phoneNumber) + '&text=' +
                encodeURIComponent(message);
            // Buka URL Scheme WhatsApp di tab atau jendela baru
            window.open(url, '_blank');
        })
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
    </script>



</body>

</html>
