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
                    <small class="fs-12 text-muted">Compared to All Time</small>
                    <span class="ratio bg-warning">{{ round($totalPosts/1000*100) }}%</span>
                    <span class="ratio-text text-muted">Goals: 1000</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden dash1-card border-0">
                <div class="card-body">
                    <p class=" mb-1 ">Total User</p>
                    <h2 class="mb-1 number-font">{{ $totalUsers }}</h2>
                    <small class="fs-12 text-muted">Compared to All Time</small>
                    <span class="ratio bg-info">{{ round($totalUsers/1000*100) }}%</span>
                    <span class="ratio-text text-muted">Goals: 1000</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden dash1-card border-0">
                <div class="card-body">
                    <p class=" mb-1 ">Total Writer</p>
                    <h2 class="mb-1 number-font">{{ $totalWriters }}</h2>
                    <small class="fs-12 text-muted">Compared to All Time</small>
                    <span class="ratio bg-danger">{{ round($totalWriters/100*100) }}%</span>
                    <span class="ratio-text text-muted">Goals: 100</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden dash1-card border-0">
                <div class="card-body">
                    <p class=" mb-1">Total Comments</p>
                    <h2 class="mb-1 number-font">{{ $totalComments }}</h2>
                    <small class="fs-12 text-muted">Compared to All Time</small>
                    <span class="ratio bg-success"><a href="#"></a></span>
                    <span class="ratio-text text-muted"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row-1 -->

    <!-- Row-3 -->
    <div class="row">
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Users</h3>
                    <div class="card-options">
                        <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button id="btn-refresh-recent-users" class="dropdown-item">Refresh</button>
                            <button class="dropdown-item">View all</button>
                        </div>
                    </div>
                </div>
                <div id="card-recent-users" class="card-body">
                    {{-- Recent users go here --}}
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
                            <button id="btn-refresh-recent-writers" class="dropdown-item">Refresh</button>
                            <button class="dropdown-item">View all</button>
                        </div>
                    </div>
                </div>
                <div id="card-recent-writers" class="card-body">
                    {{-- Recent writers go here --}}
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
                            <a href=""><span class="text-muted fs-12 mr-1">Manage all posts <i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between">
                        <div>
                            <p class=" mb-1 fs-14">Pending Posts</p>
                            <h2 class="mb-0"><span class="number-font1">xxx</span><span class="ml-2 text-muted fs-11"><span class="text-success"></h2>
                        </div>
                        <span class="text-secondary fs-35 dash1-iocns bg-secondary-transparent border-secondary"><i class="fa fa-file-text-o"></i></span>
                    </div>
                    <div class="d-flex mt-4">
                        <div>
                            <a href=""><span class="text-muted fs-12 mr-1">Manage all pending posts <i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between">
                        <div>
                            <p class=" mb-1 fs-14">Writer Requests</p>
                            <h2 class="mb-0"><span class="number-font1">xxx</span><span class="ml-2 text-muted fs-11"><span class="text-success"></h2>
                        </div>
                        <span class="text-info fs-35 bg-info-transparent border-info dash1-iocns"><i class="fa fa-pencil"></i></span>
                    </div>
                    <div class="d-flex mt-4">
                        <div>
                            <a href=""><span class="text-muted fs-12 mr-1">Manage all writer requests <i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row-3 -->

    <!-- Row-2 -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card card-collapsed">
                <div class="card-header">
                    <h3 class="card-title">Recent Client Activites</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse mr-2" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="latest-timeline scrollbar3" id="scrollbar3">
                        <ul id="list-recent-client-activities" class="timeline mb-0">
                            {{-- Recent client activities go here --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row-2 -->

    <!-- Row-2 -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card card-collapsed">
                <div class="card-header">
                    <h3 class="card-title">Recent Admin Activities</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse mr-2" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="latest-timeline scrollbar3" id="scrollbar3">
                        <ul class="timeline mb-0">
                            <li class="mt-0">
                                <div class="d-flex"><span class="time-data">Task Finished</span><span class="ml-auto text-muted fs-11">09 June 2020</span></div>
                                <p class="text-muted fs-12"><span class="text-info">Joseph Ellison</span> finished task on<a href="#" class="font-weight-semibold"> Project Management</a></p>
                            </li>
                            <li>
                                <div class="d-flex"><span class="time-data">New Comment</span><span class="ml-auto text-muted fs-11">05 June 2020</span></div>
                                <p class="text-muted fs-12"><span class="text-info">Elizabeth Scott</span> Product delivered<a href="#" class="font-weight-semibold"> Service Management</a></p>
                            </li>
                            <li>
                                <div class="d-flex"><span class="time-data">Target Completed</span><span class="ml-auto text-muted fs-11">01 June 2020</span></div>
                                <p class="text-muted fs-12"><span class="text-info">Sonia Peters</span> finished target on<a href="#" class="font-weight-semibold"> this month Sales</a></p>
                            </li>
                            <li>
                                <div class="d-flex"><span class="time-data">Revenue Sources</span><span class="ml-auto text-muted fs-11">26 May 2020</span></div>
                                <p class="text-muted fs-12"><span class="text-info">Justin Nash</span> source report on<a href="#" class="font-weight-semibold"> Generated</a></p>
                            </li>
                            <li>
                                <div class="d-flex"><span class="time-data">Dispatched Order</span><span class="ml-auto text-muted fs-11">22 May 2020</span></div>
                                <p class="text-muted fs-12"><span class="text-info">Ella Lambert</span> ontime order delivery <a href="#" class="font-weight-semibold">Service Management</a></p>
                            </li>
                            <li>
                                <div class="d-flex"><span class="time-data">New User Added</span><span class="ml-auto text-muted fs-11">19 May 2020</span></div>
                                <p class="text-muted fs-12"><span class="text-info">Nicola  Blake</span> visit the site<a href="#" class="font-weight-semibold"> Membership allocated</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row-2 -->

    <!--Row-->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Pending Post</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse mr-2" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap mb-0 table-striped table-bordered border-top">
                            <thead class="">
                                <tr>
                                    <th>Title</th>
                                    <th>Writer</th>
                                    <th>Sumary</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbl-recent-pending-posts">
                                {{-- Recent pending post go here --}}
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
    <script type="text/javascript">
        $('#menu-dashboard').addClass('active');

        var database = firebase.database();
        var recentWritersRef = database.ref('recentWriters');
        recentWritersRef.on('value', (snapshot) => {
            $('#card-recent-writers').empty();
            const recentWriters = snapshot.val();
            Object.entries(recentWriters).forEach(function(recentWriter, order) {
                var html = `
                    <div class="list-card">
                        <span class="bg-primary list-bar"></span>
                        <div class="row align-items-center">
                            <div class="col-9 col-sm-9">
                                <div class="media mt-0">
                                    <img src="/admin-assets/images/users/${recentWriter['0']}.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                    <div class="media-body">
                                        <div class="d-md-flex align-items-center mt-1">
                                            <h6 class="mb-1">${recentWriter['1']}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-sm-3">
                                <div class="text-right">
                                    <span class="font-weight-semibold fs-16 number-font">#${recentWriter['0']}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                $('#card-recent-writers').prepend(html);
            });
        });

        var recentUsersRef = database.ref('recentUsers');
        recentUsersRef.on('value', (snapshot) => {
            $('#card-recent-users').empty();
            const recentUsers = snapshot.val();
            Object.entries(recentUsers).forEach(function(recentUser, order) {
                var html = `
                    <div class="list-card">
                        <span class="bg-primary list-bar"></span>
                        <div class="row align-items-center">
                            <div class="col-9 col-sm-9">
                                <div class="media mt-0">
                                    <img src="/admin-assets/images/users/${recentUser['0']}.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                    <div class="media-body">
                                        <div class="d-md-flex align-items-center mt-1">
                                            <h6 class="mb-1">${recentUser['1']}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-sm-3">
                                <div class="text-right">
                                    <span class="font-weight-semibold fs-16 number-font">#${recentUser['0']}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                $('#card-recent-users').prepend(html);
            });
        });

        var recentClientActivitiesRef = database.ref('recentClientActivities').orderByKey().limitToLast(6);
        recentClientActivitiesRef.on('value', (snapshot) => {
            $('#list-recent-client-activities').empty();
            const recentClientActivities = snapshot.val();
            Object.entries(recentClientActivities).forEach(([key, activity]) => {
                var html = `
                    <li class="mt-0">
                        <div class="d-flex"><span class="time-data">${activity['activity']}</span><span class="ml-auto text-muted fs-11">${activity['time']}</span></div>
                        <p class="text-muted fs-12"><span class="text-info">${activity['description']}</a></p>
                    </li>
                `;
                $('#list-recent-client-activities').prepend(html);
            });
        });

        var recentPendingPostsRef = database.ref('recentPendingPosts').orderByKey().limitToLast(6);
        recentPendingPostsRef.on('value', (snapshot) => {
            $('#tbl-recent-pending-posts').empty();
            const recentPendingPosts = snapshot.val();
            Object.entries(recentPendingPosts).forEach(([key, post]) => {
                var html = `
                    <tr class="mb-0">
                        <td class="font-weight-bold">${post['title'].substr(0, 40) + ' ...'}</td>
                        <td>${post['writer']}</td>
                        <td>${post['sumary'].substr(0, 40) + ' ...'}</td>
                        <td><a href="#"><span class="badge badge-success">Approve</span></a></td>
                        <td><a href="#"><span class="badge badge-danger">Deny</span></a></td>
                    </tr>
                `;
                $('#tbl-recent-pending-posts').prepend(html);
            });
        });
    </script>
@endsection
