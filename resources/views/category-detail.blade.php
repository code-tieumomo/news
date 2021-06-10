@extends('app')

@section('title')
    {{ $category->name }} | UET-News
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

                <span class="breadcrumb-item f1-s-3 cl9">
                     {{ $category->name }}
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
            {{ $category->name }}
        </h2>
    </div>
@endsection

@section('content')
    <!-- Post -->
    <section class="p-b-55">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-80">
                    <div id="list-posts" class="row">
                        @if ($posts)
                            @foreach ($posts as $post)
                                <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                    <!-- Item latest -->    
                                    <div class="m-b-45">
                                        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{ $post->thumbnail }}" alt="IMG">
                                        </a>

                                        <div class="p-t-16">
                                            <h5 class="p-b-5">
                                                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                    {{ $post->title }}
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                                <a href="{{ route('subCategories.show', ['slug' => $post->subCategory->category->slug, 'subSlug' => $post->subCategory->slug]) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                    <i class="fa fa-bookmark"></i> {{ $post->subCategory->name }}
                                                </a>

                                                <span class="f1-s-3 m-rl-3">
                                                    <br>
                                                </span>
                                                <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                    <i class="fa fa-pencil"></i> {{ $post->user->name }}
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
                        @else

                        @endif
                        {{ $posts->links() }}
                    </div>

                    <!-- Load more posts -->
                    {{-- <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div> --}}
                    <div class="flex-wr-s-c m-rl--7 p-t-15">
                        <button id="btn-load" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 pagi-active load-more-posts">Load More</button>
                    </div>
                    {{-- <div class="lds-hourglass"></div> --}}
                </div>

                <div class="col-md-10 col-lg-4 p-b-80">
                    <div class="p-l-10 p-rl-0-sr991">                           
                        <!-- Sub Categories -->
                        <div class="p-b-23">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Sub Categories in {{ $category->name }}
                                </h3>
                            </div>

                             <ul class="p-t-35">
                                @foreach ($category->subCategories as $subCategory)
                                    <li class="flex-wr-sb-s p-b-22">
                                        <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                            <i class="fa fa-bookmark"></i>
                                        </div>

                                        <a href="{{ route('subCategories.show', ['slug' => $category->slug, 'subSlug' => $subCategory->slug]) }}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                            {{ $subCategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!--Popular posts in category -->
                        <div class="p-b-23">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Popular Posts in {{ $category->name }}
                                </h3>
                            </div>

                             <ul class="p-t-35">
                                @foreach ($popCatePosts as $post)
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

                        <!--  -->
                        <div class="flex-c-s p-b-50">
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
            $('#list-posts').append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
            $('#btn-load').hide();

            var link = $("a[rel='next']").attr("href");
            if (typeof link !== "undefined") {
                $.get(link, function(response) {
                    $('.lds-ellipsis').remove();
                    $('#btn-load').show();
                    $('nav[role=navigation]').remove();
                    $('#list-posts').append(
                        $(response).find("#list-posts").html()
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
