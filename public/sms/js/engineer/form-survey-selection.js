jQuery(function ($) {
    // Handle submit form survey selection
    $('#formSurveySelection').validate({
        errorElement: 'span',
        rules: {
            surveyId: {
                required: true,
            },
            surveyResponseDeadline: {
                required: true,
            },
        },
        messages: {
            surveyId: {
                required: 'Please select one survey',
            },
            surveyResponseDeadline: {
                required: 'Please choose deadline',
            },
        },
        errorPlacement: function (error, element) {
            if (element.hasClass('select2-hidden-accessible')) {
                error.insertAfter(element.next('.select2')); // Places the error after the Select2 container
            } else if (element.parent().hasClass('input-group')) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element) {
            if ($(element).hasClass('select2-hidden-accessible')) {
                $(element).next('.select2').addClass('is-invalid'); // Adds a class to the Select2 container for error styling
            } else {
                // $(element).addClass('is-invalid'); // Adds a class to standard inputs
            }
        },
        unhighlight: function (element) {
            if ($(element).hasClass('select2-hidden-accessible')) {
                $(element).next('.select2').removeClass('is-invalid'); // Removes the class from the Select2 container
            } else {
                $(element).removeClass('is-invalid'); // Removes the class from standard inputs
            }
        },
        submitHandler: function (form) {
            showLoading(true);

            const formData = $(form).serialize();
            const url = SMS_ENGINEER_SEND_SURVEY_IN_BULK_API;

            const surveyId = $('#surveyId').val();
            const surveyResponseDeadline = $('#iptSurveyResponseDeadline').val();

            // Get list user ids
            let engineerIds = [];
            $('.rowCheckbox:checked').each(function () {
                const engineerId = $(this).closest('tr').attr('data-record-id');
                engineerIds.push(engineerId);
            });

            const data = {
                surveyId: surveyId,
                surveyResponseDeadline: surveyResponseDeadline,
                engineerIds: engineerIds,
            };

            $.ajax({
                url: url,
                method: HTTP_VERB.POST,
                data: data,
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
