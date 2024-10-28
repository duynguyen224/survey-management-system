jQuery(function ($) {
    // ###########################################
    // ### Config ajax request with csrf token ###
    // ###########################################
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });

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
const SMS_USER_CREATE_OR_UPDATE_API = '/admin/users/create-or-update';
const SMS_USER_DELETE_API = '/admin/users/destroy';

const SMS_COMPANY_DELETE_API = '/admin/companies/destroy';

// ########################
// ### COMMON FUNCTIONS ###
// ########################
function isNullOrEmpty(value) {
    return value === null || value === undefined || value === '';
}

function reloadCurrentWindow() {
    location.reload();
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
