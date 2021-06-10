@extends('app')

@section('title')
    {!! $post->title !!} | UET-News
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
                     {!! $post->title !!}
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
                    {!! $post->title !!}
                </h3>

                <div class="flex-wr-c-s cl0">
                    <span class="f1-s-3 m-rl-7 txt-center">
                        <a class="f1-s-4 hov-cl10 trans-03">
                            <i class="fa fa-pencil"></i> {{ $post->user->name }}
                        </a>

                        <span class="m-rl-3">-</span>

                        <span>
                            <i class="fa fa-calendar-o"></i> {{ $post->created_at->toFormattedDateString() }}
                        </span>
                    </span>

                    <span class="f1-s-3 m-rl-7 txt-center">
                        <i class="fa fa-eye"></i> {{ views($post)->count() }} Views
                    </span>

                    <a href="#comments" class="f1-s-3 m-rl-7 cl0 txt-center hov-cl10 trans-03">
                        <i class="fa fa-comment-o"></i> {{ $post->comments->count() }} Comment
                    </a>
                </div>
            </div>
        </div>

        <!-- Detail -->
        <div class="container p-t-82">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-70">
                            <!-- Sumary -->
                            <div class="flex-s-s p-t-12 p-b-15">
                                <span class="f1-s-12 cl5 m-r-8">
                                    <b>{!! $post->sumary !!}</b>
                                </span>
                            </div>

                            <div class="content">{!! $post->content !!}</div>

                            <!-- Info -->
                            <div class="flex-s-s p-t-12 p-b-15">
                                <span class="f1-s-12 cl5 m-r-8">
                                    <i class="fa fa-pencil"></i> Writer:
                                </span>

                                <div class="flex-wr-s-s size-w-0">
                                    <a class="f1-s-12 cl8 hov-link1">
                                        {{ $post->user->name }}
                                    </a>
                                </div>

                                <span class="f1-s-12 cl5 m-r-8">
                                    <i class="fa fa-bookmark"></i> Sub Category:
                                </span>

                                <div class="flex-wr-s-s size-w-0">
                                    <a href="{{ route('subCategories.show', ['slug' => $post->subCategory->category->slug, 'subSlug' => $post->subCategory->slug]) }}" class="f1-s-12 cl8 hov-link1 m-r-15">
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
                                    <a href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u={{ route('posts.show', ['slug' => $post->slug]) }}&display=popup&ref=plugin&src=share_button" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fa fa-facebook-f m-r-7"></i>
                                        Facebook
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Leave a comment -->
                        <div>
                            <h4 class="f1-l-4 cl3 p-b-12">
                                Comments
                            </h4>
                            @if (Auth::check())
                                <form id="form-comment" style="display: flex;">
                                    <input class="bo-1-rad-3 bocl13 size-a-21 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="content" placeholder="Comment ..." style="margin-right: 40px; height: unset;"></input>

                                    <button id="btn-post-comment" class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15">
                                        Post Comment
                                    </button>
                                </form>
                            @endif

                            <div id="list-comments">
                                @foreach ($comments as $comment)
                                    <p id="comment-{{ $comment->id }}" class="f1-s-15 cl8 p-b-10">
                                        <b class="cl5"><i class="fa fa-user-o"></i> {{ $comment->user->name }}</b><br>
                                        <span class="content">{{ $comment->content }}</span><br>
                                        <span class="f1-s-13"><i>{{ $comment->created_at }}</i></span>
                                        @if ($comment->user_id == Auth::id())
                                            | <span class="f1-s-13 text-primary btn-edit" data-id="{{ $comment->id }}" style="cursor: pointer"><i class="fa fa-pencil-square-o"></i> Edit</span>
                                            | <span class="f1-s-13 text-danger btn-delete" data-id="{{ $comment->id }}" style="cursor: pointer"><i class="fa fa-trash-o"></i> Delete</span>
                                        @endif
                                    </p>
                                @endforeach
                                {{ $comments->links() }}
                            </div>
                            <div class="p-b-10">
                                <a id="btn-load" class="f1-s-13" style="cursor: pointer;"><b>Load more ...</b></a>
                            </div>
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

@section('custom-js')
    <script>
        $('nav[role=navigation]').hide();
        if ($("a[rel='next']").attr("href") == undefined) {
            $('#btn-load').remove();
        }

        $('#btn-load').on('click', function(event) {
            event.preventDefault();
            $('#btn-load').html('<b>Load more <i class="fa fa-spinner fa-pulse fa-fw"></i></b>');

            var link = $("a[rel='next']").attr("href");
            if (typeof link !== "undefined") {
                $.get(link, function(response) {
                    $('#btn-load').html('<b>Load more ...</b>');
                    $('nav[role=navigation]').remove();
                    $('#list-comments').append(
                        $(response).find("#list-comments").html()
                    );
                    $('nav[role=navigation]').hide();
                    if ($(response).find("a[rel=next]").html() == undefined)
                        $('#btn-load').remove();
                });
            } else {
                $('#btn-load').html('<b>Load more ...</b>');
            }
        });

        @if (Auth::check())
            $('#form-comment').on('submit', function(event) {
                event.preventDefault();
                $('#btn-post-comment').html('Comment <i class="fa fa-spinner fa-pulse fa-fw"></i>');
                $('#btn-post-comment').prop('disabled', true);

                let content = $('input[name=content]').val();
                if (content == undefined || content == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter comment!'
                    })
                    $('#btn-post-comment').html('Post Comment');
                    $('#btn-post-comment').removeAttr('disabled');

                    return false;
                }
                $.ajax({
                    url: '/comments',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        content: content,
                        post_id: {{ $post->id }}
                    },
                    complete: function() {
                        $('#btn-post-comment').html('Post Comment');
                        $('#btn-post-comment').removeAttr('disabled');
                    },
                    success: function(response, textStatus, xhr) {
                        $('input[name=content]').val('');
                        $('#list-comments').prepend(`
                            <p id="comment-${response.id}" class="f1-s-15 cl8 p-b-10">
                                <b class="cl5"><i class="fa fa-user-o"></i> {{ Auth::user()->name }}</b><br>
                                <span class="content">${content}</span><br>
                                <span class="f1-s-13"><i>${response.date}</i></span>
                                | <span class="f1-s-13 text-primary btn-edit" data-id="${response.id}" style="cursor: pointer"><i class="fa fa-pencil-square-o"></i> Edit</span>
                                | <span class="f1-s-13 text-danger btn-delete" data-id="${response.id}" style="cursor: pointer"><i class="fa fa-trash-o"></i> Delete</span>
                            </p>
                        `);
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Some thing went wrong! Try later'
                        })
                    }
                });
            });

            $('#list-comments').on('click', '.btn-delete', function(event) {
                event.preventDefault();
                $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Deleting');

                let id = $(this).data('id');
                $.ajax({
                    url: '/comments/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response, textStatus, xhr) {
                        $('#comment-' + id).remove();
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Some thing went wrong! Try later'
                        })
                    }
                });
            });

            $('#list-comments').on('click', '.btn-edit', function(event) {
                event.preventDefault();

                Swal.fire({
                    html: '<input id="comment-edited" style="width: 100%;" type="text" name="content" value="' + $(this).parent().find('.content').html() + '" placeholder="">',
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: 'Post Comment',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Editing');
                        let content = $('#comment-edited').val();
                        $.ajax({
                            url: '/comments',
                            type: 'PUT',
                            data: {
                                _token: '{{ csrf_token() }}',
                                content: content,
                                id: $(this).data('id')
                            },
                            success: (response, textStatus, xhr) => {
                                $(this).parent().find('.content').html(content);
                                $(this).html('<i class="fa fa-pencil-square-o"></i> Edit');
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                $(this).html('<i class="fa fa-pencil-square-o"></i> Edit');
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Some thing went wrong! Try later'
                                })
                            }
                        });
                    }
                })
            });
        @endif
    </script>
@endsection
