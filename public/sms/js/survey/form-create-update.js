jQuery(function ($) {
    // Handle submit form create and update
    // See more in survey/create-update.js
    // $btnSubmitSurvey.click

    // Handle submit form delete
    $('#formConfirmDelete').validate({
        submitHandler: function (form) {
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
                },
                error: function (xhr) {
                    handleAjaxError();
                },
            });
        },
    });
});
