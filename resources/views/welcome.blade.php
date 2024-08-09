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
    <title>E-Market Freelance Photografer </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
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
                <div class="col-sm-12 col-lg-3">
                    <div class="logo"><a href="{{ url('/') }}">E-Market Freelance Photografer </a></div>
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
                                    <li><a class="nav-item nav-link" href="index.html">Home</a></li>
                                    <li>|</li>
                                    <li><a class="nav-item nav-link" href="about.html">Tentang Kami</a></li>
                                    <li>|</li>
                                    <li><a class="nav-item nav-link" href="cameras.html">Fotografer</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-sm-5 col-lg-4">
                    <div class="search_main">
                        @auth
                            <div class="right_main">
                                <div class="login_text"><a href="/admin/dashboard">Beranda</a></div>
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
                                                <div class="red_bt"><a href="#">Read More</a></div>
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
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="images_1"><img src="{{ asset('frontend/images/banner1.jpg') }}">
                                        </div>
                                        <div class="banner_main">
                                            <div class="banner_left">
                                                <div class="red_bt"><a href="#">Read More</a></div>
                                            </div>
                                            <div class="banner_right">
                                                {{-- <h1 class="usiing_text">Using Cool camera</h1> --}}
                                                {{-- <p class="point_text">point of using Lorem Ipsum is that it has a more-or-less
                                    distribution of letters,</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="images_2"><img src="{{ asset('frontend/images/img-2.jpg') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="images_1"><img src="{{ asset('frontend/images/banner-2.jpg') }}">
                                        </div>
                                        <div class="banner_main">
                                            <div class="banner_left">
                                                <div class="red_bt"><a href="#">Read More</a></div>
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
                                        <div class="images_2"><img src="{{ asset('frontend/images/img-2.jpg') }}">
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
                                                <div class="red_bt"><a href="#">Read More</a></div>
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
    <div class="about_section layout_padding">
        <div class="container">
            <h1 class="about_text">About Us</h1>
            <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                more-or-less normal distribution of letters, </p>
            <div class="about_bt"><a href="#">Read More</a></div>
        </div>
    </div>
    <!-- about section end -->
    <!-- Our cameras section start -->
    <div class="cameras_section layout_padding">
        <div class="container">
            <h1 class="Cameras_text">Our Cameras</h1>
            <div class="cameras_section_2">
                <div id="main_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="images_3"><img src="{{ asset('frontend/images/img-2.png') }}"></div>
                                    <div class="taital_main">
                                        <h2 class="best_text">Best Camera</h2>
                                        <h2 class="dolar_text">$<span style="color: #874ce0;">400</span></h2>
                                    </div>
                                    <p class="lorem_ipsum_text">It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout. The
                                        point of using Lorem Ipsum is that it has a more-or-less normal distribution of
                                        letters, </p>
                                    <div class="bt_text"><a href="#">Read More</a></div>
                                </div>
                                <div class="col-md-6">
                                    <p class="ipsum_text">It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout. The
                                        point of using Lorem Ipsum is that it has a more-or-less normal distribution of
                                        letters, </p>
                                    <div class="images_3"><img src="{{ asset('frontend/images/img-3.png') }}"></div>
                                    <div class="taital_main">
                                        <h2 class="camera_text">Best Camera</h2>
                                        <h2 class="dolar_text_2">$<span style="color: #874ce0;">400</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="images_3"><img src="{{ asset('frontend/images/img-2.png') }}"></div>
                                    <div class="taital_main">
                                        <h2 class="best_text">Best Camera</h2>
                                        <h2 class="dolar_text">$<span style="color: #874ce0;">400</span></h2>
                                    </div>
                                    <p class="lorem_ipsum_text">It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout. The
                                        point of using Lorem Ipsum is that it has a more-or-less normal distribution of
                                        letters, </p>
                                    <div class="bt_text"><a href="#">Read More</a></div>
                                </div>
                                <div class="col-md-6">
                                    <p class="ipsum_text">It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout. The
                                        point of using Lorem Ipsum is that it has a more-or-less normal distribution of
                                        letters, </p>
                                    <div class="images_3"><img src="{{ asset('frontend/images/img-3.png') }}"></div>
                                    <div class="taital_main">
                                        <h2 class="camera_text">Best Camera</h2>
                                        <h2 class="dolar_text_2">$<span style="color: #874ce0;">400</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="images_3"><img src="{{ asset('frontend/images/img-2.png') }}"></div>
                                    <div class="taital_main">
                                        <h2 class="best_text">Best Camera</h2>
                                        <h2 class="dolar_text">$<span style="color: #874ce0;">400</span></h2>
                                    </div>
                                    <p class="lorem_ipsum_text">It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout. The
                                        point of using Lorem Ipsum is that it has a more-or-less normal distribution of
                                        letters, </p>
                                    <div class="bt_text"><a href="#">Read More</a></div>
                                </div>
                                <div class="col-md-6">
                                    <p class="ipsum_text">It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout. The
                                        point of using Lorem Ipsum is that it has a more-or-less normal distribution of
                                        letters, </p>
                                    <div class="images_3"><img src="{{ asset('frontend/images/img-3.png') }}"></div>
                                    <div class="taital_main">
                                        <h2 class="camera_text">Best Camera</h2>
                                        <h2 class="dolar_text_2">$<span style="color: #874ce0;">400</span></h2>
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
            <h1 class="text-white">Register Pengguna</h1>
            <div class="mail_section">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="input_text" placeholder="Name" name="Name">
                        <input type="text" class="input_text" placeholder="Email" name="Email">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="input_text" placeholder="Phone Number" name="Phone Number">

                        <input type="password" class="input_text" placeholder="Password" name="Password">
                    </div>
                </div>
                <textarea name="comment" class="massage_box" form="usrform">Alamat...</textarea>
                <div class="send_bt">
                    <div class="send_text"><a href="#">SEND</a></div>
                </div>
            </div>
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
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">Copyright 2023 All Right Reserved By.<a href="https://html.design"> Free html
                    Templates</a> Distributed by: <a href="https://themewagon.com">ThemeWagon</a></p>
        </div>
    </div>
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
