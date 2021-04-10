@extends('admin.layout.app')

@section('custom-css')
    <!-- Simplebar css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/simplebar/css/simplebar.css') }}">
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Post Detail: {{ $post->title }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a><i class="fe fe-layout  mr-2 fs-14"></i>CRUD</a></li>
                <li class="breadcrumb-item"><a></i>Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('posts.index') }}">Posts</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card overflow-hidden">
                <div id="card-post-thumbnail" class="item7-card-img px-4 pt-4">
                    <a href="#"></a>
                    <img src="{{ $post->thumbnail }}" alt="img" class="cover-image br-7 w-100">
                </div>
                <div id="card-post-detail" class="card-body">
                    <div class="item7-card-desc d-md-flex mb-5">
                        <a class="d-flex mr-4 mb-2"><i class="fe fe-calendar fs-16 mr-1"></i><div class="mt-0">Created: {{ $post->created_at->toDateTimeString() }}</div></a>
                        <a class="d-flex mr-4 mb-2"><i class="fe fe-calendar fs-16 mr-1"></i><div class="mt-0">Last Modified: {{ $post->updated_at->toDateTimeString() }}</div></a>
                        <a class="d-flex mb-2"><i class="fe fe-user fs-16 mr-1"></i><div class="mt-0">{{ $post->user->name }}</div></a>
                        <div class="ml-auto mb-2">
                            <a class="mr-0 d-flex" href="#list-comments"><i class="fe fe-message-square fs-16 mr-1"></i><div class="mt-0">{{ count($post->comments) }} Comments</div></a>
                        </div>
                    </div>
                    <a class="mt-4"><h5 class="font-weight-semibold">{{ $post->title }}</h5></a>
                    <p class="">
                        {{ $post->sumary }}
                    </p>
                    <p class="py-3 mt-0 border-top">
                        {{ $post->content }}
                    </p>
                    <div class="media py-3 mt-0 border-top">
                        <div class="ml-auto">
                            <div class="d-flex">
                                <a id="btn-edit-post" href="javascript:void(0)" class="new ml-3"><i class="text-warning fe fe-edit fs-16"></i></a>
                                <a id="btn-delete-post" data-id="{{ $post->id }}" href="javascript:void(0)" class="new ml-3"><i class="text-danger fe fe-trash-2 fs-16"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="card-post-loader" class="card-body">
                    <div class="dimmer active">
                        <div class="lds-hourglass"></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Comments</h3>
                </div>
                <div class="card-body">
                    <div class="latest-timeline scrollbar3" id="scrollbar3">
                        <ul id="list-comments" class="timeline mb-0">
                            <div id="list-comments-loader" class="card-body">
                                <div class="dimmer active">
                                    <div class="lds-hourglass"></div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->

    <!-- Edit comment modal -->
    <div class="modal" id="modal-edit-comment">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Edit comment</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div id="modal-body" class="modal-body">
                    <input class="form-control" type="text" name="comment">
                    <table class="table border">
                        <tr>
                            <td>Firebase key</td>
                            <td id="modal-firebase-key"></td>
                        </tr>
                        <tr>
                            <td>Mysql id</td>
                            <td id="modal-mysql-id"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer justify-content-center">
                    <button id="btn-update-comment" class="btn btn-indigo" type="button">Save changes</button> <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <!--INTERNAL Index js-->
    <script src="{{ asset('admin-assets/js/index1.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('admin-assets/plugins/simplebar/js/simplebar.min.js') }}"></script>

    <script type="text/javascript">
        document.title = '{{ $post->title }} | UET-News';
        $('#menu-post').addClass('active');
        $('nav[role=navigation]').hide();
        $('#card-post-loader').hide();
        $('#card-comments-loader').hide();

        var database = firebase.database();
        var commentsRef = database.ref('comments/{{ $post->id }}');
        commentsRef.on('value', (snapshot) => {
            $('#list-comments').empty();
            const comments = snapshot.val();
            Object.entries(comments).forEach(function(comment, order) {
                var html = `
                    <li class="mb-0 mt-0">
                        <div class="d-flex">
                            <span class="time-data">
                                ${comment[1].comment}
                                <a id="" data-id="${comment[0]}" data-comment="${comment[1].comment}" data-mysql-id="${comment[1].mysql_id}" href="javascript:void(0)" class="new ml-3 btn-edit-comment"><i class="text-warning fe fe-edit fs-16"></i></a>
                                <a id="" data-id="${comment[0]}" data-comment="${comment[1].comment}" data-mysql-id="${comment[1].mysql_id}" href="javascript:void(0)" class="new ml-3 btn-delete-comment"><i class="text-danger fe fe-trash-2 fs-16"></i></a>
                            </span>
                            <span class="ml-auto text-muted fs-11">
                                ${comment[1].time}
                            </span>
                        </div>
                        <p class="text-muted fs-12">
                            <span class="text-info">${comment[1].user}</span>
                        </p>
                    </li>
                `;
                $('#list-comments').prepend(html);
            });
        });

        $('#btn-loadmore').on('click', function(event) {
            event.preventDefault();
            $('#card-comments-loader').show();

            var link = $("a[rel='next']").attr("href");
            if (typeof link !== "undefined") {
                $.get(link, function(response) {
                    $('#card-comments-loader').hide();
                    $('nav[role=navigation]').remove();
                    $('#card-comments').append(
                        $(response).find("#card-comments").html()
                    );
                    $('nav[role=navigation]').hide();
                });
            } else {
                $('#card-comments-loader').hide();
                $("#btn-loadmore").html("<h6>That's all comment!</h6>");
            }
        });

        $('#btn-delete-post').on('click', function(event) {
            event.preventDefault();
            
            var id = $(this).data('id');
            deletePost(id);
        });

        function deletePost(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "All post's comment will be delete too!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('posts.destroy', $post->id) }}',
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        beforeSend: function() {
                            $('#card-post-detail').hide();
                            $('#card-post-thumbnail').hide();
                            $('#card-post-loader').show();
                        }
                    })
                    .done(function(response) {
                        $('#card-post-detail').html('<h6 class="text-danger">Post has been removed!</h6><a href="/admin/posts">Click here to back <i class="fa fa-location-arrow"></i></a>');
                        $('#card-post-detail').show();
                        $('#card-post-thumbnail').remove();
                        $('#card-post-loader').hide();
                        $('.card-title').html('All comments have been removed!')
                        $('#card-comments').remove();
                        $('#btn-loadmore').remove();
                        if (response == 'success'){
                            $('#modal-user-detail').modal('hide');
                            $('tr[id=' + id + ']').remove();
                            Swal.fire(
                                'Deleted!',
                                'Post has been deleted.',
                                'success'
                            );

                        } else {
                            Swal.fire(
                                'Oops!',
                                'Something went wrong! Please try later.',
                                'error'
                            );
                        }
                    })
                    .fail(function(reponse) {
                        $('#card-post-detail').show();
                        $('#card-post-thumbnail').show();
                        $('#card-post-loader').hide();
                        Swal.fire(
                            'Oops!',
                            'Something went wrong! Please try later.',
                            'error'
                        );
                    });
                }
            });
        }

        $('#list-comments').on('click', '.btn-edit-comment', function(event) {
            event.preventDefault();
            
            var id = $(this).data('id');
            var comment = $(this).data('comment');
            var mysqlId = $(this).data('mysql-id')
            $('input[name=comment]').val(comment);
            $('#modal-firebase-key').html(id);
            $('#modal-mysql-id').html(mysqlId);
            $('#modal-edit-comment').modal('show');
        });

        $('#list-comments').on('click', '.btn-delete-comment', function(event) {
            event.preventDefault();
            
            var btn = $(this);
            var id = $(this).data('id');
            var comment = $(this).data('comment');
            var mysqlId = $(this).data('mysql-id')
            Swal.fire({
                title: 'Are you sure?',
                text: "Comment will be delete!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('comments.destroy') }}',
                        method: 'PUT',
                        data: {
                            _token: '{{ csrf_token() }}',
                            firebase_key: id,
                            mysql_id: mysqlId,
                            post_id: {{ $post->id }},
                            comment: comment
                        },
                        beforeSend: function() {
                            btn.html('<i class="text-warning">Deleting ...</i>');
                        }
                    })
                    .done(function() {
                        //
                    })
                    .fail(function() {
                        btn.html('<i class="text-warning fe fe-edit fs-16"></i>');
                        Swal.fire(
                            'Oops!',
                            'Something went wrong! Please try later.',
                            'error'
                        );
                    });
                }
            });
        });

        $('#btn-update-comment').on('click', function(event) {
            event.preventDefault();
        
            $.ajax({
                url: '{{ route('comments.update') }}',
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    firebase_key: $('#modal-firebase-key').html(),
                    mysql_id: $('#modal-mysql-id').html(),
                    post_id: {{ $post->id }},
                    comment:  $('input[name=comment]').val()
                },
                beforeSend: function() {
                    $('input[name=comment]').prop('disabled', true);
                    $('#btn-update-comment').prop('disabled', true);
                }
            })
            .done(function() {
                $('input[name=comment]').prop('disabled', false);
                $('#btn-update-comment').prop('disabled', false);
                $('#modal-edit-comment').modal('hide');
            })
            .fail(function() {
                $('input[name=comment]').prop('disabled', false);
                $('#btn-update-comment').prop('disabled', false);
                Swal.fire(
                    'Oops!',
                    'Something went wrong! Please try later.',
                    'error'
                );
            });
        });
    </script>
@endsection
