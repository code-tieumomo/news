@extends('user-features.app')

@section('title')
    Create Post | User Features
@endsection

@section('custom-css')
    <!-- Simplebar css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/simplebar/css/simplebar.css') }}">
    <!-- INTERNAL File Uploads css -->
    <link href="{{ asset('admin-assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!-- INTERNAL File Uploads css-->
    <link href="{{ asset('admin-assets/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Create Post</h4>
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
                <div class="item7-card-img px-4 pt-4">
                    <div class="item7-card-desc d-md-flex mb-5">
                        <a class="d-flex mr-4"><i class="fe fe-file fs-16 mr-1"></i> To change post's thumbnail, choose a file below.</a>
                    </div>
                    <input name="thumbnail" type="file" class="dropify" data-height="300" accept=".jpg, .png, image/jpeg, image/png">
                </div>
                <div id="card-post-detail" class="card-body">
                    <a class="mt-4"><input name="title" class="font-weight-semibold w-100 h-6 fs-16 border mb-5" style="outline: none; padding: 5px 10px;" placeholder="Enter post title ..."></a>
                    <p class="">
                        <textarea name="sumary" rows="3" class="w-100 border" placeholder="Enter post sumary" style="outline: none; padding: 5px 10px;"></textarea>
                    </p>
                    <div class="py-3 mt-0 border-top">
                        <textarea id="summernote" name="content"></textarea>
                    </div>
                    <div class="media py-3 mt-0 border-top">
                        <div class="ml-auto">
                            <div class="d-flex">
                                <a href="" target="_blank" class="btn btn-success new ml-3"><i class="fe fe-arrow-up-right fs-16"></i> View this post in UET-News</a>
                                <button type="submit" id="btn-edit-post" href="javascript:void(0)" class="btn btn-warning new ml-3"><i class="fe fe-edit fs-16"></i> Save</button>
                                <button id="btn-delete-post" href="javascript:void(0)" class="btn btn-danger new ml-3"><i class="fe fe-trash-2 fs-16"></i> Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--End Row-->
@endsection

@section('custom-js')
    <!--INTERNAL Index js-->
    <script src="{{ asset('admin-assets/js/index1.js') }}"></script>
    <!-- Simplebar JS -->
    <script src="{{ asset('admin-assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
        $('#summernote').summernote({
            placeholder: 'Content goes here ...',
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
            ]
        });
    </script>
@endsection
