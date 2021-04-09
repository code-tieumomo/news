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
            <h4 class="page-title mb-0">Manage Users</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a><i class="fe fe-layout  mr-2 fs-14"></i>CRUD</a></li>
                <li class="breadcrumb-item"><a></i>Users</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('users.index') }}">Users</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Users DataTable</div>
                </div>
                <div id="card-users-datatable" class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="tbl-users">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">ID</th>
                                    <th class="wd-15p border-bottom-0">Name</th>
                                    <th class="wd-20p border-bottom-0">Email</th>
                                    <th class="wd-15p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-password="{{ $user->password }}" data-remember-token="{{ $user->remember_token }}" data-created-at="{{ $user->created_at }}" data-updated-at="{{ $user->updated_at }}" class="show-user-detail">
                                            {{ $user->name }}
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td><a data-id="{{ $user->id }}" class="btn btn-danger btn-delete">Delete</a></td>
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

    <!-- Modal -->
    <div class="modal" id="modal-user-detail">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Detail infomation for <span id="modal-name"></span></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <table class="table border mb-0 dtr-details">
                        <tr>
                            <td>ID</td>
                            <td id="modal-tbl-id"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td id="modal-tbl-name"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="modal-tbl-email"></td>
                        </tr>
                        <tr>
                            <td>Password after hash</td>
                            <td id="modal-tbl-password"></td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td><span class="badge badge-secondary">User</span></td>
                        </tr>
                        <tr>
                            <td>Remember token</td>
                            <td id="modal-tbl-remember-token"></td>
                        </tr>
                        <tr>
                            <td>Created date</td>
                            <td id="modal-tbl-created-at"></td>
                        </tr>
                        <tr>
                            <td>Last modified date</td>
                            <td id="modal-tbl-updated-at"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><a id="modal-btn-delete" class="btn btn-danger">Delete this user</a></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <!-- INTERNAL Data tables -->
    <script src="{{ asset('admin-assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        document.title = 'Manage Users | UET-News';
        $('#menu-user').addClass('active');
        $('#sub-menu-user').addClass('active');
        $('#list-menu-user').addClass('is-expanded');
        $('#card-loader').hide();

        $('#tbl-users').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });

        $('#tbl-users').on('click', '.show-user-detail', function(event) {
            event.preventDefault();
            
            $('#modal-name').html($(this).data('name'));
            $('#modal-tbl-id').html($(this).data('id'));
            $('#modal-tbl-name').html('<b>' + $(this).data('name') + '</b>');
            $('#modal-tbl-email').html($(this).data('email'));
            $('#modal-tbl-password').html($(this).data('password'));
            $('#modal-tbl-remember-token').html($(this).data('remember-token'));
            $('#modal-tbl-created-at').html($(this).data('created-at'));
            $('#modal-tbl-updated-at').html($(this).data('updated-at'));
            $('#modal-user-detail').modal('show');
        });

        $('#tbl-users').on('click', '.btn-delete', function(event) {
            event.preventDefault();

            var id = $(this).data('id');
            deleteUser(id);
        });

        $('#modal-btn-delete').on('click', function(event) {
            event.preventDefault();
            
            var id = $('td[id="modal-tbl-id"]').html();
            deleteUser(id);
        });

        function deleteUser(id)
        {
            Swal.fire({
                title: 'Are you sure?',
                text: "All user's comment will be delete too!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'users/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        beforeSend: function() {
                            $('#card-users-datatable').hide();
                            $('#card-loader').show();
                        }
                    })
                    .done(function(response) {
                        $('#card-users-datatable').show();
                        $('#card-loader').hide();
                        if (response == 'success'){
                            $('#modal-user-detail').modal('hide');
                            $('tr[id=' + id + ']').remove();
                            Swal.fire(
                                'Deleted!',
                                'User has been deleted.',
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
                        $('#card-users-datatable').show();
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
