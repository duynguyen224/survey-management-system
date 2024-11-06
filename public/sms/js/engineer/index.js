jQuery(function ($) {
    const $btnAddNew = $('#btnAdd');
    const $btnEdit = $('.btnEdit');
    const $btnSurveySelection = $('#btnSurveySelection');

    const $modalUpSertEngineer = $('#modalUpSertEngineer');
    const $formUpSertEngineer = $('#formUpSertEngineer');
    const $headerCreate = $('.headerCreateUser');
    const $headerUpdate = $('.headerUpdateUser');

    const $modalSurveySelection = $('#modalSurveySelection');
    const $formSurveySelection = $('#formSurveySelection');
    const $selectSurveyId = $('#surveyId');

    const $modalNoEngineerSelected = $('#modalNoEngineerSelected');

    $('.select2').select2({
        dropdownParent: $('#modalSurveySelection'),
        theme: 'bootstrap',
    });

    $btnAddNew.click(function () {
        resetModalUpSert();
        $headerUpdate.hide();

        const formDataArray = [
            { name: 'engineerId', value: '0' },
            { name: 'name', value: '' },
            { name: 'email', value: '' },
        ];

        autoFillForm('#formUpSertEngineer', formDataArray);
    });

    $(document).on('click', '.btnEdit', function () {
        resetModalUpSert();
        $modalUpSertEngineer.modal('show');
        $headerCreate.hide();

        // Bind information to input
        const $row = $(this).closest('tr');
        const engineerId = $row.attr('data-record-id');
        const name = $row.attr('data-name');
        const email = $row.attr('data-email');

        const formDataArray = [
            { name: 'engineerId', value: engineerId },
            { name: 'name', value: name },
            { name: 'email', value: email },
        ];

        autoFillForm('#formUpSertEngineer', formDataArray);
    });

    $btnSurveySelection.click(function () {
        resetModalSurveySelection();

        // Reset modal survey selection
        const formDataArray = [
            { name: 'surveyId', value: '' },
            { name: 'surveyResponseDeadline', value: '' },
            { name: 'numberOfPeople', value: '' },
        ];
        autoFillForm('#formSurveySelection', formDataArray);

        const $checkedCheckbox = $('.rowCheckbox:checked');
        const checkedLength = $checkedCheckbox.length;

        if (checkedLength) {
            const iptNumberOfPeople = $('#iptNumberOfPeople');
            iptNumberOfPeople.val(`${checkedLength} peoples`);

            $modalSurveySelection.modal('show');
        } else {
            $modalNoEngineerSelected.modal('show');
        }
    });

    function resetModalUpSert() {
        $headerCreate.show();
        $headerUpdate.show();
        $('#formUpSertEngineer').validate().resetForm();
    }

    function resetModalSurveySelection() {
        $selectSurveyId.val('').trigger('change');
        $('#formSurveySelection').validate().resetForm();
    }
});
