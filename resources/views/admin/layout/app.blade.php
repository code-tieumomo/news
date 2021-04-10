<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta content="Admitro - Admin Panel HTML template" name="description">
        <meta content="Spruko Technologies Private Limited" name="author">
        <meta name="keywords" content="admin panel ui, user dashboard template, web application templates, premium admin templates, html css admin templates, premium admin templates, best admin template bootstrap 4, dark admin template, bootstrap 4 template admin, responsive admin template, bootstrap panel template, bootstrap simple dashboard, html web app template, bootstrap report template, modern admin template, nice admin template"/>

        <!-- Title -->
        <title>UET-News</title>

        <!--Favicon -->
        <link rel="icon" href="{{ asset('admin-assets/images/brand/favicon.png') }}" type="image/png"/>

        <!--Bootstrap css -->
        <link href="{{ asset('admin-assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Style css -->
        <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin-assets/css/dark.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin-assets/css/skin-modes.css') }}" rel="stylesheet" />

        <!-- Animate css -->
        <link href="{{ asset('admin-assets/css/animated.css') }}" rel="stylesheet" />

        <!--Sidemenu css -->
        <link href="{{ asset('admin-assets/css/sidemenu.css') }}" rel="stylesheet">

        <!---Icons css-->
        <link href="{{ asset('admin-assets/css/icons.css') }}" rel="stylesheet" />

        <!-- Simplebar css -->
        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/simplebar/css/simplebar.css') }}">

        <!-- Color Skin css -->
        <link id="theme" href="{{ asset('admin-assets/colors/color1.css') }}" rel="stylesheet" type="text/css"/>

        @yield('custom-css')
    </head>

    <body class="app sidebar-mini">
        <!---Global-loader-->
        <div id="global-loader" >
            <img src="{{ asset('admin-assets/images/svgs/loader.svg') }}" alt="loader">
        </div>
        <!--- End Global-loader-->

        <!-- Page -->
        <div class="page">
            <div class="page-main">
                <!--aside open-->
                <aside class="app-sidebar">
                    <div class="app-sidebar__logo">
                        <a class="header-brand" href="{{ route('admin.home') }}">
                            <img src="{{ asset('admin-assets/images/brand/logo.png') }}" class="header-brand-img desktop-lgo" alt="Admitro logo">
                            {{-- <img src="{{ asset('admin-assets/images/brand/logo-mobile.png') }}" class="header-brand-img mobile-lgo" alt="Admitro logo"> --}}
                        </a>
                    </div>
                    <div class="app-sidebar__user">
                        <div class="dropdown user-pro-body text-center">
                            <div class="user-pic">
                                <img src="{{ asset('admin-assets/images/users/' . Auth::id() . '.jpg') }}" alt="user-img" class="avatar-xl rounded-circle mb-1">
                            </div>
                            <div class="user-info">
                                <h5 class=" mb-1">{{ Auth::user()->name }} <i class="ion-checkmark-circled  text-success fs-12"></i></h5>
                                <span class="text-muted app-sidebar__user-name text-sm">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- #5C678F --}}
                    <ul class="side-menu app-sidebar3">
                        <li class="side-item side-item-category mt-4">Analyst</li>
                        <li class="slide">
                            <a id="menu-dashboard" class="side-menu__item" href="{{ route('admin.home') }}">
                                <img class="side-menu__icon" src="{{ asset('admin-assets/images/icons/dashboard.png') }}" width="24px"/>
                                <span class="side-menu__label">Dashboard</span><span class="badge badge-danger side-badge">New</span>
                            </a>
                        </li>

                        <li class="side-item side-item-category">CRUD</li>
                        <li id="list-menu-user" class="slide">
                            <a id="menu-user" class="side-menu__item" data-toggle="slide" href="#">
                                <img class="side-menu__icon" src="{{ asset('admin-assets/images/icons/users.png') }}" width="24px"/>
                                <span class="side-menu__label">Users</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu ">
                                <li><a id="sub-menu-user" href="{{ route('users.index') }}" class="slide-item">Users</a></li>
                                <li><a id="sub-menu-writer" href="{{ route('writers.index') }}" class="slide-item">Writers</a></li>
                            </ul>

                            <a id="menu-post" class="side-menu__item" href="{{ route('posts.index') }}">
                                <img class="side-menu__icon" src="{{ asset('admin-assets/images/icons/posts.png') }}" width="24px"/>
                                <span class="side-menu__label">Posts</span>
                            </a>
                        </li>
                    </ul>
                </aside>
                <!--aside closed-->

                <!-- App-Content -->
                <div class="app-content main-content">
                    <div class="side-app">
                        <!--app header-->
                        <div class="app-header header">
                            <div class="container-fluid">
                                <div class="d-flex">
                                    <a class="header-brand" href="{{ route('admin.home') }}">
                                        <img src="{{ asset('admin-assets/images/brand/logo.png') }}" class="header-brand-img desktop-lgo" alt="Admitro logo">
                                        <img src="{{ asset('admin-assets/images/brand/logo-mobile.png') }}" class="header-brand-img mobile-lgo" alt="Admitro logo">
                                    </a>
                                    <div class="app-sidebar__toggle" data-toggle="sidebar">
                                        <a class="open-toggle" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left header-icon mt-1"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
                                        </a>
                                    </div>
                                    <div class="d-flex order-lg-2 ml-auto">
                                        <div class="dropdown header-fullscreen" >
                                            <a  class="nav-link icon full-screen-link p-0"  id="fullscreen-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M10 4L8 4 8 8 4 8 4 10 10 10zM8 20L10 20 10 14 4 14 4 16 8 16zM20 14L14 14 14 20 16 20 16 16 20 16zM20 8L16 8 16 4 14 4 14 10 20 10z"/></svg>
                                            </a>
                                        </div>
                                        <div class="dropdown profile-dropdown">
                                            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                                <span>
                                                    <img src="{{ asset('admin-assets/images/users/'. Auth::id() .'.jpg') }}" alt="img" class="avatar avatar-md brround">
                                                </span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                                                <div class="text-center">
                                                    <a href="#" class="dropdown-item text-center user pb-0 font-weight-bold">{{ Auth::user()->name }}</a>
                                                    <span class="text-center user-semi-title">{{ Auth::user()->email }}</span>
                                                    <div class="dropdown-divider"></div>
                                                </div>
                                                <a class="dropdown-item d-flex" href="#">
                                                    <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"/></svg>
                                                    <div class="">Profile</div>
                                                </a>
                                                <a class="dropdown-item d-flex" href="{{ route('auth.logout') }}">
                                                    <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"/></g><g><path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z"/></g></svg>
                                                    <div class="">Logout</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/app header-->

                        @yield('content')

                    </div>
                </div>
                <!-- End app-content-->
            </div>

            <!--Footer-->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 text-center">
                            Copyright © 2020 <a href="#">Admitro</a>. Designed by <a href="#">Spruko Technologies Pvt.Ltd</a> and re-design by "nhóm dự án". All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer-->

        </div>
        <!-- End Page -->

        <!-- Back to top -->
        <a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>

        <!-- Jquery js-->
        <script src="{{ asset('admin-assets/js/jquery-3.5.1.min.js') }}"></script>

        <!-- Bootstrap4 js-->
        <script src="{{ asset('admin-assets/plugins/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

        <!--Othercharts js-->
        <script src="{{ asset('admin-assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

        <!-- Circle-progress js-->
        <script src="{{ asset('admin-assets/js/circle-progress.min.js') }}"></script>

        <!-- Jquery-rating js-->
        <script src="{{ asset('admin-assets/plugins/rating/jquery.rating-stars.js') }}"></script>

        <!--Sidemenu js-->
        <script src="{{ asset('admin-assets/plugins/sidemenu/sidemenu.js') }}"></script>

        {{-- SweetAlert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <style type="text/css">
            .swal2-container {
                z-index: 10000;
            }
        </style>

        {{-- Firebase --}}
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

        @yield('custom-js')

        <!-- Custom js-->
        <script src="{{ asset('admin-assets/js/custom.js') }}"></script>
    </body>
</html>