jQuery(function ($) {
    // Config ajax request with csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });
});

// #################
// ### CONSTANTS ###
// #################
const SMS_USER_CREATE_OR_UPDATE_API = '/admin/users/create-or-update';
const SMS_USER_DELETE_API = '/admin/users/destroy';


// ########################
// ### COMMON FUNCTIONS ###
// ########################
function isNullOrEmpty(value) {
    return value === null || value === undefined || value === '';
}

function reloadCurrentWindow() {
    window.location = 'http://127.0.0.1:8000/admin/users';
    // location.reload();
}

function showServerValidationMessages(jqueryResponse) {
    let errors = jqueryResponse.errors;

    $.each(errors, function (key, errorMessages) {
        let inputElement = $(`[name="${key}"]`);

        // Set error message in jQuery Validation
        inputElement.addClass('error').after(`<span class="error">${errorMessages[0]}</span>`);
    });
}

function handleAjaxError(xhr) {
    alert('Something went wrong. Please try again.');
}

function autoFillForm(form, formDataArray) {
    $.each(formDataArray, function (index, field) {
        $(`${form} input[name="${field.name}"]`).val(field.value);
    });
}
