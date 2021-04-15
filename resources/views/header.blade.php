<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="topbar">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
                    <span class="left-topbar-item flex-wr-s-c">
                        <span class="current-location">
                            Location is updating ...
                        </span>

                        <img class="m-b-1 m-rl-8 current-time" src="{{ asset('client-assets/images/icons/icon-day.png') }}" alt="Time icon">

                        <span class="current-weather">
                            Weather is updating ...
                        </span>
                    </span>

                    <a href="#" class="left-topbar-item">
                        About
                    </a>

                    <a href="#" class="left-topbar-item">
                        Contact
                    </a>
                </div>

                @if (!Auth::check())
                    <div class="right-topbar">
                        <a href="#">
                            Register
                        </a>

                        <a href="#" class="left-topbar-item">
                            Login
                        </a>
                    </div>                   
                @else
                    <div class="right-topbar">
                        <a href="#">
                            Features
                        </a>

                        <a href="#" class="left-topbar-item">
                            Logout
                        </a>
                    </div>  
                @endif
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="index.html"><img src="{{ asset('client-assets/images/icons/logo-mobile.png') }}" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li class="left-topbar">
                    <span class="left-topbar-item flex-wr-s-c">
                        <span class="current-location">
                            Location is updating ...
                        </span>

                        <img class="m-b-1 m-rl-8 current-time" src="{{ asset('client-assets/images/icons/icon-day.png') }}" alt="Time icon">

                        <span class="current-weather">
                            Weather is updating ...
                        </span>
                    </span>
                </li>

                <li class="left-topbar">
                    <a href="#" class="left-topbar-item">
                        About
                    </a>

                    <a href="#" class="left-topbar-item">
                        Contact
                    </a>
                </li>

                @if (!Auth::check())
                    <li class="right-topbar">
                        <a href="#">
                            Register
                        </a>

                        <a href="#" class="left-topbar-item">
                            Login
                        </a>
                    </li>                   
                @else
                    <li class="right-topbar">
                        <a href="#">
                            Features
                        </a>

                        <a href="#" class="left-topbar-item">
                            Logout
                        </a>
                    </li>  
                @endif
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="{{ route('home.index') }}">Home</a>
                </li>
                @foreach ($menuCategories as $category)
                    <li>
                        <a href="index.html">{{ $category->name }}</a>
                        @if ($category->subCategories->isNotEmpty())
                            <ul class="sub-menu-m">
                                @foreach ($category->subCategories as $subCategory)
                                    <li><a href="home-02.html">{{ $subCategory->name }}</a></li>
                                @endforeach
                            </ul>

                            <span class="arrow-main-menu-m">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </span>
                        @endif
                    </li>
                @endforeach
                <li>
                    <a href="">Explore All</a>
                </li>
            </ul>
        </div>
        
        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop -->       
            <div class="logo">
                <a href="{{ route('home.index') }}"><img src="{{ asset('client-assets/images/icons/logo.png') }}" alt="Logo"></a>
            </div>  

            <!-- Banner -->
            <div class="banner-header">
                <a href="#"><img src="{{ asset('client-assets/images/banner-01.jpg') }}" alt="Banner"></a>
            </div>
        </div>  
        
        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <ul class="main-menu">
                        <li class="main-menu-active single-item">
                            <a href="{{ route('home.index') }}">Home</a>
                        </li>
                        @foreach ($menuCategories as $category)
                            <li class="mega-menu-item">
                                <a href="index.html">{{ $category->name }}</a>

                                <div class="sub-mega-menu">
                                    <div class="nav flex-column nav-pills" role="tablist">
                                        <a class="nav-link active" data-toggle="pill" href="#{{ $category->name }}-{{ $category->subCategories->first()->name }}" role="tab">All</a>
                                        @foreach ($category->subCategories as $subCategory)
                                            <a class="nav-link" data-toggle="pill" href="#{{ $category->name }}-{{ $subCategory->name }}" role="tab">{{ $subCategory->name }}</a>
                                        @endforeach
                                    </div>

                                    <div class="tab-content">
                                        @foreach ($category->subCategories as $subCategory)
                                            <div class="tab-pane @if ($loop->first) show active @endif" id="{{ $category->name }}-{{ $subCategory->name }}" role="tabpanel">
                                                <div class="row">
                                                    @foreach ($subCategory->posts->take(4) as $post)
                                                        <div class="col-3">
                                                            <!-- Item post -->  
                                                            <div>
                                                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                                    <img src="{{ $post->thumbnail }}" alt="Post Thumbnail">
                                                                </a>

                                                                <div class="p-t-10">
                                                                    <h5 class="p-b-5">
                                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                            {{ $post->title }}
                                                                        </a>
                                                                    </h5>

                                                                    <span class="cl8">
                                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                            {{ $post->subCategory->name }}
                                                                        </a>

                                                                        <span class="f1-s-3 m-rl-3">
                                                                            -
                                                                        </span>

                                                                        <span class="f1-s-3">
                                                                            {{ $post->created_at->toFormattedDateString() }}
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach                                    
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <li class="single-item">
                            <a href="">Explore All</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>  
    </div>
</header>
