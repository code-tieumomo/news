<!DOCTYPE html>
<html lang="en">
    <head>
    <title>
        @yield('title', 'UET-News')
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{ asset('client-assets/images/icons/favicon.png') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/vendor/fancybox/jquery.fancybox.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/util.min.css') }}">
    <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/main.css') }}">
    <!--===============================================================================================-->
    </head>
    <body class="animsition">
        @include('header')
            
        @yield('headline')

        @yield('feature-posts')

        @yield('feature-categories')

        {{-- <!-- Banner -->
        <div class="container">
            <div class="flex-c-c">
                <a href="#">
                    <img class="max-w-full" src="images/banner-01.jpg" alt="IMG">
                </a>
            </div>
        </div>

        <!-- Latest -->
        <section class="bg0 p-t-60 p-b-35">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 p-b-20">
                        <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Latest Articles
                            </h3>
                        </div>

                        <div class="row p-t-35">
                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                <!-- Item latest -->    
                                <div class="m-b-45">
                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                        <img src="images/latest-01.jpg" alt="IMG">
                                    </a>

                                    <div class="p-t-16">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                You wish lorem ipsum dolor sit amet consectetur 
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                by John Alvarado
                                            </a>

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                Feb 18
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                <!-- Item latest -->    
                                <div class="m-b-45">
                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                        <img src="images/latest-02.jpg" alt="IMG">
                                    </a>

                                    <div class="p-t-16">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                You wish lorem ipsum dolor sit amet consectetur 
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                by John Alvarado
                                            </a>

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                Feb 16
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                <!-- Item latest -->    
                                <div class="m-b-45">
                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                        <img src="images/latest-03.jpg" alt="IMG">
                                    </a>

                                    <div class="p-t-16">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                You wish lorem ipsum dolor sit amet consectetur 
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                by John Alvarado
                                            </a>

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                Feb 15
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                <!-- Item latest -->    
                                <div class="m-b-45">
                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                        <img src="images/latest-04.jpg" alt="IMG">
                                    </a>

                                    <div class="p-t-16">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                You wish lorem ipsum dolor sit amet consectetur 
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                by John Alvarado
                                            </a>

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                Feb 13
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                <!-- Item latest -->    
                                <div class="m-b-45">
                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                        <img src="images/latest-05.jpg" alt="IMG">
                                    </a>

                                    <div class="p-t-16">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                You wish lorem ipsum dolor sit amet consectetur 
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                by John Alvarado
                                            </a>

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                Feb 10
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                <!-- Item latest -->    
                                <div class="m-b-45">
                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                        <img src="images/latest-06.jpg" alt="IMG">
                                    </a>

                                    <div class="p-t-16">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                You wish lorem ipsum dolor sit amet consectetur 
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                by John Alvarado
                                            </a>

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                Feb 09
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10 col-lg-4">
                        <div class="p-l-10 p-rl-0-sr991 p-b-20">
                            <!-- Video -->
                            <div class="p-b-55">
                                <div class="how2 how2-cl4 flex-s-c m-b-35">
                                    <h3 class="f1-m-2 cl3 tab01-title">
                                        Featured Video
                                    </h3>
                                </div>

                                <div>
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="images/video-01.jpg" alt="IMG">

                                        <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">
                                            <span class="fab fa-youtube"></span>
                                        </button>
                                    </div>

                                    <div class="p-tb-16 p-rl-25 bg3">
                                        <h5 class="p-b-5">
                                            <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">
                                                Music lorem ipsum dolor sit amet consectetur 
                                            </a>
                                        </h5>

                                        <span class="cl15">
                                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                by John Alvarado
                                            </a>

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                Feb 18
                                            </span>
                                        </span>
                                    </div>
                                </div>  
                            </div>
                                
                            <!-- Subscribe -->
                            <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
                                <h5 class="f1-m-5 cl0 p-b-10">
                                    Subscribe
                                </h5>

                                <p class="f1-s-1 cl0 p-b-25">
                                    Get all latest content delivered to your email a few times a month.
                                </p>

                                <form class="size-a-9 pos-relative">
                                    <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Email">

                                    <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </form>
                            </div>
                            
                            <!-- Tag -->
                            <div class="p-b-55">
                                <div class="how2 how2-cl4 flex-s-c m-b-30">
                                    <h3 class="f1-m-2 cl3 tab01-title">
                                        Tags
                                    </h3>
                                </div>

                                <div class="flex-wr-s-s m-rl--5">
                                    <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        Fashion
                                    </a>

                                    <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        Lifestyle
                                    </a>

                                    <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        Denim
                                    </a>

                                    <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        Streetstyle
                                    </a>

                                    <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        Crafts
                                    </a>

                                    <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        Magazine
                                    </a>

                                    <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        News
                                    </a>

                                    <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        Blogs
                                    </a>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="bg2 p-t-40 p-b-25">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 p-b-20">
                            <div class="size-h-3 flex-s-c">
                                <a href="index.html">
                                    <img class="max-s-full" src="images/icons/logo-02.png" alt="LOGO">
                                </a>
                            </div>

                            <div>
                                <p class="f1-s-1 cl11 p-b-16">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor magna eget elit efficitur, at accumsan sem placerat. Nulla tellus libero, mattis nec molestie at, facilisis ut turpis. Vestibulum dolor metus, tincidunt eget odio
                                </p>

                                <p class="f1-s-1 cl11 p-b-16">
                                    Any questions? Call us on (+1) 96 716 6879
                                </p>

                                <div class="p-t-15">
                                    <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>

                                    <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                        <span class="fab fa-twitter"></span>
                                    </a>

                                    <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                        <span class="fab fa-pinterest-p"></span>
                                    </a>

                                    <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                        <span class="fab fa-vimeo-v"></span>
                                    </a>

                                    <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                        <span class="fab fa-youtube"></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4 p-b-20">
                            <div class="size-h-3 flex-s-c">
                                <h5 class="f1-m-7 cl0">
                                    Popular Posts
                                </h5>
                            </div>

                            <ul>
                                <li class="flex-wr-sb-s p-b-20">
                                    <a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
                                        <img src="images/popular-post-01.jpg" alt="IMG">
                                    </a>

                                    <div class="size-w-5">
                                        <h6 class="p-b-5">
                                            <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
                                                Donec metus orci, malesuada et lectus vitae
                                            </a>
                                        </h6>

                                        <span class="f1-s-3 cl6">
                                            Feb 17
                                        </span>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-s p-b-20">
                                    <a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
                                        <img src="images/popular-post-02.jpg" alt="IMG">
                                    </a>

                                    <div class="size-w-5">
                                        <h6 class="p-b-5">
                                            <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
                                                Lorem ipsum dolor sit amet, consectetur
                                            </a>
                                        </h6>

                                        <span class="f1-s-3 cl6">
                                            Feb 16
                                        </span>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-s p-b-20">
                                    <a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
                                        <img src="images/popular-post-03.jpg" alt="IMG">
                                    </a>

                                    <div class="size-w-5">
                                        <h6 class="p-b-5">
                                            <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
                                                Suspendisse dictum enim quis imperdiet auctor
                                            </a>
                                        </h6>

                                        <span class="f1-s-3 cl6">
                                            Feb 15
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="col-sm-6 col-lg-4 p-b-20">
                            <div class="size-h-3 flex-s-c">
                                <h5 class="f1-m-7 cl0">
                                    Category
                                </h5>
                            </div>

                            <ul class="m-t--12">
                                <li class="how-bor1 p-rl-5 p-tb-10">
                                    <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                        Fashion (22)
                                    </a>
                                </li>

                                <li class="how-bor1 p-rl-5 p-tb-10">
                                    <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                        Technology (29)
                                    </a>
                                </li>

                                <li class="how-bor1 p-rl-5 p-tb-10">
                                    <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                        Street Style (15)
                                    </a>
                                </li>

                                <li class="how-bor1 p-rl-5 p-tb-10">
                                    <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                        Life Style (28)
                                    </a>
                                </li>

                                <li class="how-bor1 p-rl-5 p-tb-10">
                                    <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                        DIY & Crafts (16)
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg11">
                <div class="container size-h-4 flex-c-c p-tb-15">
                    <span class="f1-s-1 cl0 txt-center">
                        Copyright © 2018 

                        <a href="#" class="f1-s-1 cl10 hov-link1">Colorlib.</a>

                        All rights reserved.
                    </span>
                </div>
            </div>
        </footer>

        <!-- Back to top -->
        <div class="btn-back-to-top" id="myBtn">
            <span class="symbol-btn-back-to-top">
                <span class="fas fa-angle-up"></span>
            </span>
        </div>

        <!-- Modal Video 01-->
        <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document" data-dismiss="modal">
                <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

                <div class="wrap-video-mo-01">
                    <div class="video-mo-01">
                        <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div> --}}

        <!--===============================================================================================-->  
        <script src="{{ asset('client-assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('client-assets/vendor/animsition/js/animsition.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('client-assets/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('client-assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('client-assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>
        <!--===============================================================================================-->
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
        <!-- TODO: Add SDKs for Firebase products that you want to use -->
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-database.js"></script>
        <script>
        // Your web app's Firebase configuration
            var firebaseConfig = {
                apiKey: "AIzaSyA95mMD-7Y19ZlAkz7nLGLFt3jOaIwrpH4",
                authDomain: "uet-news-2021.firebaseapp.com",
                databaseURL: "https://uet-news-2021-default-rtdb.firebaseio.com",
                projectId: "uet-news-2021",
                storageBucket: "uet-news-2021.appspot.com",
                messagingSenderId: "638010519609",
                appId: "1:638010519609:web:ab6a38b0dc0d85f55edde8"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
        </script>
        <!--===============================================================================================-->
        <script src="{{ asset('client-assets/js/main.js') }}"></script>
        <!-- Get location, time and weather in header-->
        <script type="text/javascript">
            $(document).ready(function() {
                const openWeatherApiKey = "5da9e9e00c3cf8188bddf9f81bcedd84";
                var hour = (new Date()).getHours();
                if (hour > 5 && hour < 18) {
                    $(".current-time").attr("src", "/client-assets/images/icons/icon-day.png");
                } else {
                    $(".current-time").attr("src", "/client-assets/images/icons/icon-night.png");
                }

                $.ajax({
                    url: "https://geolocation-db.com/jsonp",
                    jsonpCallback: "callback",
                    dataType: "jsonp",
                    success: function(response) {
                        $(".current-location").html(((response.city == null) ? response.country_name : response.city)  + ', ' + response.country_code);
                        var lat = response.latitude;
                        var lon = response.longitude;
                        $.ajax({
                            url: "https://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + lon + "&appid=" + openWeatherApiKey,
                            success: function(response) {
                                $(".current-weather").html(response.weather[0].main + ' <img src="client-assets/images/icons/icon-temp.png" alt="Banner"></a> ' + Math.round(parseFloat(response.main.temp)-273.15) + '&deg;C');
                            }
                        });
                    }
                });
            });
        </script>

        @yield('custom-js')
    </body>
</html>