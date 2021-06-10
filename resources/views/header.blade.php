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
                        <a href="{{ route('auth.show') }}" class="left-topbar-item">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                    </div>
                @else
                    @role('user')
                        <div class="right-topbar">
                            <a href="{{ route('user-features.index') }}">
                                <i class="fa fa-user-o"></i> {{ Auth::user()->name }}
                                @if (Auth::user()->fb_id != null)
                                    (Logged in with Facebook)
                                @endif
                            </a>

                            <a href="{{ route('auth.logout') }}" class="left-topbar-item">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </div>
                    @elserole('writer')
                        <div class="right-topbar">
                            <a href="{{ route('user-features.index') }}">
                                <i class="fa fa-pencil"></i> {{ Auth::user()->name }}
                            </a>

                            <a href="{{ route('auth.logout') }}" class="left-topbar-item">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </div>
                    @else
                        <div class="right-topbar">
                            <a href="/admin/dashboard">
                                Admin Features
                            </a>

                            <a href="{{ route('auth.logout') }}" class="left-topbar-item">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </div>
                    @endrole
                @endif
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="{{ route('home.index') }}"><img src="{{ asset('client-assets/images/icons/logo-mobile.png') }}" alt="IMG-LOGO"></a>
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
                        <a href="{{ route('auth.show') }}" class="left-topbar-item">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                    </li>                   
                @else
                    @role('user')
                        <li class="right-topbar">
                            <a href="#">
                                <i class="fa fa-user-o"></i> {{ Auth::user()->name }}
                                @if (Auth::user()->fb_id != null)
                                    (Login with Facebook)
                                @endif
                            </a>

                            <a href="{{ route('auth.logout') }}" class="left-topbar-item">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </li>
                    @elserole('writer')
                        <li class="right-topbar">
                            <a href="#">
                                <i class="fa fa-pencil"></i> {{ Auth::user()->name }}
                            </a>

                            <a href="{{ route('auth.logout') }}" class="left-topbar-item">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </li>
                    @else
                        <li class="right-topbar">
                            <a href="#">
                                Admin Features
                            </a>

                            <a href="{{ route('auth.logout') }}" class="left-topbar-item">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </li>
                    @endrole
                @endif
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="{{ route('home.index') }}">Home</a>
                </li>
                @foreach ($categories->take(7) as $category)
                    <li>
                        <a href="index.html">{{ $category->name }}</a>
                        <ul class="sub-menu-m">
                            @foreach ($category->subCategories as $subCategory)
                                <li><a href="home-02.html">{{ $subCategory->name }}</a></li>
                            @endforeach
                        </ul>

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>
                @endforeach
                <li>
                    <a href="javascript:void(0)">All</a>
                    <ul class="sub-menu-m">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>

                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
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
                        @foreach ($categories->take(7) as $category)
                            <li class="mega-menu-item">
                                <a href="{{ route('categories.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a>

                                <div class="sub-mega-menu">
                                    <div class="nav flex-column nav-pills" role="tablist">
                                        @foreach ($category->subCategories->take(5) as $subCategory)
                                            <a class="nav-link @if ($loop->first) active @endif" data-toggle="pill" href="#{{ $category->name }}-{{ $subCategory->name }}" role="tab">{{ $subCategory->name }}</a>
                                        @endforeach
                                        <a class="nav-link" href="{{ route('categories.show', $category->slug) }}">All</a>
                                    </div>

                                    <div class="tab-content">
                                        @foreach ($category->subCategories->take(5) as $subCategory)
                                            <div class="tab-pane @if ($loop->first) show active @endif" id="{{ $category->name }}-{{ $subCategory->name }}" role="tabpanel">
                                                <div class="row">
                                                    @foreach ($subCategory->posts->take(4) as $post)
                                                        <div class="col-3">
                                                            <!-- Item post -->  
                                                            <div>
                                                                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="wrap-pic-w hov1 trans-03">
                                                                    <img src="{{ $post->thumbnail }}" alt="Post Thumbnail">
                                                                </a>

                                                                <div class="p-t-10">
                                                                    <h5 class="p-b-5">
                                                                        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                            {{ $post->title }}
                                                                        </a>
                                                                    </h5>

                                                                    <span class="cl8">
                                                                        <a href="{{ route('subCategories.show', ['slug' => $category->slug, 'subSlug' => $subCategory->slug]) }}" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                            <i class="fa fa-bookmark"></i> {{ $subCategory->name }}
                                                                        </a>

                                                                        <span class="f1-s-3 m-rl-3">
                                                                            <br>
                                                                        </span>

                                                                        <span class="f1-s-3">
                                                                            <i class="fa fa-calendar-o"></i> {{ $post->created_at->toFormattedDateString() }}
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
                        <li class="mega-menu-item">
                            <a href="javascript:void(0)" id="all-categories">All</a>

                            <div class="sub-mega-menu">
                                <div class="nav flex-column nav-pills" role="tablist">
                                    @foreach ($categories as $category)
                                        <a class="fs-20 p-l-33 clblack hov-cl10 trans-03 f-r-m" href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
                                        @foreach ($category->subCategories->take(2) as $subCategory)
                                            <a class="fs-14 cl8 hov-cl10 trans-03 p-l-33" href="{{ route('subCategories.show', ['slug' => $category->slug, 'subSlug' => $subCategory->slug]) }}">{{ $subCategory->name }}</a>
                                        @endforeach
                                        <a class="fs-14 cl8 hov-cl10 trans-03 p-l-33 m-b-20" href="{{ route('categories.show', $category->slug) }}">More ...</a>
                                        @if ($loop->index % 4 == 3)
                                            </div>
                                            <div class="nav flex-column nav-pills" role="tablist">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>  
    </div>
</header>
