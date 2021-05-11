<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Authentication | UET-News</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <button id="login-using-facebook-btn" class="login100-form-btn btn-facebook">
                                <i class="fa fa-facebook-f"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div id="section-login" class="wrap-login100 p-t-50">
                    <form id="login-form" class="login100-form validate-form flex-sb flex-w">
                        <span class="login100-form-title p-b-51">
                            - Or-
                        </span>
                        
                        <div class="wrap-input100 validate-input m-b-16">
                            <input class="input100 input-login" type="email" name="login_email" placeholder="&#xf2c0;  Email"  data-required = "Email is required" data-type="Wrong email type">
                            <span class="focus-input100"></span>
                        </div>
                        
                        <div class="wrap-input100 validate-input m-b-16">
                            <input class="input100 input-login" type="password" name="login_password" placeholder="&#xf084;  Password" data-required = "Password is required" data-type="Password at least 8 character">
                            <span class="focus-input100"></span>
                        </div>
                        
                        <div class="flex-sb-m w-full p-t-3 p-b-24">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="login_remember">
                                <label class="label-checkbox100" for="ckb1">
                                    Remember me
                                </label>
                            </div>

                            <div>
                                <a id="load-reg-section-btn" href="#" class="txt1">
                                    Don't have an account? Register
                                </a>
                            </div>
                        </div>

                        <div class="container-login100-form-btn m-t-17">
                            <button id="login-btn" type="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div>

                        <div class="flex-sb-m w-full p-t-3 p-b-24">
                            <div class="contact100-form-checkbox">
                                <a href="{{ session('redirectBack') ?? route('home.index') }}" class="txt1">
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
                    <form id="register-form" method="POST" action="{{ route('auth.register') }}" class="login100-form validate-form flex-sb flex-w">
                        @csrf
                        <span class="login100-form-title p-b-51">
                            - Or Register -
                        </span>
                        
                        <div class="wrap-input100 validate-input m-b-16">
                            <input class="input100 input-register" type="email" name="reg_email" value="{{ old('email') }}" placeholder="&#xf2c0;  Email"  data-required = "Email is required" data-type="Wrong email type">
                            <span class="focus-input100"></span>
                        </div>
                        
                        <div class="wrap-input100 validate-input m-b-16">
                            <input class="input100 input-register" type="password" name="reg_password" value="{{ old('password') }}" placeholder="&#xf084;  Password" data-required = "Password is required" data-type="Password at least 8 character">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-16">
                            <input class="input100 input-register" type="password" name="reg_password_confirmation" value="{{ old('password_confirmation') }}" placeholder="&#xf084;  Password Confirmation" data-required = "Password confirmation is required" data-type="Password confirmation at least 8 character" data-confirmed="Password confirmation don't match">
                            <span class="focus-input100"></span>
                        </div>
                        
                        <div class="flex-sb-m w-full p-t-3 p-b-24">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb2" type="checkbox" name="reg_remember">
                                <label class="label-checkbox100" for="ckb2" data-toggle="tooltip" data-placement="bottom" title="Auto login and remember your account after register success">
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
                            <button id="register-btn" class="login100-form-btn">
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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('auth-assets/js/main.js') }}"></script>
    <!--===============================================================================================-->
        <script type="text/javascript">
            {{-- Handle validate errors --}}
            @if ($errors->count() != 0)
                @if ($errors->default->first() == 'access_denied')
                    Swal.fire({
                        title: 'Error!',
                        text: 'We can\'t access to your Facebook\'s information!', 
                        icon: 'error',
                        confirmButtonText: 'Try again!'
                    });
                @endif
            @endif
        </script>
    </body>
</html>
