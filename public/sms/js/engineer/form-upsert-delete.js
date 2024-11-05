jQuery(function ($) {
    // Handle submit form create and update
    $('#formUpSertEngineer').validate({
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
            const formDataArray = $(form).serializeArray();
            let engineerId = formDataArray.find((item) => item.name === 'engineerId').value;

            const formData = $(form).serialize();
            engineerId = isNullOrEmpty(engineerId) ? 0 : engineerId;
            const url = `${SMS_ENGINEER_CREATE_OR_UPDATE_API}/${engineerId}`;

            $.ajax({
                url: url,
                method: HTTP_VERB.POST,
                data: formData,
                success: function (res) {
                    if (res.isSuccess) {
                        reloadCurrentWindow();
                    } else {
                        showModalValidationError();
                        showServerValidationMessages(res);
                    }
                },
                error: function (xhr) {
                    handleAjaxError();
                },
            });
        },
        invalidHandler: function (event, validator) {
            showModalValidationError();
        },
    });

    // Handle submit form delete
    $('#formConfirmDelete').validate({
        submitHandler: function (form) {
            const formData = $(form).serialize();
            const url = SMS_ENGINEER_DELETE_API;

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
                },
                error: function (xhr) {
                    handleAjaxError();
                },
            });
        },
    });
});
