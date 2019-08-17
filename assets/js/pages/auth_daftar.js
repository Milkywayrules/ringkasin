/*
 *  Document   : op_auth_signup.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign Up Page
 */

var OpAuthSignUp = function() {
    // Init Sign Up Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationSignUp = function(){
        jQuery('.js-validation-signup').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
            rules: {
                'daftar-fullname': {
                    required: true,
                    minlength: 2
                },
                'daftar-username': {
                    required: true,
                    minlength: 5
                },
                'daftar-email': {
                    required: true,
                    email: true
                },
                'daftar-phone': {
                    required: true
                },
                'daftar-password': {
                    required: true,
                    minlength: 5
                },
                'daftar-verPassword': {
                    required: true,
                    equalTo: '#daftar-Password'
                }
            },
            messages: {
                'daftar-fullname': {
                    required: 'Nama Lengkap Tidak Boleh Kosong',
                    minlength: 'Nama Lengkap Tidak Boleh Kurang Dari 2 Karakter'
                },
                'daftar-username': {
                    required: 'Nama Lengkap Tidak Boleh Kosong',
                    minlength: 'Nama Lengkap Tidak Boleh Kurang Dari 5 Karakter'
                },
                'daftar-email': 'Alamat Email Tidak Boleh Kosong',
                'daftar-phone': 'No. Handphone Tidak Boleh Kosong',
                'daftar-password': {
                    required: 'Kata Sandi Tidak Boleh Kosong',
                    minlength: 'Kata Sandi Tidak Boleh Kurang Dari 5 Karakter'
                },
                'daftar-verPassword': {
                    required: 'Konfirmasi Kata Sandi Tidak Boleh Kosong',
                    minlength: 'Konfirmasi Kata Sandi Tidak Boleh Kurang Dari 5 Karakter',
                    equalTo: 'Konfirmasi Kata Sandi Tidak Sama'
                },
            }
        });
    };

    return {
        init: function () {
            // Init SignUp Form Validation
            initValidationSignUp();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ OpAuthSignUp.init(); });
