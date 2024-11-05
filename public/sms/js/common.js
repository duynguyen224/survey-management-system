jQuery(function ($) {
    // ##############################################################
    // ### Function run on page load ###
    // ##############################################################

    // Hide flash message
    hideFlashMessage();

    // Setup third party libraries (select2, daterangepicker, etc...)
    setupThirdPartyLibraries();

    // Show modal with warning message when validation failed
    const hasErrors = $('#iptValidationErrors').val();
    if (hasErrors) {
        $('#modalValidationError').modal('show');
    }

    // ########################################
    // ### Handle checkboxes on list screen ###
    // (delete row, delete all and check/uncheck checkboxes)
    // ########################################
    const $ckcCheckAll = $('#checkAll');
    const $rowCheckbox = $('.rowCheckbox');
    const $btnDeleteAll = $('#btnDeleteAll');
    const $modalConfirmDeleteAll = $('#modalConfirmDelete');

    $(document).on('click', '.btnDelete', function () {
        const recordId = $(this).closest('tr').attr('data-record-id');
        const selectedIds = [recordId];

        if (selectedIds.length > 0) {
            $modalConfirmDeleteAll.modal('show');

            const formDataArray = [{ name: 'recordIds', value: selectedIds }];
            autoFillForm('#formConfirmDelete', formDataArray);
        } else {
            alert('No item selected');
        }
    });

    $ckcCheckAll.on('change', function () {
        $('.rowCheckbox').prop('checked', this.checked);
    });

    $rowCheckbox.on('change', function () {
        $('#checkAll').prop('checked', $('.rowCheckbox:checked').length === $('.rowCheckbox').length);
    });

    $btnDeleteAll.click(function () {
        const selectedIds = $('.rowCheckbox:checked')
            .map(function () {
                return $(this).closest('tr').attr('data-record-id');
            })
            .get();

        if (selectedIds.length > 0) {
            $modalConfirmDeleteAll.modal('show');

            const formDataArray = [{ name: 'recordIds', value: selectedIds }];
            autoFillForm('#formConfirmDelete', formDataArray);
        } else {
            alert('No items selected');
        }
    });
});

// #################
// ### CONSTANTS ###
// #################

// Constants
const HTTP_VERB = {
    GET: 'GET',
    POST: 'POST',
    PUT: 'PUT',
    DELETE: 'DELETE',
};

// API routes
const SMS_ENGINEER_CREATE_OR_UPDATE_API = '/admin/engineers/create-or-update';
const SMS_ENGINEER_DELETE_API = '/admin/engineers/destroy';

const SMS_USER_CREATE_OR_UPDATE_API = '/admin/users/create-or-update';
const SMS_USER_DELETE_API = '/admin/users/destroy';
const SMS_USER_CHANGE_PASSWORD_API = '/admin/me/change-password';

const SMS_COMPANY_DELETE_API = '/admin/companies/destroy';

const SMS_SURVEY_LIST_API = '/admin/surveys';
const SMS_SURVEY_CREATE_OR_UPDATE_API = '/admin/surveys/create-or-update';
const SMS_SURVEY_DELETE_API = '/admin/surveys/destroy';

// ########################
// ### COMMON FUNCTIONS ###
// ########################
function isNullOrEmpty(value) {
    return value === null || value === undefined || value === '';
}

function reloadCurrentWindow() {
    location.reload();
}

function redirectToUrl(relativeUrl) {
    if (!isNullOrEmpty(relativeUrl)) {
        window.location.href = relativeUrl;
    } else {
        reloadCurrentWindow();
    }
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

function showModalValidationError() {
    $('#modalValidationError').modal('show');
}

function hideFlashMessage() {
    setTimeout(() => {
        $('.sms-alert').slideUp(1500);
    }, 2500);
}

function scrollToPosition(position) {
    if (!position) {
        position = $('.sms-page-body').height();
    }

    $('#sms-layout-wrapper').animate({ scrollTop: position }, 'slow');
}

function setupThirdPartyLibraries() {
    // ### Config ajax request with csrf token ###
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });

    // ### Setup moment.js ###
    setupMoment();

    // ### Setup daterangepicker.js ###
    setupDatePicker();
}

function setupDatePicker() {
    // Single date picker
    $('.singleDatePicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: false,
        autoUpdateInput: false,
        locale: {
            format: 'YYYY.MM.DD',
        },
    });
    $('.singleDatePicker').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY.MM.DD'));
    });
}

function setupMoment() {
    // moment.locale('en', { week: { dow: 1 } }); // Make the Monday is the first day of week
}
