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
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/vendor/fancybox/jquery.fancybox.min.css') }}"> --}}
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/util.min.css') }}">
    <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/main.css') }}">
    <!--===============================================================================================-->
    </head>
    <body class="animsition">
        @include('header')
        
        @yield('headline')

        {{-- Home page section --}}
        @yield('feature-posts')

        @yield('feature-categories')

        @yield('banner')

        @yield('lastest-posts')

        {{-- Post detail page section --}}
        @yield('content')

        @include('footer')

        <!-- Back to top -->
        <div class="btn-back-to-top" id="myBtn">
            <span class="symbol-btn-back-to-top">
                <span class="fas fa-angle-up"></span>
            </span>
        </div>

        <!--===============================================================================================-->  
        <script src="{{ asset('client-assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('client-assets/vendor/animsition/js/animsition.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('client-assets/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('client-assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--===============================================================================================-->
        {{-- <script src="{{ asset('client-assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script> --}}
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
                    $(".current-time").attr("src", "{{ asset('client-assets/images/icons/icon-day.png') }}");
                } else {
                    $(".current-time").attr("src", "{{ asset('client-assets/images/icons/icon-night.png') }}");
                }

                // if (navigator.geolocation) {
                //     navigator.geolocation.getCurrentPosition(showPosition);
                // } else { 
                //    console.log("Geolocation is not supported by this browser.");
                // }

                $.ajax({
                    url: "http://geolocation-db.com/jsonp",
                    jsonpCallback: "callback",
                    crossDomain: true,
                    dataType: "jsonp",
                    success: function(response) {
                        $(".current-location").html(((response.city == null) ? response.country_name : response.city)  + ', ' + response.country_code);
                        var lat = response.latitude;
                        var lon = response.longitude;
                        $.ajax({
                            url: "https://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + lon + "&appid=" + openWeatherApiKey,
                            success: function(response) {
                                $(".current-weather").html(response.weather[0].main + ' <img src="{{ asset('client-assets/images/icons/icon-temp.png') }}" alt="Temp"></a> ' + Math.round(parseFloat(response.main.temp)-273.15) + '&deg;C');
                            }
                        });
                    }
                });
            });
        </script>

        @yield('custom-js')
    </body>
</html>