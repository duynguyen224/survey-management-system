jQuery(function ($) {
    // Handle submit form create and update
    $('#formUpSertUser').validate({
        errorElement: 'span',
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            name: {
                required: 'Please enter your name',
                minlength: 'Your name must consist of at least 3 characters',
            },
            email: {
                required: 'Please enter your email',
                email: 'Please enter a valid email address',
            },
        },
        submitHandler: function (form) {
            showLoading(true);

            const formDataArray = $(form).serializeArray();
            let userId = formDataArray.find((item) => item.name === 'userId').value;

            const formData = $(form).serialize();
            userId = isNullOrEmpty(userId) ? 0 : userId;
            const url = `${SMS_USER_CREATE_OR_UPDATE_API}/${userId}`;

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

    // Handle submit form delete
    $('#formConfirmDelete').validate({
        submitHandler: function (form) {
            showLoading(true);

            const formData = $(form).serialize();
            const url = SMS_USER_DELETE_API;

            $.ajax({
                url: url,
                method: HTTP_VERB.DELETE,
                data: formData,
                success: function (res) {
                    if (res.isSuccess) {
                        reloadCurrentWindow();
                    } else {
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
    });
});
