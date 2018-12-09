//validasi form login
$(document).ready(function() {
    $('#form_login').bootstrapValidator({
        message: 'This value is not valid',
        excluded: [':disabled'],
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Masukkan username anda'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Harap isi password anda'
                    }
                }
            },
        }
    });

});

//validasi form required pin
$(document).ready(function() {
$('#form_required_pin').bootstrapValidator({
        message: 'This value is not valid',
        excluded: [':disabled'],
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Masukkan username anda'
                    }
                }
            },
            pin: {
                validators: {
                    notEmpty: {
                        message: 'Harap isi PIN anda'
                    }
                }
            },
        }
    });
});