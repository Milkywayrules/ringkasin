/*
 *  Document   : op_auth_reminder.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Password Reminder Page
 */

var OpAuthReminder = function() {
    // Init Password Reminder Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationReminder = function(){
        jQuery('.validasi-reset').validate({
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
                'lupa-email': {
                    required: true,
                    email:true
                }
            },
            messages: {
                'lupa-email': {
                    required: 'Alamat Email Tidak Boleh Kosong',
                    email: 'Alamat Email Tidak Valid'
                }
            }
        });
    };

    return {
        init: function () {
            // Init Password Reminder Form Validation
            initValidationReminder();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ OpAuthReminder.init(); });