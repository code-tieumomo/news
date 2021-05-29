@extends('user-features.app')

@section('title', 'Account | User Features')

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">🗂️ Account</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user-features.index') }}"><i class="fe fe-layers mr-2 fs-14"></i>User Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user-features.index') }}">Account</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card box-widget widget-user">
                <div class="widget-user-image mx-auto mt-5"><img alt="User Avatar" class="rounded-circle" src="{{ asset('client-assets/images/users/' . 'user-sample' . '.png') }}"></div>
                <div class="card-body text-center pt-2">
                    <div class="pro-user">
                        <h3 class="pro-user-username text-dark mb-1 fs-22 dynamic-name">{{ Auth::user()->name }}</h3>
                        <h6 class="pro-user-desc text-muted">
                            @if (Auth::user()->fb_id != null)
                                <span class="badge badge-gradient-primary mt-2">Account link with Facebbok</span>
                            @else
                                <span class="badge badge-gradient-info mt-2">Normal Account</span>
                            @endif
                        </h6>
                        <div class="text-center mb-4">
                            @role('user')
                                <span class="badge badge-gradient-secondary mt-2">User</span>
                            @elserole('writer')
                                <span class="badge badge-gradient-warning mt-2">Writer</span>
                            @endrole
                        </div>
                        <a href="{{ route('home.index') }}" class="btn btn-primary mt-3">Back to UET-News</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Password</div>
                </div>
                <form id="form-update-password">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Current Password</label>
                            <input name="current-password" type="password" class="form-control input-password" data-required="Current password at least 8 character" placeholder="Your current password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <input name="new-password" type="password" class="form-control input-password" data-required="New password at least 8 character" placeholder="Your new password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <input name="confirm-password" type="password" class="form-control input-password" data-required="Password confirmation at least 8 character" data-match="Password confirmation does not match" placeholder="Confirm your new password">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Updated</button>
                        <button type="reset" class="btn btn-danger">Cancle</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="card">
                <form id="form-update-infomation">
                    <div class="card-header">
                        <div class="card-title">Infomation</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" placeholder="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control input-infomation" placeholder="Name" value="{{ Auth::user()->name }}" data-required="Name can not be null">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Updated</button>
                        <button type="reset" class="btn btn-danger">Cancle</button>
                    </div>
                </form>
            </div>
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Manage your comments</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="tbl-comments">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Comment</th>
                                    <th class="wd-15p border-bottom-0">Time</th>
                                    <th class="wd-15p border-bottom-0">Post</th>
                                    <th class="wd-15p border-bottom-0">Action</th>
                                    <th class="wd-15p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td class="text-comment" data-id={{ $comment->post_id . '-' . Auth::id() }}>{{ $comment->content }}</td>
                                        <td>{{ $comment->updated_at }}</td>
                                        <td class="number-font"><a href="/posts/{{ $comment->post->slug }}"><span class="badge badge-primary">View post</span></a></td>
                                        <td><a href="#" class="btn-edit" data-comment="{{ $comment->content }}" data-post="{{ $comment->post_id }}"><i class="fa fa-edit mr-1 text-warning"></i> Edit</a></td>
                                        <td><a href="#" class="btn-delete"><i class="fa fa-trash mr-1 text-danger"></i> Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>
    </div>
    <!-- End Row-->

    <!-- Edit comment modal -->
    <div class="modal" id="modal-edit-comment">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Edit comment</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div id="modal-body" class="modal-body">
                    <input class="form-control input-comment" type="text" name="comment" data-required="Comment can not be null">
                    <input class="form-control" type="hidden" name="post-id">
                </div>
                <div class="modal-footer justify-content-center">
                    <button id="btn-update-comment" class="btn btn-indigo" type="button">Save changes</button> <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        $('#tbl-comments').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });

        validate = (input) => {
            if ($(input).attr('type') == 'password' && $(input).val().length < 8) {
                $(input).focus();

                return $(input).data('required');
            }

            if ($(input).attr('name') == 'confirm-password') {
                if($('input[name=confirm-password]').val() != $('input[name=new-password]').val()) {
                    $(input).focus();

                    return $(input).data('match');
                }
            }

            if ($(input).val().length <= 0) {
                $(input).focus();

                return $(input).data('required');
            }
        }

        showValidate = (message) => {
            Swal.fire({
                title: 'Error!',
                text: message,
                icon: 'error',
                confirmButtonText: 'Try again!'
            });
        }

        validateFormUpdatePassword = (formId) => {
            if (formId == 'form-update-password') {
                let inputPassword = $('.input-password');
                for(let i = 0; i < inputPassword.length; i++) {
                    if(validate(inputPassword[i]) != undefined){
                        showValidate(validate(inputPassword[i]));

                        return false;
                    }
                }
            }
            if (formId == 'form-update-infomation') {
                let inputInfomation = $('.input-infomation');
                for(let i = 0; i < inputInfomation.length; i++) {
                    if(validate(inputInfomation[i]) != undefined){
                        showValidate(validate(inputInfomation[i]));

                        return false;
                    }
                }
            }
            if (formId == 'form-update-comment') {
                let inputComment = $('.input-comment');
                for(let i = 0; i < inputComment.length; i++) {
                    if(validate(inputComment[i]) != undefined){
                        showValidate(validate(inputComment[i]));

                        return false;
                    }
                }
            }

            return true;
        }

        $('#form-update-password').on('submit', (event) => {
            event.preventDefault();
            if(!validateFormUpdatePassword('form-update-password')) {
                return false;
            }

            let currentPassword = $('input[name=current-password]').val().trim();
            let newPassword = $('input[name=new-password]').val().trim();
            let confirmPassword = $('input[name=confirm-password]').val().trim();
            $.ajax({
                url: '/user-features/password/' + currentPassword + '/' + newPassword + '/' + confirmPassword,
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                },
            })
            .done(function() {
                Swal.fire({
                    title: 'Updated!',
                    text: 'Updated your password!',
                    icon: 'success'
                });
            })
            .fail(function() {
                Swal.fire({
                    title: 'Failed!',
                    text: 'Some thing went wrong! Try again',
                    icon: 'error'
                });
            });
        });

        $('#form-update-infomation').on('submit', (event) => {
            event.preventDefault();
            if(!validateFormUpdatePassword('form-update-infomation')) {
                return false;
            }

            let name = $('input[name=name]').val().trim();
            $.ajax({
                url: '/user-features/infomations/' + name,
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                },
            })
            .done(() => {
                Swal.fire({
                    title: 'Updated!',
                    text: 'Updated your infomation!',
                    icon: 'success'
                });
                $('.dynamic-name').html(name);
            })
            .fail(() => {
                Swal.fire({
                    title: 'Failed!',
                    text: 'Some thing went wrong! Try again',
                    icon: 'error'
                });
            });
        });

        $('#tbl-comments').on('click', '.btn-edit', function(event) {
            event.preventDefault();

            $('input[name=comment]').val($(this).data('comment'));
            $('input[name=post-id]').val($(this).data('post'));
            $('#modal-edit-comment').modal('show');
        });

        $('#btn-update-comment').on('click', function(event) {
            event.preventDefault();
            if(!validateFormUpdatePassword('form-update-comment')) {
                return false;
            }

            let comment = $('input[name=comment]').val();
            let postId = $('input[name=post-id]').val();
            $.ajax({
                url: '/user-features/comments/' + comment + '/' + postId,
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                },
            })
            .done(() => {
                Swal.fire({
                    title: 'Updated!',
                    text: 'Updated your comments!',
                    icon: 'success'
                });
                $('td[data-id=' + postId + '-{{ Auth::id() }}]').html(comment);
            })
            .fail(() => {
                Swal.fire({
                    title: 'Failed!',
                    text: 'Some thing went wrong! Try again',
                    icon: 'error'
                });
            });
        });
    </script>
@endsection
