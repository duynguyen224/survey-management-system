jQuery(function ($) {
    // Open modal when page loaded
    const $modalChangePassword = $('#modalChangePassword');
    $modalChangePassword.modal('show');

    // FORM
    // Handle submit form create and update
    $('#formChangePassword').validate({
        errorElement: 'div',
        rules: {
            current_password: {
                required: true,
            },
            new_password: {
                required: true,
                minlength: 8,
            },
            new_password_confirmation: {
                required: true,
                equalTo: '#new_password',
            },
        },
        messages: {
            current_password: {
                required: 'Please enter current password',
            },
            new_password: {
                required: 'Please enter new password',
                min: "The new password must be at least 8 characters long."
            },
            new_password_confirmation: {
                required: 'Please enter confirmation password',
                equalTo: 'The confirmation password does not match',
            },
        },
        submitHandler: function (form) {
            showLoading(true);

            const formData = $(form).serialize();
            const url = `${SMS_USER_CHANGE_PASSWORD_API}`;
            
            $.ajax({
                url: url,
                method: HTTP_VERB.POST,
                data: formData,
                success: function (res) {
                    if (res.isSuccess) {
                        reloadCurrentWindow();
                    } else {
                        showModalErrorMessage();
                        showServerValidationMessages(res);
                    }

                    showLoading(false);
                },
                error: function (xhr) {
                    handleAjaxError();
                    showLoading(false);
                },
            });
        },
        invalidHandler: function (event, validator) {
            showModalErrorMessage();
            showLoading(false);
        },
    });
});
