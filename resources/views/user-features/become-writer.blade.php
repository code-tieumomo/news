@extends('user-features.app')

@section('title', 'Become Writer | User Features')

@section('custom-css')
    <!-- INTERNAL File Uploads css -->
    <link href="{{ asset('admin-assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <!-- INTERNAL File Uploads css-->
    <link href="{{ asset('admin-assets/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">✒️ Become Writer</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user-features.index') }}"><i class="fe fe-layers mr-2 fs-14"></i>User Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('request.show-become-writer') }}">Become Writer</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    @isset (Auth::user()->becomeWriter)
        <div class="row main-row">
            <div class="col-md-12 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <p class="card-text">⚠️ You sent a request in {{ Auth::user()->becomeWriter->created_at }}. We will contact you as soon as possible.</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Row -->
        <form id="form-become-writer" class="row main-row" enctype="multipart/form-data">
            <div class="col-lg-12 col-md-12">
                <div class="expanel expanel-default mt-4">
                    <div class="expanel-body">
                        <span>✏️ Fill out your contact information below, attach a sample article and your CV. We will contact you as soon as possible.<br><span class="text-danger">🛑 Sample article and CV must be PDF file</span></span>
                    </div>
                </div>
                <div  class="card">
                    <div class="card-header">
                        <h3 class="card-title">Your Infomation</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <div class="input-group">
                                <input name="name" type="text" class="form-control input-become-writer" placeholder="Your name" value="{{ Auth::user()->name }}" data-required="Name can not be null">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your email" value="{{ Auth::user()->email }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone</label>
                            <div class="input-group">
                                <input name="phone" type="number" class="form-control input-become-writer" placeholder="Your phone number" data-required="Phone can not be null">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <div class="input-group">
                                <input name="address" type="text" class="form-control input-become-writer" placeholder="Your address" data-required="Address can not be null">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div method="post" class="card">
                    <div class="card-header">
                        <h3 class="card-title">A Sample Article</h3>
                    </div>
                    <div class=" card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <input name="sample_article" type="file" class="dropify input-become-writer" data-height="150" data-required="Sample article are required" accept=".pdf"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div method="post" class="card">
                    <div class="card-header">
                        <h3 class="card-title">Your CV</h3>
                    </div>
                    <div class=" card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <input name="cv" type="file" class="dropify input-become-writer" data-height="150" data-required="CV are required" accept=".pdf"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <button id="btn-submit" type="submit" class="btn btn-primary mr-3"><i class="fe fe-upload mr-2"></i>Send Request</button>
                            <button type="reset" class="btn btn-danger"><i class="fe fe-trash mr-2"></i>Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endisset
@endsection

@section('custom-js')
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

    <script>
        validate = (input) => {
            if ($(input).val() == undefined || $(input).val().length <= 0) {
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

        validateFormUpdatePassword = () => {
            let inputBecomeWriter = $('.input-become-writer');
            for(let i = 0; i < inputBecomeWriter.length; i++) {
                if(validate(inputBecomeWriter[i]) != undefined){
                    showValidate(validate(inputBecomeWriter[i]));

                    return false;
                }
            }

            return true;
        }


        $('#form-become-writer').on('submit', function(event) {
            event.preventDefault();
            if (!validateFormUpdatePassword()) {
                return false;
            }

            $('#btn-submit').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Saving');
            $('#btn-submit').attr('disabled', true);

            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: '/user-features/become-writer',
                type: 'POST',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
            })
            .done(function() {
                let date = new Date().toLocaleString();
                $('.main-row').html(`
                    <div class="col-md-12 col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <p class="card-text">⚠️ You sent a request in ${date}. We will contact you as soon as possible.</p>
                            </div>
                        </div>
                    </div>
                `);
                Swal.fire({
                    title: 'Success!',
                    text: 'Sent your request!',
                    icon: 'success'
                });
                $('#btn-submit').html('<i class="fe fe-upload mr-2"></i>Send Request');
                $('#btn-submit').removeAttr('disabled');
            })
            .fail(function() {
                Swal.fire({
                    title: 'Failed!',
                    text: 'Some thing went wrong! Try again',
                    icon: 'error'
                });
                $('#btn-submit').html('<i class="fe fe-upload mr-2"></i>Send Request');
                $('#btn-submit').removeAttr('disabled');
            });
        });
    </script>
@endsection
