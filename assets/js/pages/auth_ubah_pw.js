
var OpAuthSignUp = function() {
    var initValidationSignUp = function(){
        jQuery('.validasi-ubah-sandi').validate({
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
                'ubah-lama': {
                    required: true,
                },
                'ubah-baru': {
                    required: true,
                    minlength: 5
                },
                'ubah-knf': {
                    required: true,
                    equalTo: '#ubah-baru'
                }
            },
            messages: {
                'ubah-lama': {
                    required: 'Kata Sandi Lama Tidak Boleh Kosong',
                },
                'ubah-baru': {
                    required: 'Kata Sandi Baru Tidak Boleh Kosong',
                    minlength: 'Kata Sandi Baru Tidak Boleh Kurang Dari 5 Karakter'
                },
                'ubah-knf': {
                    required: 'Konfirmasi Kata Sandi Baru Tidak Boleh Kosong',
                    minlength: 'Konfirmasi Kata Sandi Baru Tidak Boleh Kurang Dari 5 Karakter',
                    equalTo: 'Konfirmasi Kata Sandi Baru Tidak Sama'
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