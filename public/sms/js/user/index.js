jQuery(function ($) {
    const $btnAddNew = $('#btnAdd');
    const $btnEdit = $('.btnEdit');

    const $modalUpSertUser = $('#modalUpSertUser');
    const $formUpSertUser = $('#formUpSertUser');
    const $headerCreate = $('.headerCreateUser');
    const $headerUpdate = $('.headerUpdateUser');

    $btnAddNew.click(function () {
        resetModalUpSert();
        $headerUpdate.hide();

        const formDataArray = [
            { name: 'userId', value: '0' },
            { name: 'name', value: '' },
            { name: 'email', value: '' },
        ];

        autoFillForm('#formUpSertUser', formDataArray);
    });

    $(document).on('click', '.btnEdit', function () {
        resetModalUpSert();
        $modalUpSertUser.modal('show');
        $headerCreate.hide();

        // Bind information to input
        const $row = $(this).closest('tr');
        const userId = $row.attr('data-user-id');
        const name = $row.attr('data-name');
        const email = $row.attr('data-email');

        const formDataArray = [
            { name: 'userId', value: userId },
            { name: 'name', value: name },
            { name: 'email', value: email },
        ];

        autoFillForm('#formUpSertUser', formDataArray);
    });

    function resetModalUpSert() {
        $headerCreate.show();
        $headerUpdate.show();
        $('#formUpSertUser').trigger('reset'); // Reset the form
        $('#formUpSertUser').validate().resetForm(); // Reset validation
    }
});
