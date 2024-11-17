<!DOCTYPE html>
<html lang="en">
<head>
    <title>Warehouse &mdash; Free Website Template by Free-Template.co</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />

    <link rel="shortcut icon" href="ftco-32x32.png">


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="user_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="user_assets/css/jquery-ui.css">
    <link rel="stylesheet" href="user_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="user_assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="user_assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="user_assets/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="user_assets/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="user_assets/css/aos.css">

    <link rel="stylesheet" href="user_assets/css/style.css">

{{--    @vite([--}}
{{--    'resources/css/bootstrap.min.css',--}}
{{--    'resources/css/jquery-ui.css',--}}
{{--    'resources/css/owl.carousel.min.css',--}}
{{--    'resources/css/owl.theme.default.min.css',--}}
{{--    'resources/css/jquery.fancybox.min.css',--}}
{{--    'resources/css/bootstrap-datepicker.css',--}}
{{--    'resources/fonts/flaticon/font/flaticon.css',--}}
{{--    'resources/css/aos.css',--}}
{{--    'resources/css/style.css',--}}


{{--    'resources/js/jquery-3.3.1.min.js',--}}
{{--    'resources/js/jquery-ui.js',--}}
{{--    'resources/js/popper.min.js',--}}
{{--    'resources/js/bootstrap.min.js',--}}
{{--    'resources/js/owl.carousel.min.js',--}}
{{--    'resources/js/jquery.countdown.min.js',--}}
{{--    'resources/js/bootstrap-datepicker.min.js',--}}
{{--    'resources/js/jquery.easing.1.3.js',--}}
{{--    'resources/js/aos.js',--}}
{{--    'resources/js/jquery.fancybox.min.js',--}}
{{--    'resources/js/jquery.sticky.js',--}}
{{--    'resources/js/main.js',--}}
{{--    ])--}}

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-xl-2">
                    <h1 class="mb-0 site-logo m-0 p-0"><a href="index.html" class="mb-0">MysticInn</a></h1>
                </div>

                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="{{route('home')}}" class="nav-link">Trang Chủ</a></li>
                            <li><a href="{{ route('room') }}" class="nav-link">Phòng</a></li>
                            @if(!Auth::check() or (Auth::check() and Auth::user()->userType==2))
                                <li><a href="{{ route('myroom') }}" class="nav-link">Phòng Của Tôi</a></li>
                            @else
                                <li><a href="{{route('dashboard')}}" class="nav-link">Dashboard</a></li>

                            @endif
                            @if(Auth::check())
                                <li style="margin: 0 60px;">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle">{{Auth::user()->username}}</i>

                                    </a>
                                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Thông tin của tôi</a></li>
                                        <li><a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                                    </ul>
                                </li>

                            @else
                                <li><a href="{{ route('login') }}" class="nav-link">Đăng nhập</a></li>

                            @endif


                        </ul>


                    </nav>

                </div>


                <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>

            </div>
        </div>

    </header>


    <div class="site-block-wrap">
        <div class="owl-carousel with-dots">
{{--            <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/hero_1.jpg);" data-aos="fade" id="home-section">--}}


{{--                <div class="container">--}}
{{--                    <div class="row align-items-center justify-content-center">--}}
{{--                        <div class="col-md-6 mt-lg-5 text-center">--}}
{{--                            <h1 class="text-shadow">Buy &amp; Sell Property Here</h1>--}}
{{--                            <p class="mb-5 text-shadow">Free website template for Real Estate websites by the fine folks at <a href="https://free-template.co/" target="_blank">Free-Template.co</a>  </p>--}}
{{--                            <p><a href="https://free-template.co" target="_blank" class="btn btn-primary px-5 py-3">Get Started</a></p>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}

{{--            <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/hero_2.jpg);" data-aos="fade" id="home-section">--}}


{{--                <div class="container">--}}
{{--                    <div class="row align-items-center justify-content-center">--}}
{{--                        <div class="col-md-6 mt-lg-5 text-center">--}}
{{--                            <h1 class="text-shadow">Find Your Perfect Property For Your Home</h1>--}}
{{--                            <p class="mb-5 text-shadow">Free website template for Real Estate websites by the fine folks at <a href="https://free-template.co/" target="_blank">Free-Template.co</a>  </p>--}}
{{--                            <p><a href="https://free-template.co" target="_blank" class="btn btn-primary px-5 py-3">Get Started</a></p>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
        </div>

    </div>

    @yield('content')


    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-5">
                            <h2 class="footer-heading mb-4">About Us</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
                        </div>
                        <div class="col-md-3 mx-auto">
                            <h2 class="footer-heading mb-4">Quick Links</h2>
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-4">
                        <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
                        <form action="#" method="post" class="footer-subscribe">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary text-black" type="button" id="button-addon2">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="">
                        <h2 class="footer-heading mb-4">Follow Us</h2>
                        <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>


                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                        <!-- Link back to Free-Template.co can't be removed. Template is licensed under CC BY 3.0. -->
                        <p class="copyright"><small>&copy; <script>document.write(new Date().getFullYear());</script> Warehouse. All Rights Reserved.  Design by <a href="https://free-template.co" target="_blank">Free-Template.co</a></small></p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

</div> <!-- .site-wrap -->

<a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a>

<script src="user_assets/js/jquery-3.3.1.min.js"></script>
<script src="user_assets/js/jquery-ui.js"></script>
<script src="user_assets/js/popper.min.js"></script>
<script src="user_assets/js/bootstrap.min.js"></script>
<script src="user_assets/js/bootstrap.bundle.js"></script>
<script src="user_assets/js/owl.carousel.min.js"></script>
<script src="user_assets/js/jquery.countdown.min.js"></script>
<script src="user_assets/js/bootstrap-datepicker.min.js"></script>
<script src="user_assets/js/jquery.easing.1.3.js"></script>
<script src="user_assets/js/aos.js"></script>
<script src="user_assets/js/jquery.fancybox.min.js"></script>
<script src="user_assets/js/jquery.sticky.js"></script>


<script src="user_assets/js/main.js"></script>

</body>
</html>

