jQuery(function ($) {
    $('#formConfirmDelete').validate({
        submitHandler: function (form) {
            const formData = $(form).serialize();
            const url = SMS_SURVEY_DELETE_API;
            
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
