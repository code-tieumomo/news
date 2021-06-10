@extends('admin.layout.app')

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Hi! Welcome Back {{ Auth::user()->name }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a><i class="fe fe-home mr-2 fs-14"></i>Analyst</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row-1 -->
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden dash1-card border-0">
                <div class="card-body">
                    <p class=" mb-1 ">Total Posts</p>
                    <h2 class="mb-1 number-font">{{ $totalPosts }}</h2>
                    <small class="fs-12 text-muted">posts</small>
                    <span class="ratio bg-warning"></span>
                    <span class="ratio-text text-muted"></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden dash1-card border-0">
                <div class="card-body">
                    <p class=" mb-1 ">Total User</p>
                    <h2 class="mb-1 number-font">{{ $totalUsers }}</h2>
                    <small class="fs-12 text-muted">users</small>
                    <span class="ratio bg-info"></span>
                    <span class="ratio-text text-muted"></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden dash1-card border-0">
                <div class="card-body">
                    <p class=" mb-1 ">Total Writer</p>
                    <h2 class="mb-1 number-font">{{ $totalWriters }}</h2>
                    <small class="fs-12 text-muted">writers</small>
                    <span class="ratio bg-danger"></span>
                    <span class="ratio-text text-muted"></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden dash1-card border-0">
                <div class="card-body">
                    <p class=" mb-1">Total Comments</p>
                    <h2 class="mb-1 number-font">{{ $totalComments }}</h2>
                    <small class="fs-12 text-muted">comments</small>
                    <span class="ratio bg-success"><a href="#"></a></span>
                    <span class="ratio-text text-muted"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row-1 -->

    <div class="row">
        <div class="col-xl-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Views per day</h3>
                </div>
                <div class="card-body">
                    <canvas id="viewChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12">
            <div class="card">
                 <div class="card-header">
                    <h3 class="card-title">Posts published per day</h3>
                </div>
                <div class="card-body">
                    <canvas id="postChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Row-3 -->
    <div class="row">
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Users</h3>
                    <div class="card-options">
                        <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="/admin/users" class="dropdown-item">View all</a>
                        </div>
                    </div>
                </div>
                <div id="card-recent-users" class="card-body">
                    @foreach ($recentUsers as $user)
                        <div class="list-card">
                            <span class="bg-primary list-bar"></span>
                            <div class="row align-items-center">
                                <div class="col-9 col-sm-9">
                                    <div class="media mt-0">
                                        <img src="{{ asset('client-assets/images/users/user-sample.png') }}" alt="img" class="avatar brround avatar-md mr-3">
                                        <div class="media-body">
                                            <div class="d-md-flex align-items-center mt-1">
                                                <h6 class="mb-1">{{ $user->name }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Writers</h3>
                    <div class="card-options">
                        <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="/admin/writers" class="dropdown-item">View all</a>
                        </div>
                    </div>
                </div>
                <div id="card-recent-writers" class="card-body">
                    @foreach ($recentWriters as $user)
                        <div class="list-card">
                            <span class="bg-primary list-bar"></span>
                            <div class="row align-items-center">
                                <div class="col-9 col-sm-9">
                                    <div class="media mt-0">
                                        <img src="{{ asset('client-assets/images/users/user-sample.png') }}" alt="img" class="avatar brround avatar-md mr-3">
                                        <div class="media-body">
                                            <div class="d-md-flex align-items-center mt-1">
                                                <h6 class="mb-1">{{ $user->name }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between">
                        <div>
                            <p class=" mb-1 fs-14">Posts</p>
                            <h2 class="mb-0"><span class="number-font1">{{ $totalPosts }}</span><span class="ml-2 text-muted fs-11"><span class="text-danger"></h2>

                        </div>
                        <span class="text-primary fs-35 dash1-iocns bg-primary-transparent border-primary"><i class="fa fa-file-text-o"></i></span>
                    </div>
                    <div class="d-flex mt-4">
                        <div>
                            <a href="/admin/manage-posts"><span class="text-muted fs-12 mr-1">Manage all posts <i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between">
                        <div>
                            <p class=" mb-1 fs-14">Writer Requests</p>
                            <h2 class="mb-0"><span class="number-font1">{{ $totalWriterRequest }}</span><span class="ml-2 text-muted fs-11"><span class="text-success"></h2>
                        </div>
                        <span class="text-info fs-35 bg-info-transparent border-info dash1-iocns"><i class="fa fa-pencil"></i></span>
                    </div>
                    <div class="d-flex mt-4">
                        <div>
                            <a href="#wr" id="count-wr"><span class="text-muted fs-12 mr-1">Manage all writer requests <i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row-3 -->

    <!--Row-->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div id="card-wr" class="card card-collapsed">
                <div class="card-header">
                    <h3 class="card-title">Recent Writer Request</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse mr-2" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-wr" class="table table-vcenter text-nowrap mb-0 table-striped table-bordered border-top">
                            <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Time</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbl-recent-pending-posts">
                                @foreach ($recentWR as $request)
                                    <tr>
                                        <td class="id">{{ $request->id }}</td>
                                        <td>{{ $request->name }}</td>
                                        <td>{{ $request->user->email }}</td>
                                        <td>{{ $request->created_at->toFormattedDateString() }}</td>
                                        <td>{{ $request->phone }}</td>
                                        <td>{{ $request->address }}</td>
                                        <td><a href="/admin/file/cv/{{ $request->id }}" class="badge badge-warning">View CV</a></td>
                                        <td><a href="/admin/file/sample/{{ $request->id }}" class="badge badge-warning">View Sample Article</a></td>
                                        <td>
                                            <a href="#approve" class="btn-approve badge badge-success">Approve</a>
                                            <a href="#deny" class="btn-deny badge badge-danger">Deny</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End row-->
@endsection

@section('custom-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
    <script>
        let viewChartContext = document.getElementById('viewChart').getContext('2d');
        let viewChart = new Chart(viewChartContext, {
            type: 'line',
            data: {
                labels: [@php 
                    echo '\'' . implode('\', \'', array_keys($viewPerDay)) . '\'';
                @endphp],
                datasets: [{
                    label: 'Views per day',
                    data: [@php 
                        echo implode(', ', array_values($viewPerDay));
                    @endphp],
                    fill: false,
                    borderColor: '#705ec8',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        let postChartContext = document.getElementById('postChart').getContext('2d');
        let postChart = new Chart(postChartContext, {
            type: 'line',
            data: {
                labels: [@php 
                    echo '\'' . implode('\', \'', array_keys($viewPerDay)) . '\'';
                @endphp],
                datasets: [{
                    label: 'Views per day',
                    data: [@php 
                        echo implode(', ', array_values($postPerDay));
                    @endphp],
                    fill: false,
                    borderColor: '#705ec8',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        $('#table-wr').on('click', '.btn-deny', function(event) {
            event.preventDefault();

            $(this).html('Denying');
            let btn = $(this);
            let row = $(this).parent().parent();
            let id = row.find('.id').html();
            $.ajax({
                url: '/admin/writers/deny-writer-request/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    row.remove();
                    Swal.fire({
                        title: 'Success!',
                        text: 'Denied request!',
                        icon: 'success'
                    });
                },
            });
        });

        $('#table-wr').on('click', '.btn-approve', function(event) {
            event.preventDefault();

            $(this).html('Approving');
            let btn = $(this);
            let row = $(this).parent().parent();
            let id = row.find('.id').html();
            $.ajax({
                url: '/admin/writers/approve-writer-request/' + id,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    row.remove();
                    Swal.fire({
                        title: 'Success!',
                        text: 'Approved request!',
                        icon: 'success'
                    });
                },
            });
        });

        $('#count-wr').on('click', function(event) {
            event.preventDefault();

            $('#card-wr').removeClass('card-collapsed');
            window.location.href = '/admin/dashboard/#card-wr';
        });
    </script>
@endsection
