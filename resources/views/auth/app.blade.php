<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login | UET-News</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->  
        <link rel="icon" type="image/png" href="{{ asset('client-assets/images/icons/favicon.png') }}"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('auth-assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('auth-assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('auth-assets/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->  
        <link rel="stylesheet" type="text/css" href="{{ asset('auth-assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('auth-assets/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('auth-assets/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('auth-assets/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('auth-assets/css/main.css') }}">
    <!--===============================================================================================-->
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div id="section-social-login" class="wrap-login100 p-t-50">
                    <form class="login100-form validate-form flex-sb flex-w">
                        <span class="login100-form-title p-b-51">
                           Login using
                        </span>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn btn-facebook">
                                <i class="fa fa-facebook-f"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div id="section-login" class="wrap-login100 p-t-50">
                    <form class="login100-form validate-form flex-sb flex-w">
                        <span class="login100-form-title p-b-51">
                            - Or-
                        </span>

                        
                        <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
                            <input class="input100" type="text" name="username" placeholder="&#xf2c0;  Username">
                            <span class="focus-input100"></span>
                        </div>
                        
                        
                        <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                            <input class="input100" type="password" name="pass" placeholder="&#xf084;  Password">
                            <span class="focus-input100"></span>
                        </div>
                        
                        <div class="flex-sb-m w-full p-t-3 p-b-24">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                <label class="label-checkbox100" for="ckb1">
                                    Remember me
                                </label>
                            </div>

                            <div>
                                <a id="btn-load-register" href="#" class="txt1">
                                    Don't have an account? Register
                                </a>
                            </div>
                        </div>

                        <div class="container-login100-form-btn m-t-17">
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>

                        <div class="flex-sb-m w-full p-t-3 p-b-24">
                            <div class="contact100-form-checkbox">
                                <a href="{{ url()->previous() }}" class="txt1">
                                    <i class="fa fa-long-arrow-left"></i> Go back
                                </a>
                            </div>

                            <div>
                                <a href="#" class="txt1">
                                    Forgot?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="section-register" class="wrap-login100 p-t-50">
                    <form class="login100-form validate-form flex-sb flex-w">
                        <span class="login100-form-title p-b-51">
                            Register
                        </span>

                        
                        <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
                            <input class="input100" type="text" name="username" placeholder="&#xf2c0;  Username">
                            <span class="focus-input100"></span>
                        </div>
                        
                        
                        <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                            <input class="input100" type="password" name="pass" placeholder="&#xf084;  Password">
                            <span class="focus-input100"></span>
                        </div>
                        
                        <div class="flex-sb-m w-full p-t-3 p-b-24">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                <label class="label-checkbox100" for="ckb1">
                                    Remember me
                                </label>
                            </div>

                            <div>
                                <a id="btn-load-login" href="#" class="txt1">
                                    Have an account? Login
                                </a>
                            </div>
                        </div>

                        <div class="container-login100-form-btn m-t-17">
                            <button class="login100-form-btn">
                                Register
                            </button>
                        </div>

                        <div class="flex-sb-m w-full p-t-3 p-b-24">
                            <div class="contact100-form-checkbox">
                                <a href="{{ url()->previous() }}" class="txt1">
                                    <i class="fa fa-long-arrow-left"></i> Go back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

        <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
        <script src="{{ asset('auth-assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('auth-assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('auth-assets/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('auth-assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('auth-assets/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('auth-assets/vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('auth-assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('auth-assets/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('auth-assets/js/main.js') }}"></script>
        <script type="text/javascript">
            $('#btn-load-register').on('click', function(event) {
                event.preventDefault();
                
                $('#section-login').toggle(300);
                $('#section-register').toggle(300);
            });

            $('#btn-load-login').on('click', function(event) {
                event.preventDefault();
                
                $('#section-register').toggle(300);
                $('#section-login').toggle(300);
            });
        </script>
    </body>
</html>