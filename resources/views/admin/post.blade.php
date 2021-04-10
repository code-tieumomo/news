@extends('admin.layout.app')

@section('custom-css')
    <!-- Data table css -->
    <link href="{{ asset('admin-assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}"  rel="stylesheet">
    <link href="{{ asset('admin-assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Manage Posts</h4>
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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Posts DataTable</div>
                </div>
                <div id="card-posts-datatable" class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="tbl-posts">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">ID</th>
                                    <th class="wd-15p border-bottom-0">Title</th>
                                    <th class="wd-20p border-bottom-0">Writer</th>
                                    <th class="wd-15p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr id="{{ $post->id }}">
                                        <td>{{ $post->id }}</td>
                                        <td data-id="{{ $post->id }}" data-title="{{ $post->title }}" class="show-post-detail">
                                            <b>{{ $post->title }}</b>
                                        </td>
                                        <td>{{ $post->user->name }}</td>
                                        <td><a data-id="{{ $post->id }}" class="btn btn-danger btn-delete">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="card-loader" class="card-body">
                    <div class="dimmer active">
                        <div class="lds-hourglass"></div>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>
    </div>
    <!-- /Row -->
@endsection

@section('custom-js')
    <!-- INTERNAL Data tables -->
    <script src="{{ asset('admin-assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        document.title = 'Manage Posts | UET-News';
        $('#menu-post').addClass('active');
        $('#card-loader').hide();

        $('#tbl-posts').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });

        $('#tbl-posts').on('click', '.show-post-detail', function(event) {
            event.preventDefault();
            
            var id = $(this).data('id');
            Swal.fire({
                title: 'View post detail?',
                icon: 'info',
                text: $(this).data('title'),
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, view post!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/admin/posts/' + id;
                }
            });
        });

        $('#tbl-posts').on('click', '.btn-delete', function(event) {
            event.preventDefault();

            var id = $(this).data('id');
            deletePost(id);
        });

        function deletePost(id)
        {
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
                        url: '/admin/posts/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        beforeSend: function() {
                            $('#card-posts-datatable').hide();
                            $('#card-loader').show();
                        }
                    })
                    .done(function(response) {
                        $('#card-posts-datatable').show();
                        $('#card-loader').hide();
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
                        $('#card-posts-datatable').show();
                        $('#card-loader').hide();
                        Swal.fire(
                            'Oops!',
                            'Something went wrong! Please try later.',
                            'error'
                        );
                    });
                }
            });
        }
    </script>
@endsection
