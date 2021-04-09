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
            <h4 class="page-title mb-0">Manage Writers</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a><i class="fe fe-layout  mr-2 fs-14"></i>CRUD</a></li>
                <li class="breadcrumb-item"><a></i>Writers</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('writers.index') }}">Writers</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Writers DataTable</div>
                </div>
                <div id="card-writers-datatable" class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="tbl-writers">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">ID</th>
                                    <th class="wd-15p border-bottom-0">Name</th>
                                    <th class="wd-20p border-bottom-0">Email</th>
                                    <th class="wd-15p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($writers as $writer)
                                    <tr id="{{ $writer->id }}">
                                        <td>{{ $writer->id }}</td>
                                        <td data-id="{{ $writer->id }}" data-name="{{ $writer->name }}" data-email="{{ $writer->email }}" data-password="{{ $writer->password }}" data-remember-token="{{ $writer->remember_token }}" data-created-at="{{ $writer->created_at }}" data-updated-at="{{ $writer->updated_at }}" class="show-writer-detail">
                                            {{ $writer->name }}
                                        </td>
                                        <td>{{ $writer->email }}</td>
                                        <td>
                                            <a data-id="{{ $writer->id }}" class="btn btn-danger btn-delete">Delete</a>
                                            <a data-id="{{ $writer->id }}" class="btn btn-warning btn-remove">Remove write permission</a>
                                        </td>
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
    <div class="modal" id="modal-writer-detail">
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
                            <td><span class="badge badge-warning">Writer</span></td>
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
                            <td colspan="2">
                                <a id="modal-btn-delete" class="btn btn-danger">Delete this writer</a>
                                <a id="modal-btn-remove" class="btn btn-warning">Remove write permission</a>
                            </td>
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
        document.title = 'Manage Writers | UET-News';
        $('#menu-user').addClass('active');
        $('#sub-menu-writer').addClass('active');
        $('#list-menu-user').addClass('is-expanded');
        $('#card-loader').hide();

        $('#tbl-writers').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });

        $('#tbl-writers').on('click', '.show-writer-detail', function(event) {
            event.preventDefault();
            
            $('#modal-name').html($(this).data('name'));
            $('#modal-tbl-id').html($(this).data('id'));
            $('#modal-tbl-name').html('<b>' + $(this).data('name') + '</b>');
            $('#modal-tbl-email').html($(this).data('email'));
            $('#modal-tbl-password').html($(this).data('password'));
            $('#modal-tbl-remember-token').html($(this).data('remember-token'));
            $('#modal-tbl-created-at').html($(this).data('created-at'));
            $('#modal-tbl-updated-at').html($(this).data('updated-at'));
            $('#modal-writer-detail').modal('show');
        });

        $('#tbl-writers').on('click', '.btn-delete', function(event) {
            event.preventDefault();

            var id = $(this).data('id');
            deleteWriter(id);
        });

        $('#modal-btn-delete').on('click', function(event) {
            event.preventDefault();
            
            var id = $('td[id="modal-tbl-id"]').html();
            deleteWriter(id);
        });

        $('#tbl-writers').on('click', '.btn-remove', function(event) {
            event.preventDefault();

            var id = $(this).data('id');
            removeWritePermission(id);
        });

        $('#modal-btn-remove').on('click', function(event) {
            event.preventDefault();
            
            var id = $('td[id="modal-tbl-id"]').html();
            alert(id);
            removeWritePermission(id);
        });

        function deleteWriter(id)
        {
            Swal.fire({
                title: 'Are you sure?',
                text: "All writer's comments, posts and post's comments will be delete too!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'writers/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        beforeSend: function() {
                            $('#card-writers-datatable').hide();
                            $('#card-loader').show();
                        }
                    })
                    .done(function(response) {
                        $('#card-writers-datatable').show();
                        $('#card-loader').hide();
                        if (response == 'success'){
                            $('#modal-writer-detail').modal('hide');
                            $('tr[id=' + id + ']').remove();
                            Swal.fire(
                                'Deleted!',
                                'Writer has been deleted.',
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
                        $('#card-writers-datatable').show();
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

        function removeWritePermission(id)
        {
            Swal.fire({
                title: 'Are you sure?',
                text: "All writer's posts and post's comments will be delete too!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove permission!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'writers/remove-write-permission/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        beforeSend: function() {
                            $('#card-writers-datatable').hide();
                            $('#card-loader').show();
                        }
                    })
                    .done(function(response) {
                        $('#card-writers-datatable').show();
                        $('#card-loader').hide();
                        if (response == 'success'){
                            $('#modal-writer-detail').modal('hide');
                            $('tr[id=' + id + ']').remove();
                            Swal.fire(
                                'Removed!',
                                'Write permission has been removed.',
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
                        $('#card-writers-datatable').show();
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
