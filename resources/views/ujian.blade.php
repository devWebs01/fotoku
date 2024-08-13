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
                                    <li><a class="nav-item nav-link" href="{{ url('/ujian') }}">Ujian</a></li>
                                    <li>|</li>
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
    <div class="text-center">
        <h1 id="ujian" class="display-1 text-center font-weight-bold">SAYA LAGI UJIAN</h1>
    </div>

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
