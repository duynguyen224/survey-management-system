jQuery(function ($) {
    const $modalChangePassword = $('#modalChangePassword');

    $modalChangePassword.modal('show');

    // Handle submit form create and update
    $('#formChangePassword').validate({
        errorElement: 'span',
        rules: {
            currentPassword: {
                required: true,
            },
            newPassword: {
                required: true,
                minlength: 3,
            },
            newPasswordConfirm: {
                required: true,
                equalTo: '#password',
            },
        },
        messages: {
            currentPassword: {
                required: 'Please enter current password',
            },
            newPassword: {
                required: 'Please enter new password',
            },
            newPasswordConfirm: {
                required: 'Please enter confirmation password',
                equalTo: 'The confirmation password does not match',
            },
        },
        submitHandler: function (form) {
            alert('form submit ok')
            // const formDataArray = $(form).serializeArray();
            // let userId = formDataArray.find((item) => item.name === 'userId').value;

            // const formData = $(form).serialize();
            // userId = isNullOrEmpty(userId) ? 0 : userId;
            // const url = `${SMS_USER_CREATE_OR_UPDATE_API}/${userId}`;

            // $.ajax({
            //     url: url,
            //     method: HTTP_VERB.POST,
            //     data: formData,
            //     success: function (res) {
            //         if (res.isSuccess) {
            //             reloadCurrentWindow();
            //         } else {
            //             showModalValidationError();
            //             showServerValidationMessages(res);
            //         }
            //     },
            //     error: function (xhr) {
            //         handleAjaxError();
            //     },
            // });
        },
        invalidHandler: function (event, validator) {
            showModalValidationError();
        },
    });
});
