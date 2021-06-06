@extends('admin.layout.app')

@section('custom-css')
    <!-- Simplebar css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/simplebar/css/simplebar.css') }}">
    <!-- INTERNAL File Uploads css -->
    <link href="{{ asset('admin-assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!-- INTERNAL File Uploads css-->
    <link href="{{ asset('admin-assets/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Post Detail: {{ $post->title }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a><i class="fe fe-layout  mr-2 fs-14"></i>CRUD</a></li>
                <li class="breadcrumb-item"><a></i>Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('manage-posts.index') }}">Posts</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <form id="form-detail" class="card overflow-hidden">
                <div id="card-post-thumbnail" class="item7-card-img px-4 pt-4">
                    <a href="#"></a>
                    <img src="{{ $post->thumbnail }}" alt="img" class="cover-image br-7 w-100">
                </div>
                <div class="item7-card-img px-4 pt-4">
                    <div class="item7-card-desc d-md-flex mb-5">
                        <a class="d-flex mr-4"><i class="fe fe-file fs-16 mr-1"></i> To change post's thumbnail, choose a file below.</a>
                    </div>
                    <input name="thumbnail" type="file" class="dropify" data-height="100" accept=".jpg, .png, image/jpeg, image/png">
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
                    <a class="mt-4"><input name="title" class="font-weight-semibold w-100 h-6 fs-16 border mb-5" style="outline: none;" value="{{ $post->title }}"></a>
                    <p class="">
                        <textarea name="sumary" rows="3" class="w-100 border">{{ $post->sumary }}</textarea>
                    </p>
                    <div class="py-3 mt-0 border-top">
                        <textarea name="editor"></textarea>
                    </div>
                    <div class="media py-3 mt-0 border-top">
                        <div class="ml-auto">
                            <div class="d-flex">
                                <a href="/posts/{{ $post->slug }}" target="_blank" class="btn btn-success new ml-3"><i class="fe fe-arrow-up-right fs-16"></i> View this post in UET-News</a>
                                <button type="submit" id="btn-edit-post" href="javascript:void(0)" class="btn btn-warning new ml-3"><i class="fe fe-edit fs-16"></i> Update</button>
                                <button id="btn-delete-post" data-id="{{ $post->id }}" href="javascript:void(0)" class="btn btn-danger new ml-3"><i class="fe fe-trash-2 fs-16"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="card-post-loader" class="card-body">
                    <div class="dimmer active">
                        <div class="lds-hourglass"></div>
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Comments</h3>
                </div>
                <div class="card-body">
                    <div class="latest-timeline scrollbar3" id="scrollbar3">
                        <ul id="list-comments" class="timeline mb-0">
                            @foreach ($comments as $comment)
                                <li class="mb-0 mt-0">
                                    <div class="d-flex">
                                        <span class="time-data">
                                            <span class="content" id="comment-{{ $comment->id }}">{{ $comment->content }}</span>
                                            <a id="" data-id="{{ $comment->id }}" data-comment="{{ $comment->content }}" data-mysql-id="{{ $comment->id }}" href="javascript:void(0)" class="new ml-3 btn-edit-comment"><i class="text-warning fe fe-edit fs-16"></i></a>
                                            <a id="" data-id="{{ $comment->id }}" data-comment="{{ $comment->content }}" data-mysql-id="{{ $comment->id }}" href="javascript:void(0)" class="new ml-3 btn-delete-comment"><i class="text-danger fe fe-trash-2 fs-16"></i></a>
                                        </span>
                                        <span class="ml-auto text-muted fs-11">
                                            {{ $comment->updated_at->toDateTimeString() }}
                                        </span>
                                    </div>
                                    <p class="text-muted fs-12">
                                        <span class="text-info">{{ $comment->user->name }}</span>
                                    </p>
                                </li>
                            @endforeach
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
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('admin-assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!-- INTERNAL File uploads js -->
    <script src="{{ asset('admin-assets/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ asset('admin-assets/js/filupload.js') }}"></script>
    <!--INTERNAL Form Advanced Element -->
    <script src="{{ asset('admin-assets/js/file-upload.js') }}"></script>
    <script type="text/javascript">
        document.title = '{{ $post->title }} | UET-News';
        CKEDITOR.config.height = 1000;
        let editor = CKEDITOR.replace('editor');
        editor.setData(`{!! $post->content !!}`);
        $('#menu-post').addClass('active');
        $('nav[role=navigation]').hide();
        $('#card-post-loader').hide();
        $('#card-comments-loader').hide();

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
                        url: '{{ route('manage-posts.destroy', $post->id) }}',
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
                        $('#card-post-detail').html('<h6 class="text-danger">Post has been removed!</h6><a href="/admin/manage-posts">Click here to back <i class="fa fa-location-arrow"></i></a>');
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
            var comment = $(this).parent().find('.content').html();
            var mysqlId = $(this).data('mysql-id')
            $('input[name=comment]').val(comment);
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
                        url: '{{ route('manage-comments.destroy') }}',
                        method: 'PUT',
                        data: {
                            _token: '{{ csrf_token() }}',
                            mysql_id: mysqlId,
                            post_id: {{ $post->id }},
                            comment: comment
                        },
                        beforeSend: function() {
                            btn.html('<i class="text-warning">Deleting ...</i>');
                        }
                    })
                    .done(function() {
                        btn.parent().parent().parent().remove();
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
                url: '{{ route('manage-comments.update') }}',
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
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
                $('#comment-' + $('#modal-mysql-id').html()).html($('input[name=comment]').val());
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

        $('#form-detail').on('submit', function(event) {
            event.preventDefault();
            $('#btn-edit-post').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Updating');
            $('#btn-edit-post').attr('disabled', true);

            let data = new FormData(this);
            data.append('content', editor.getData());
            data.append('_token', '{{ csrf_token() }}');
            data.append('_method', 'PUT');
            $.ajax({
                url: '/admin/manage-posts/' + {{ $post->id }},
                type: 'POST',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: (response, textStatus, xhr) => {
                    $('#btn-edit-post').html('<i class="fa fa-pencil-square-o"></i> Update');
                    $('#btn-edit-post').removeAttr('disabled');
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Updated post'
                    });
                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#btn-edit-post').html('<i class="fa fa-pencil-square-o"></i> Update');
                    $('#btn-edit-post').removeAttr('disabled');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Some thing went wrong! Try later'
                    });
                }
            });
        });
    </script>
@endsection
