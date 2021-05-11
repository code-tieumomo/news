
(function ($) {
    "use strict";

    $('[data-toggle="tooltip"]').tooltip()

    $('#load-reg-section-btn').on('click', function(event) {
        event.preventDefault();
        
        if ($('input[name=login_email]').val() != "") {
            $('input[name=reg_email]').val($('input[name=login_email]').val());
        }
        $('#section-login').toggle(300);
        $('#section-register').toggle(300);
    });

    $('#btn-load-login').on('click', function(event) {
        event.preventDefault();
        
        if ($('input[name=reg_email]').val() != "") {
            $('input[name=login_email]').val($('input[name=reg_email]').val());
        }
        $('#section-register').toggle(300);
        $('#section-login').toggle(300);
    });

    $('#login-using-facebook-btn').on('click', function(event) {
        event.preventDefault();
        $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
        
        window.location.href = "auth/facebook";
    });

    /*==================================================================
    [ Validate ]*/
    var loginInput = $('.validate-input .input-login');
    var regInput 

    $('#login-form').on('submit', function(event) {
        event.preventDefault();

        for(var i=0; i<loginInput.length; i++) {
            if(validate(loginInput[i]) != undefined){
                showValidate(loginInput[i], validate(loginInput[i]));
                return false;
            }
        }

        var email = $('input[name=login_email]').val();
        var password = $('input[name=login_password]').val();
        var remember = $('input[name=login_remember]').prop('checked');

        $.ajax({
            url: 'auth/login',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: email,
                password: password,
                remember: remember
            },
            beforeSend: function() {
                $('#login-btn').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
            },
            success: function(response) {
                window.location.replace(response.redirect);
            },
            error: function(response) {
                $('#login-btn').html('Login');
                if (response.responseJSON.errors.email) {
                    Swal.fire({
                        title: 'Error!',
                        text: response.responseJSON.errors.email[0],
                        icon: 'error',
                        confirmButtonText: 'Try again!'
                    });
                } else if (response.responseJSON.errors.password) {
                    Swal.fire({
                        title: 'Error!',
                        text: response.responseJSON.errors.password[0],
                        icon: 'error',
                        confirmButtonText: 'Try again!'
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.responseJSON.errors.remember[0],
                        icon: 'error',
                        confirmButtonText: 'Try again!'
                    });
                }
                
            }
        });
    });

    var registerInput = $('.validate-input .input-register');

    $('#register-form').on('submit', function(event){
        event.preventDefault();

        for(var i=0; i<registerInput.length; i++) {
            if(validate(registerInput[i]) != undefined){
                showValidate(registerInput[i], validate(registerInput[i]));
                return false;
            }
        }

        var email = $('input[name=reg_email]').val();
        var password = $('input[name=reg_password]').val();
        var password_confirmation = $('input[name=reg_password_confirmation]').val();
        var remember = $('input[name=reg_remember]').prop('checked');

        $.ajax({
            url: 'auth/register',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: email,
                password: password,
                password_confirmation: password_confirmation,
                remember: remember
            },
            beforeSend: function() {
                $('#register-btn').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
            },
            success: function(response) {
                window.location.replace(response.redirect);
            },
            error: function(response) {
                $('#register-btn').html('Register');
                if (response.responseJSON.errors.email) {
                    Swal.fire({
                        title: 'Error!',
                        text: response.responseJSON.errors.email[0],
                        icon: 'error',
                        confirmButtonText: 'Try again!'
                    });
                } else if (response.responseJSON.errors.password) {
                    Swal.fire({
                        title: 'Error!',
                        text: response.responseJSON.errors.password[0],
                        icon: 'error',
                        confirmButtonText: 'Try again!'
                    });
                } else if (response.responseJSON.errors.password_confirmation) {
                    Swal.fire({
                        title: 'Error!',
                        text: response.responseJSON.errors.password_confirmation[0],
                        icon: 'error',
                        confirmButtonText: 'Try again!'
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.responseJSON.errors.remember[0],
                        icon: 'error',
                        confirmButtonText: 'Try again!'
                    });
                }
                
            }
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return 'type';
            }
        } else if($(input).val().trim() == ''){
            return 'required';
        } else if($(input).attr('type') == 'password' && $(input).val().length < 8) {
            return 'type';
        } else if($(input).attr('name') == 'password_confirmation') {
            if($('input[name=password_confirmation]').val() != $('input[name=password]').val()) {
                return 'confirmed';
            }
        }
    }

    function showValidate(input, dataName) {
        Swal.fire({
            title: 'Error!',
            text: $(input).data(dataName),
            icon: 'error',
            confirmButtonText: 'Try again!'
        });
    }
})(jQuery);
