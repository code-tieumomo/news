@extends('user-features.app')

@section('title')
    Create Post | User Features
@endsection

@section('custom-css')
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
                        <a class="d-flex mr-4"><i class="fe fe-file fs-16 mr-1"></i>All fields below are require <span class="text-danger">*</span></a>
                    </div>
                    <input name="thumbnail" type="file" class="dropify" data-height="300" accept=".jpg, .png, image/jpeg, image/png">
                </div>
                <div id="card-post-detail" class="card-body">
                    <div class="py-3 mt-0 border-top">
                        <label>Category</label>
                        <select class="form-control custom-select w-100 h-10 fs-12 border" id="category" style="outline: none;">
                            <option value="" disabled selected>-- Pick an category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="py-3 mt-0 border-top">
                        <label>Subcategory</label>
                        <select id="subcategory" class="form-control custom-select w-100 h-10 fs-12 border" style="outline: none;" disabled>
                            <option value="" selected>-- Pick a category --</option>
                        </select>
                    </div>
                    <label>Title</label>
                    <a class="mt-4"><input name="title" class="font-weight-semibold w-100 h-6 fs-16 border" style="outline: none; padding: 5px 10px;" placeholder="Enter post title ..."></a>
                    <a><input name="slug" class=" w-100 h-6 fs-12 border mb-5" style="outline: none; padding: 5px 10px;" placeholder="Post's slug goes here .." disabled></a>
                    <label>Summary</label>
                    <p class="">
                        <textarea name="sumary" rows="3" class="w-100 border" placeholder="Enter post sumary" style="outline: none; padding: 5px 10px;"></textarea>
                    </p>
                    <div class="py-3 mt-0 border-top">
                        <label>Content</label>
                        <textarea id="summernote" name="content"></textarea>
                    </div>
                    <div class="media py-3 mt-0 border-top">
                        <div class="ml-auto">
                            <div class="d-flex">
                                {{-- <a href="" target="_blank" class="btn btn-success new ml-3"><i class="fe fe-arrow-up-right fs-16"></i> View this post in UET-News</a> --}}
                                <button id="btn-save" type="submit" href="javascript:void(0)" class="btn btn-warning new ml-3"><i class="fe fe-edit fs-16"></i> Save</button>
                                <button id="btn-cancel" href="javascript:void(0)" class="btn btn-danger new ml-3"><i class="fe fe-trash-2 fs-16"></i> Cancel</button>
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
        $('.note-editable').css('font-size','14px');

        function string_to_slug (str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();
          
            // remove accents, swap ñ for n, etc
            var from = "áàảãạăắặâấầậẫẩđéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỵ·/_,:;";
            var to   = "aaaaaaaaaaaaaadeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyy------";
            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }

        $(document).ready(function() {
            $('input[name=title]').on('keyup', function(event) {
                let title = $(this).val();
                let slug = string_to_slug(title);
                $('input[name=slug]').val(slug);
            })

            $('#btn-cancel').on('click', function(event) {
                event.preventDefault();

                if ($('.dropify-clear') != undefined) {
                    $('.dropify-clear').trigger('click');
                }
                $('input[name=title]').val('');
                $('textarea[name=sumary]').val('');
                $('#summernote').summernote('reset');
                $('#subcategory').html(`<option value="" selected>-- Pick a category --</option>`);
                $('#category').val('');
            });

            $('#category').on('change', function(event) {
                let id = $(this).val();
                $.ajax({
                    url: '/user-features/get-subcategories',
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                        category_id: id
                    },
                    success: function(response) {
                        $('#subcategory').empty();
                        response.forEach(function(item, index) {
                            let select = (index == 0) ? 'selected' : ''
                            let html = `
                                <option value="${item.id}" ${select}>${item.name}</option>
                            `;
                            $('#subcategory').append(html);
                            $('#subcategory').removeAttr('disabled');
                        });
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops ...',
                            text: 'Something went wrong, please try later !',
                        });
                    }
                });
            });

            $('#form-detail').on('submit', function(event) {
                event.preventDefault();

                let data = new FormData(this);
                data.append('sub_category_id', $('#subcategory').val());
                data.append('_token', '{{ csrf_token() }}');
                let slug = $('input[name=slug]').val();
                let dataToValidate = Array.from(data);
                if (dataToValidate[0][1]['name'] == undefined || dataToValidate[0][1]['name'] == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Missing thumbnail',
                        text: 'Pick a thumbnail please !',
                    });

                    return false;
                }
                if (dataToValidate[1][1] == undefined || dataToValidate[1][1] == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Missing title',
                        text: 'Enter title please !',
                    });

                    return false;
                }
                if (dataToValidate[2][1] == undefined || dataToValidate[2][1] == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Missing summary',
                        text: 'Enter summary please !',
                    });

                    return false;
                }
                if (dataToValidate[3][1] == undefined || dataToValidate[3][1] == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Missing content',
                        text: 'Enter content please !',
                    });

                    return false;
                }
                if (dataToValidate[5][1] == undefined || dataToValidate[5][1] == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Missing category',
                        text: 'Pick a category and subcategory please !',
                    });

                    return false;
                }
                $('#btn-save').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Saving');
                $('#btn-save').attr('disabled', true);

                $.ajax({
                    url: '/user-features/check-slug',
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                        slug: slug
                    },
                    success: function(response) {
                        if (response == 'duplicate') {
                            $('#btn-save').html('<i class="fe fe-edit fs-16"></i> Save');
                            $('#btn-save').removeAttr('disabled');
                            Swal.fire({
                                icon: 'error',
                                title: 'Duplicate slug',
                                text: 'You can\'t use this title because this slug has been use !',
                            });

                            return false;
                        } else {
                            $.ajax({
                                url: '/user-features/create-post',
                                type: 'POST',
                                data: data,
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function(response) {
                                    $('#btn-save').html('<i class="fe fe-edit fs-16"></i> Save');
                                    $('#btn-save').removeAttr('disabled');
                                    if (response == 'fail') {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops ...',
                                            text: 'Something went wrong, please try later !',
                                        });
                                    } else {
                                        Swal.fire(
                                            'Success!',
                                            'Post has been publish.',
                                            'success'
                                        );
                                        setTimeout(function() {
                                            window.location.replace('/user-features/manage-post/' + response);
                                        }, 1000);
                                    }
                                },
                                error: function(response) {
                                    $('#btn-save').html('<i class="fe fe-edit fs-16"></i> Save');
                                    $('#btn-save').removeAttr('disabled');
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops ...',
                                        text: 'Something went wrong, please try later !',
                                    });
                                }
                            });
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops ...',
                            text: 'Something went wrong, please try later !',
                        });
                    }
                });
            });
        });
    </script>
@endsection
