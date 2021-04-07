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
                        <a href="#" class="option-dots"><i class="fe fe-arrow-right fs-20"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($recentUsers as $recentUser)
                        <div class="list-card">
                            <span class="bg-info list-bar"></span>
                            <div class="row align-items-center">
                                <div class="col-9 col-sm-9">
                                    <div class="media mt-0">
                                        <img src="admin-assets/images/users/{{ $recentUser->id }}.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                        <div class="media-body">
                                            <div class="d-md-flex align-items-center mt-1">
                                                <h6 class="mb-1">{{ $recentUser->name }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3">
                                    <div class="text-right">
                                        <span class="font-weight-semibold fs-16 number-font">#{{ $recentUser->id }}</span>
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
                            <button id="btn-refresh-recent-writers" class="dropdown-item">Refresh</button>
                            <button class="dropdown-item">View all</button>
                        </div>
                    </div>
                </div>
                <div id="card-recent-writers" class="card-body">
                    @foreach($recentWriters as $rencentWriter)
                        <div class="list-card">
                            <span class="bg-primary list-bar"></span>
                            <div class="row align-items-center">
                                <div class="col-9 col-sm-9">
                                    <div class="media mt-0">
                                        <img src="admin-assets/images/users/{{ $rencentWriter->id }}.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                        <div class="media-body">
                                            <div class="d-md-flex align-items-center mt-1">
                                                <h6 class="mb-1">{{ $rencentWriter->name }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3">
                                    <div class="text-right">
                                        <span class="font-weight-semibold fs-16 number-font">#{{ $rencentWriter->id }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-4  col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between">
                        <div>
                            <p class=" mb-1 fs-14">Users</p>
                            <h2 class="mb-0"><span class="number-font1">12,769</span><span class="ml-2 text-muted fs-11"><span class="text-danger"><i class="fa fa-caret-down"></i> 43.2</span> this month</span></h2>

                        </div>
                        <span class="text-primary fs-35 dash1-iocns bg-primary-transparent border-primary"><i class="las la-users"></i></span>
                    </div>
                    <div class="d-flex mt-4">
                        <div>
                            <span class="text-muted fs-12 mr-1">Last Month</span>
                            <span class="number-font fs-12"><i class="fa fa-caret-up mr-1 text-success"></i>10,876</span>
                        </div>
                        <div class="ml-auto">
                            <span class="text-muted fs-12 mr-1">Last Year</span>
                            <span class="number-font fs-12"><i class="fa fa-caret-down mr-1 text-danger"></i>88,345</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between">
                        <div>
                            <p class=" mb-1 fs-14">Sales</p>
                            <h2 class="mb-0"><span class="number-font1">$34,789</span><span class="ml-2 text-muted fs-11"><span class="text-success"><i class="fa fa-caret-up"></i> 19.8</span> this month</span></h2>
                        </div>
                        <span class="text-secondary fs-35 dash1-iocns bg-secondary-transparent border-secondary"><i class="las la-hand-holding-usd"></i></span>
                    </div>
                    <div class="d-flex mt-4">
                        <div>
                            <span class="text-muted fs-12 mr-1">Last Month</span>
                            <span class="number-font fs-12"><i class="fa fa-caret-up mr-1 text-success"></i>$12,786</span>
                        </div>
                        <div class="ml-auto">
                            <span class="text-muted fs-12 mr-1">Last Year</span>
                            <span class="number-font fs-12"><i class="fa fa-caret-down mr-1 text-danger"></i>$89,987</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between">
                        <div>
                            <p class=" mb-1 fs-14">Subscribers</p>
                            <h2 class="mb-0"><span class="number-font1">4,876</span><span class="ml-2 text-muted fs-11"><span class="text-success"><i class="fa fa-caret-up"></i> 0.8%</span> this month</span></h2>
                        </div>
                        <span class="text-info fs-35 bg-info-transparent border-info dash1-iocns"><i class="las la-thumbs-up"></i></span>
                    </div>
                    <div class="d-flex mt-4">
                        <div>
                            <span class="text-muted fs-12 mr-1">Last Month</span>
                            <span class="number-font fs-12"><i class="fa fa-caret-up mr-1 text-success"></i>1,034</span>
                        </div>
                        <div class="ml-auto">
                            <span class="text-muted fs-12 mr-1">Last Year</span>
                            <span class="number-font fs-12"><i class="fa fa-caret-down mr-1 text-danger"></i>8,610</span>
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Client Activity</h3>
                    <div class="card-options">
                        <a href="#" class="option-dots"><i class="fe fe-more-horizontal fs-20"></i></a>
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

    <!-- Row-2 -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Client Activity</h3>
                    <div class="card-options">
                        <a href="#" class="option-dots"><i class="fe fe-more-horizontal fs-20"></i></a>
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
                    <h3 class="card-title">Top Product Sales Overview</h3>
                    <div class="card-options">
                        <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Last Week</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap mb-0 table-striped table-bordered border-top">
                            <thead class="">
                                <tr>
                                    <th>Product</th>
                                    <th>Sold</th>
                                    <th>Record point</th>
                                    <th>Stock</th>
                                    <th>Amount</th>
                                    <th>Stock Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="admin-assets/images/orders/7.jpg" alt="media1"> New Book</td>
                                    <td><span class="badge badge-primary">18</span></td>
                                    <td>05</td>
                                    <td>112</td>
                                    <td class="number-font">$ 2,356</td>
                                    <td><i class="fa fa-check mr-1 text-success"></i> In Stock</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="admin-assets/images/orders/8.jpg" alt="media1"> New Bowl</td>
                                    <td><span class="badge badge-info">10</span></td>
                                    <td>04</td>
                                    <td>210</td>
                                    <td class="number-font">$ 3,522</td>
                                    <td><i class="fa fa-check text-success"></i> In Stock</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="admin-assets/images/orders/9.jpg" alt="media1"> Modal Car</td>
                                    <td><span class="badge badge-secondary">15</span></td>
                                    <td>05</td>
                                    <td>215</td>
                                    <td class="number-font">$ 5,362</td>
                                    <td><i class="fa fa-check text-success"></i> In Stock</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="admin-assets/images/orders/10.jpg" alt="media1"> Headset</td>
                                    <td><span class="badge badge-primary">21</span></td>
                                    <td>07</td>
                                    <td>102</td>
                                    <td class="number-font">$ 1,326</td>
                                    <td><i class="fa fa-check text-success"></i> In Stock</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="admin-assets/images/orders/12.jpg" alt="media1"> Watch</td>
                                    <td><span class="badge badge-danger">34</span></td>
                                    <td>10</td>
                                    <td>325</td>
                                    <td class="number-font">$ 5,234</td>
                                    <td><i class="fa fa-check text-success"></i> In Stock</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="admin-assets/images/orders/13.jpg" alt="media1"> Branded Shoes</td>
                                    <td><span class="badge badge-success">11</span></td>
                                    <td>04</td>
                                    <td>0</td>
                                    <td class="number-font">$ 3,256</td>
                                    <td><i class="fa fa-exclamation-triangle text-warning"></i> Out of stock</td>
                                </tr>
                                <tr class="mb-0">
                                    <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="admin-assets/images/orders/11.jpg" alt="media1"> New EarPhones</td>
                                    <td><span class="badge badge-warning">60</span></td>
                                    <td>10</td>
                                    <td>0</td>
                                    <td class="number-font">$ 7,652</td>
                                    <td><i class="fa fa-exclamation-triangle text-danger"></i> Out of stock</td>
                                </tr>
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
        $('#btn-refresh-recent-writers').on('click', function(event) {
            event.preventDefault();
            
            $.ajax({
                url: '{{ route('writer.recentWriters') }}',
                type: 'GET',
            })
            .done(function(response) {
                $('#card-recent-writers').empty();

                response['recentWriters'].forEach(function(writer) {
                    var html = `
                        <div class="list-card">
                            <span class="bg-primary list-bar"></span>
                            <div class="row align-items-center">
                                <div class="col-9 col-sm-9">
                                    <div class="media mt-0">
                                        <img src="admin-assets/images/users/${writer['id']}.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                        <div class="media-body">
                                            <div class="d-md-flex align-items-center mt-1">
                                                <h6 class="mb-1">${writer['name']}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3">
                                    <div class="text-right">
                                        <span class="font-weight-semibold fs-16 number-font">#${writer['id']}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#card-recent-writers').append(html);
                });
            })
            .fail(function() {
                console.log("error");
            });

            console.log("Complete refresh !");
        });

        // setInterval(refreshRecentWriters, 2000);

        // function refreshRecentWriters() {
        //     $.ajax({
        //         url: '{{-- route('writer.recentWriters') --}}',
        //         type: 'GET',
        //     })
        //     .done(function(response) {
        //         $('#card-recent-writers').empty();

        //         response['recentWriters'].forEach(function(writer) {
        //             var html = `
        //                 <div class="list-card">
        //                     <span class="bg-primary list-bar"></span>
        //                     <div class="row align-items-center">
        //                         <div class="col-9 col-sm-9">
        //                             <div class="media mt-0">
        //                                 <img src="admin-assets/images/users/${writer['id']}.jpg" alt="img" class="avatar brround avatar-md mr-3">
        //                                 <div class="media-body">
        //                                     <div class="d-md-flex align-items-center mt-1">
        //                                         <h6 class="mb-1">${writer['name']}</h6>
        //                                     </div>
        //                                 </div>
        //                             </div>
        //                         </div>
        //                         <div class="col-3 col-sm-3">
        //                             <div class="text-right">
        //                                 <span class="font-weight-semibold fs-16 number-font">#${writer['id']}</span>
        //                             </div>
        //                         </div>
        //                     </div>
        //                 </div>
        //             `;
        //             $('#card-recent-writers').append(html);
        //         });
        //     })
        //     .fail(function() {
        //         console.log("error");
        //     });

        //     console.log("Complete refresh !");
        // }
         
        
    </script>
@endsection
