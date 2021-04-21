@extends('app')

@section('headline')
    <!-- Headline -->
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
                <span class="text-uppercase cl2 p-r-8">
                    Daily Quotes:<br>
                </span>

                <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
                    @foreach ($quotes as $quote)
                        <span class="dis-inline-block slide100-txt-item animated visible-false">
                            {{ $quote }}
                        </span>
                    @endforeach
                </span>
            </div>

            <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
                <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </div>
    </div>
@endsection

@section('feature-posts')
    <!-- Feature post -->
    <section class="bg0">
        <div class="container">
            <div class="row m-rl--1">
                <div id="feature-post-0" class="col-md-6 p-rl-1 p-b-2">
                    
                </div>

                <div class="col-md-6 p-rl-1">
                    <div class="row m-rl--1">
                        <div id="feature-post-1" class="col-12 p-rl-1 p-b-2">
                            
                        </div>

                        <div id="feature-post-2" class="col-sm-6 p-rl-1 p-b-2">

                        </div>

                        <div id="feature-post-3" class="col-sm-6 p-rl-1 p-b-2">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('feature-categories')
    <!-- Post -->
    <section class="bg0 p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="p-b-20">
                        @foreach ($featureCategories as $category)
                            <!-- {{ $category->name }} -->
                            <div class="tab01 p-b-20">
                                <div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                    <!-- Brand tab -->
                                    <h3 class="f1-m-2 cl13 tab01-title">
                                        {{ $category->name }}
                                    </h3>

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">

                                        @foreach ($category->subCategories->take(5) as $subCategory)
                                            <li class="nav-item">
                                                <a class="nav-link @if ($loop->first) active @endif" data-toggle="tab" href="#tab{{ $category->id }}-{{ $subCategory->id }}" role="tab">{{ $subCategory->name }}</a>
                                            </li>
                                        @endforeach

                                        <li class="nav-item-more dropdown dis-none">
                                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-ellipsis-h"></i>
                                            </a>

                                            <ul class="dropdown-menu"></ul>
                                        </li>
                                    </ul>

                                    <!--  -->
                                    <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                        View all
                                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                    </a>
                                </div>

                                 <!-- Tab panes -->
                                    <div class="tab-content p-t-35">
                                        @foreach($category->subCategories->take(5) as $subCategory)
                                        <!-- - -->
                                        <div class="tab-pane fade show @if ($loop->first) active @endif" id="tab{{ $category->id }}-{{ $subCategory->id }}" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                                    <!-- Item post -->  
                                                    <div class="m-b-30">
                                                        <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                            <img src="{{ $subCategory->posts->first()->thumbnail }}" alt="IMG">
                                                        </a>

                                                        <div class="p-t-20">
                                                            <h5 class="p-b-5">
                                                                <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                                    {{ $subCategory->posts->first()->title }}
                                                                </a>
                                                            </h5>

                                                            <span class="cl8">
                                                                <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                                    {{ $subCategory->name }}
                                                                </a>

                                                                <span class="f1-s-3 m-rl-3">
                                                                    -
                                                                </span>

                                                                <span class="f1-s-3">
                                                                    {{ $subCategory->posts->first()->created_at->toFormattedDateString() }}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                                    @foreach ($subCategory->posts->skip(1)->take(3) as $post)
                                                        <!-- Item post -->  
                                                        <div class="flex-wr-sb-s m-b-30">
                                                            <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                                <img src="{{ $post->thumbnail }}" alt="IMG">
                                                            </a>

                                                            <div class="size-w-2">
                                                                <h5 class="p-b-5">
                                                                    <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                        {{ $post->title }}
                                                                    </a>
                                                                </h5>

                                                                <span class="cl8">
                                                                    <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                        {{ $subCategory->name }}
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
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!--  -->
                        <div>
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Most Popular
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @php
                                    $countPopPosts = 1;
                                @endphp
                                @foreach ($popPosts as $post)
                                    <li class="flex-wr-sb-s p-b-22">
                                        <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                            {{ $countPopPosts }}
                                        </div>

                                        <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                            {{ $post->title }}
                                        </a>
                                    </li>
                                    @php
                                        $countPopPosts++;
                                    @endphp
                                @endforeach
                            </ul>
                        </div>

                        <!--  -->
                        <div class="flex-c-s p-t-8">
                            <a href="#">
                                <img class="max-w-full" src="{{ asset('client-assets/images/banner-02.jpg') }}" alt="IMG">
                            </a>
                        </div>

                        <!--  -->
                        <div class="p-t-50">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Stay Connected
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                        <span class="fa fa-facebook-f"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            Facebook
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Like
                                        </a>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                        <span class="fa fa-twitter"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            Twitter
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Follow
                                        </a>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                        <span class="fa fa-youtube-play"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            Youtube
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Subscribe
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('banner')
    <!-- Banner -->
    <div class="container">
        <div class="flex-c-c">
            <a href="#">
                <img class="max-w-full" src="{{ asset('client-assets/images/banner-01.jpg') }}" alt="IMG">
            </a>
        </div>
    </div>
@endsection

@section('lastest-posts')
    <!-- Latest -->
    <section class="bg0 p-t-60 p-b-35">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-20">
                    <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                        <h3 class="f1-m-2 cl3 tab01-title">
                            Latest Posts
                        </h3>

                        <!--  -->
                        <a href="category-01.html" class="f1-s-1 cl9 hov-cl10 trans-03" style="float: right;">
                            View all
                            <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                        </a>
                    </div>

                    <div class="row p-t-35">
                        @foreach ($lastestPosts as $post)
                           <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                <!-- Item latest -->    
                                <div class="m-b-45">
                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{ $post->thumbnail }}" alt="IMG">
                                    </a>

                                    <div class="p-t-16">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                {{ $post->title }}
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                by {{ $post->user->name }}
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

                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!-- Top writer -->
                        <div class="p-b-55">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Top Writers
                                </h3>

                                <!--  -->
                                <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Top Writer -->
                        <div class="p-b-55">
                            <div class="flex-wr-s-s m-rl--5">
                                @foreach ($topWriters as $writer)
                                    <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        {{ $writer->name }}
                                    </a>
                                @endforeach
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script type="text/javascript">
        //Feature Posts
        var database = firebase.database();

        var featurePostsRef = database.ref('featurePosts');
        featurePostsRef.on('value', (snapshot) => {
            const featurePosts = snapshot.val();
            Object.entries(featurePosts).forEach(function(post, order) {
                if (order == 0) {
                    var html = `
                        <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url('${post[1].thumbnail}');">
                            <a href="posts/${post[1].slug}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    ${post[1].subCategory}
                                </a>

                                <h3 class="how1-child2 m-t-14 m-b-10">
                                    <a href="posts/${post[0]}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                        ${post[1].title}
                                    </a>
                                </h3>

                                <span class="how1-child2">
                                    <span class="f1-s-4 cl11">
                                        ${post[1].writer}
                                    </span>

                                    <span class="f1-s-3 cl11 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3 cl11">
                                        ${post[1].time}
                                    </span>
                                </span>
                            </div>
                        </div>
                    `;
                } else if (order == 1) {
                    var html = `
                        <div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url('${post[1].thumbnail}');">
                            <a href="posts/${post[1].slug}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    ${post[1].subCategory}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="posts/${post[0]}" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                        ${post[1].title}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    `;
                } else {
                    var html = `
                        <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url('${post[1].thumbnail}');">
                            <a href="posts/${post[1].slug}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    ${post[1].subCategory}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="posts/${post[0]}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        ${post[1].title}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    `;
                }
                $('#feature-post-' + order).html(html);
            });
        });
    </script>
@endsection
