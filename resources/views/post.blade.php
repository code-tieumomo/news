@extends('app')

@section('title')
    {{ $post->title }} | UET-News
@endsection

@section('custom-css')
    <style type="text/css">
        .content img {
            max-width: 100% !important;
            margin: 20px 0 20px 0;
        }

        .content p {
            margin-top: 20px;
        }

        table tr {
            margin: 20px 0 20px 0;
        }

        table tr td {
            margin-right: 20px;
        }
    </style>
@endsection

@section('headline')
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ route('home.index') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <a href="{{ route('categories.show', ['slug' => $post->subCategory->category->slug]) }}" class="breadcrumb-item f1-s-3 cl9">
                    {{ $post->subCategory->category->name }}
                </a>

                <a href="{{ route('subCategories.show', ['slug' => $post->subCategory->category->slug, 'subSlug' => $post->subCategory->slug]) }}" class="breadcrumb-item f1-s-3 cl9">
                    {{ $post->subCategory->name }}
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                     {{ $post->title }}
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

@section('content')
    <!-- Content -->
    <section class="bg0 p-b-70 p-t-5">
        <!-- Title -->
        <div class="bg-img1 size-a-18 how-overlay1" style="background-image: url('{{ $post->thumbnail }}');">
            <div class="container h-full flex-col-e-c p-b-58">
                <a href="{{ route('subCategories.show', ['slug' => $post->subCategory->category->slug, 'subSlug' => $post->subCategory->slug]) }}" class="f1-s-10 cl0 hov-cl10 trans-03 text-uppercase txt-center m-b-33">
                    {{ $post->subCategory->category->name }} <i class="fa fa-angle-right"></i> {{ $post->subCategory->name }}
                </a>

                <h3 class="f1-l-5 cl0 p-b-16 txt-center respon2">
                    {{ $post->title }}
                </h3>

                <div class="flex-wr-c-s">
                    <span class="f1-s-3 cl8 m-rl-7 txt-center">
                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                            <i class="fa fa-pencil"></i> {{ $post->user->name }}
                        </a>

                        <span class="m-rl-3">-</span>

                        <span>
                            <i class="fa fa-calendar-o"></i> {{ $post->created_at->toFormattedDateString() }}
                        </span>
                    </span>

                    <span class="f1-s-3 cl8 m-rl-7 txt-center">
                        <i class="fa fa-eye"></i> {{ views($post)->count() }} Views
                    </span>

                    <a href="" class="f1-s-3 cl8 m-rl-7 txt-center hov-cl10 trans-03">
                        <i class="fa fa-comment-o"></i> {{ $post->comments->count() }} Comment
                    </a>
                </div>
            </div>
        </div>

        <!-- Detail -->
        <div class="container p-t-82">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-100">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-70">
                            <!-- Sumary -->
                            <div class="flex-s-s p-t-12 p-b-15">
                                <span class="f1-s-12 cl5 m-r-8">
                                    <b>{{ $post->sumary }}</b>
                                </span>
                            </div>

                            <div class="content">{!! $post->content !!}</div>

                            <!-- Info -->
                            <div class="flex-s-s p-t-12 p-b-15">
                                <span class="f1-s-12 cl5 m-r-8">
                                    <i class="fa fa-pencil"></i> Writer:
                                </span>
                                
                                <div class="flex-wr-s-s size-w-0">
                                    <a href="#" class="f1-s-12 cl8 hov-link1">
                                        {{ $post->user->name }}
                                    </a>
                                </div>
                                
                                <span class="f1-s-12 cl5 m-r-8">
                                    <i class="fa fa-bookmark"></i> Sub Category:
                                </span>
                                
                                <div class="flex-wr-s-s size-w-0">
                                    <a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
                                        {{ $post->subCategory->name }}
                                    </a>
                                </div>
                            </div>

                            <!-- Share -->
                            <div class="flex-s-s">
                                <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                    Share:
                                </span>
                                
                                <div class="flex-wr-s-s size-w-0">
                                    <a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fa fa-facebook-f m-r-7"></i>
                                        Facebook
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Leave a comment -->
                        <div>
                            <h4 class="f1-l-4 cl3 p-b-12">
                                Comment
                            </h4>

                            <form>
                                <textarea class="bo-1-rad-3 bocl13 size-a-21 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Comment..."></textarea>

                                <button class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
                                    Post Comment
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-10 col-lg-4 p-b-100">
                    <!-- Related Posts -->
                    <div class="p-b-30">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Related Posts
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @foreach ($post->subCategory->posts->random(3) as $relatedPost)
                                <li class="flex-wr-sb-s p-b-30">
                                    <a href="{{ route('posts.show', ['slug' => $relatedPost->slug]) }}" class="size-w-10 wrap-pic-w hov1 trans-03">
                                        <img src="{{ $relatedPost->thumbnail }}" alt="Thumnail">
                                    </a>

                                    <div class="size-w-11">
                                        <h6 class="p-b-4">
                                            <a href="{{ route('posts.show', ['slug' => $relatedPost->slug]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {{ $relatedPost->title }}
                                            </a>
                                        </h6>

                                        <span class="cl8 txt-center p-b-24">
                                            <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                {{ $post->subCategory->name }}
                                            </a>

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                {{ $relatedPost->created_at->toFormattedDateString() }}
                                            </span>
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="p-l-10 p-rl-0-sr991">
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
