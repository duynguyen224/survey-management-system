jQuery(function ($) {
    $('#formConfirmDelete').validate({
        submitHandler: function (form) {
            showLoading(true);
            
            const formData = $(form).serialize();
            const url = SMS_COMPANY_DELETE_API;
            
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
