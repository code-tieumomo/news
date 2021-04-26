<!-- Footer -->
<footer>
    <div class="bg2 p-t-40 p-b-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <a href="{{ route('home.index') }}">
                            <img class="max-s-full" src="{{ asset('client-assets/images/icons/logo-light.png') }}" alt="LOGO">
                        </a>
                    </div>

                    <div>
                        <p class="f1-s-1 cl11 p-b-16">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor magna eget elit efficitur, at accumsan sem placerat. Nulla tellus libero, mattis nec molestie at, facilisis ut turpis. Vestibulum dolor metus, tincidunt eget odio
                        </p>

                        <p class="f1-s-1 cl11 p-b-16">
                            Any questions? Send us a <a class="f1-s-1 cl10 hov-link1" href="">contact</a> form
                        </p>

                        <div class="p-t-15">
                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fa fa-facebook-f"></span>
                            </a>

                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fa fa-twitter"></span>
                            </a>

                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fa fa-youtube-play"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            Popular Posts
                        </h5>
                    </div>

                    <ul>
                        @foreach ($popPosts->take(4) as $post)
                            <li class="flex-wr-sb-s p-b-20">
                                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="size-w-4 wrap-pic-w hov1 trans-03">
                                    <img src="{{ $post->thumbnail }}" alt="IMG">
                                </a>

                                <div class="size-w-5">
                                    <h6 class="p-b-5">
                                        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="f1-s-5 cl11 hov-cl10 trans-03">
                                            {{ $post->title }}
                                        </a>
                                    </h6>

                                    <span class="f1-s-3 cl6">
                                        <i class="fa fa-calendar-o"></i> {{ $post->created_at->toFormattedDateString() }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            Category
                        </h5>
                    </div>

                    <ul class="m-t--12">
                        @foreach ($menuCategories->take(5) as $category)
                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="{{ route('categories.show', ['slug' => $category->slug]) }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    {{ $category->name }} ({{ $category->subCategories->count() }})
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="bg11">
        <div class="container size-h-4 flex-c-c p-tb-15">
            <span class="f1-s-1 cl0 txt-center">
                Nhom du an
            </span>
        </div>
    </div>
</footer>
