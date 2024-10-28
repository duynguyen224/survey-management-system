jQuery(function ($) {
    $('#formConfirmDelete').validate({
        submitHandler: function (form) {
            const formData = $(form).serialize();
            const url = SMS_COMPANY_DELETE_API;
            
            $.ajax({
                url: url,
                method: 'POST',
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
