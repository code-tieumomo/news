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
                            <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(images/post-03.jpg);">
                                <a href="blog-detail-01.html" class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                        Life Style
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="blog-detail-01.html" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                            Pellentesque dui nibh, pellen-tesque ut dapibus ut
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div id="feature-post-3" class="col-sm-6 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(images/post-04.jpg);">
                                <a href="blog-detail-01.html" class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                        Sport
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="blog-detail-01.html" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                            Motobike Vestibulum vene-natis purus nec nibh volutpat
                                        </a>
                                    </h3>
                                </div>
                            </div>
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
                            <a href="#post-id-${post[0]}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    ${post[1].subCategory}
                                </a>

                                <h3 class="how1-child2 m-t-14 m-b-10">
                                    <a href="blog-detail-01.html" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
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
                            <a href="blog-detail-01.html" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    ${post[1].subCategory}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="blog-detail-01.html" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                        ${post[1].title}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    `;
                } else {
                    var html = `
                        <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url('${post[1].thumbnail}');">
                            <a href="blog-detail-01.html" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    ${post[1].subCategory}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="blog-detail-01.html" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
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
