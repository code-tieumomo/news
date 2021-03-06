@extends('app')

@section('title')
    {{ $category->name . ' > ' . $subCategory->name }} | UET-News
@endsection

@section('headline')
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ route('home.index') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <a class="breadcrumb-item f1-s-3 cl9">
                    Categories
                </a>

                <a href="{{ route('categories.show', ['slug' => $category->slug]) }}" class="breadcrumb-item f1-s-3 cl9">
                    {{ $category->name }}
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                     {{ $subCategory->name }}
                </span>
            </div>

            <form action="/search" class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
                <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Page heading -->
    <div class="container p-t-4 p-b-40">
        <h2 class="f1-l-1 cl2">
            {{ $category->name }} <i class="fa fa-angle-double-right"></i> {{ $subCategory->name }}
        </h2>
    </div>
@endsection

@section('content')
    <!-- Feature post -->
    <section class="bg0">
        <div class="container">
            <div class="row m-rl--1">
                <div class="col-12 p-rl-1 p-b-2">
                    <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url('{{ $popCatePosts->first()->thumbnail }}');">
                        <a href="{{ route('posts.show', ['slug' => $popCatePosts->first()->slug]) }}" class="dis-block how1-child1 trans-03"></a>

                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                            <a href="{{ route('subCategories.show', ['slug' => $popCatePosts->first()->subCategory->category->slug, 'subSlug' => $popCatePosts->first()->subCategory->slug]) }}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                <i class="fa fa-bookmark"></i> {{ $popCatePosts->first()->subCategory->name }}
                            </a>

                            <h3 class="how1-child2 m-t-14 m-b-10">
                                <a href="{{ route('posts.show', ['slug' => $popCatePosts->first()->slug]) }}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                    {{ $popCatePosts->first()->title }}
                                </a>
                            </h3>

                            <span class="how1-child2">
                                <span class="f1-s-4 cl11">
                                    <i class="fa fa-pencil"></i> {{ $popCatePosts->first()->user->name }}
                                </span>

                                <span class="f1-s-3 cl11 m-rl-3">
                                    -
                                </span>

                                <span class="f1-s-3 cl11">
                                    <i class="fa fa-calendar-o"></i> {{ $popCatePosts->first()->created_at->toFormattedDateString() }}
                                </span>

                                <span class="f1-s-3 cl11 m-rl-3">
                                    -
                                </span>

                                <span class="f1-s-3 cl11">
                                    <i class="fa fa-eye"></i> {{ views($popCatePosts->first())->count() }} views
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                @foreach ($popCatePosts->skip(1) as $post)
                    <div class="col-sm-6 col-md-3 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url('{{ $post->thumbnail }}');">
                            <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="{{ route('subCategories.show', ['slug' => $post->subCategory->category->slug, 'subSlug' => $post->subCategory->slug]) }}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    <i class="fa fa-bookmark"></i> {{ $post->subCategory->name }}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <span class="how1-child2">
                                    <span class="f1-s-4 cl11">
                                        <i class="fa fa-pencil"></i> {{ $post->user->name }}
                                    </span>

                                    <span class="f1-s-3 cl11 m-rl-3">
                                        <br>
                                    </span>

                                    <span class="f1-s-3 cl11">
                                        <i class="fa fa-calendar-o"></i> {{ $post->created_at->toFormattedDateString() }}
                                    </span>

                                    <span class="f1-s-3 cl11 m-rl-3">
                                        <br>
                                    </span>

                                    <span class="f1-s-3 cl11">
                                        <i class="fa fa-eye"></i> {{ views($post)->count() }} views
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Post -->
    <section class="bg0 p-t-110 p-b-25">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-80">
                    <div class="row">
                        <div id="list-posts-1" class="col-sm-6 p-r-25 p-r-15-sr991">
                            @foreach ($posts as $post)
                                @if ($loop->odd)
                                    <!-- Item -->
                                    <div class="p-b-53">
                                        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{ $post->thumbnail }}" alt="IMG">
                                        </a>

                                        <div class="flex-col-s-c p-t-16">
                                            <h5 class="p-b-5 txt-center">
                                                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                    {{ $post->title }}
                                                </a>
                                            </h5>

                                            <div class="cl8 txt-center p-b-17">
                                                <a href="{{ route('subCategories.show', ['slug' => $post->subCategory->category->slug, 'subSlug' => $post->subCategory->slug]) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                    <i class="fa fa-bookmark"></i> {{ $post->subCategory->name }}
                                                </a>

                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>

                                                <span class="f1-s-3">
                                                    <i class="fa fa-calendar-o"></i> {{ $post->created_at->toFormattedDateString() }}
                                                </span>
                                            </div>

                                            <p class="f1-s-11 cl6 txt-center p-b-16">
                                                {{ $post->sumary }}
                                            </p>

                                            <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                                                Read More
                                                <i class="m-l-2 fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div id="list-posts-2" class="col-sm-6 p-r-25 p-r-15-sr991">
                            @foreach ($posts as $post)
                                @if ($loop->even)
                                    <!-- Item -->
                                    <div class="p-b-53">
                                        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{ $post->thumbnail }}" alt="IMG">
                                        </a>

                                        <div class="flex-col-s-c p-t-16">
                                            <h5 class="p-b-5 txt-center">
                                                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                    {{ $post->title }}
                                                </a>
                                            </h5>

                                            <div class="cl8 txt-center p-b-17">
                                                <a href="{{ route('subCategories.show', ['slug' => $post->subCategory->category->slug, 'subSlug' => $post->subCategory->slug]) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                    <i class="fa fa-bookmark"></i> {{ $post->subCategory->name }}
                                                </a>

                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>

                                                <span class="f1-s-3">
                                                    <i class="fa fa-calendar-o"></i> {{ $post->created_at->toFormattedDateString() }}
                                                </span>
                                            </div>

                                            <p class="f1-s-11 cl6 txt-center p-b-16">
                                                {{ $post->sumary }}
                                            </p>

                                            <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                                                Read More
                                                <i class="m-l-2 fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach                            
                        </div>
                        {{ $posts->links() }}
                    </div>

                    <!-- Pagination -->
                    <div id="load-more-posts" class="flex-wr-s-c m-rl--7 p-t-15">
                        <button id="btn-load" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 pagi-active load-more-posts">Load More</button>
                    </div>
                </div>

                <div class="col-md-10 col-lg-4 p-b-80">
                    <div class="p-l-10 p-rl-0-sr991">
                        <!--Popular posts in category -->
                        <div class="p-b-23">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Popular Posts
                                </h3>
                            </div>

                             <ul class="p-t-35">
                                @foreach ($popPosts as $post)
                                    <li class="flex-wr-sb-s p-b-22">
                                        <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                            <i class="fa fa-book"></i>
                                        </div>

                                        <a href="/posts/{{ $post->slug }}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                            {{ $post->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Banner -->
                        <div class="flex-c-s">
                            <a href="#">
                                <img class="max-w-full" src="{{ asset('client-assets/images/banner-02.jpg') }}" alt="IMG">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script type="text/javascript">
        $('nav[role=navigation]').hide();
        if ($("a[rel='next']").attr("href") == undefined) {
            $('#btn-load').remove();
        }

        $('#btn-load').on('click', function(event) {
            event.preventDefault();
            $('#load-more-posts').append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
            $('#btn-load').hide();

            var link = $("a[rel='next']").attr("href");
            if (typeof link !== "undefined") {
                $.get(link, function(response) {
                    $('.lds-ellipsis').remove();
                    $('#btn-load').show();
                    $('nav[role=navigation]').html(
                        $(response).find("nav[role=navigation]").html()
                    );
                    $('#list-posts-1').append(
                        $(response).find("#list-posts-1").html()
                    );
                    $('#list-posts-2').append(
                        $(response).find("#list-posts-2").html()
                    );
                    $('nav[role=navigation]').hide();
                    if ($(response).find("a[rel=next]").html() == undefined)
                        $('#btn-load').remove();
                });
            } else {
                $('.lds-ellipsis').remove();
                $('#btn-load').html('No More Posts');
                $('#btn-load').removeClass('hov-btn1');
                $('#btn-load').removeClass('pagi-active');
                $('#btn-load').addClass('bg9');
                $('#btn-load').prop('disabled', 'true');
                $('#btn-load').show();
            }
        });
    </script>
@endsection
