jQuery(function ($) {
    const $btnAddNew = $('#btnAdd');
    const $btnEdit = $('.btnEdit');
    const $btnDelete = $('.btnDelete');

    const $ckcCheckAll = $('#checkAll');
    const $rowCheckbox = $('.rowCheckbox');
    const $btnDeleteAll = $('#btnDeleteAll');

    const $modalUpSertUser = $('#modalUpSertUser');
    const $formUpSertUser = $('#formUpSertUser');
    const $headerCreate = $('.headerCreateUser');
    const $headerUpdate = $('.headerUpdateUser');

    const $modalConfirmDeleteAll = $('#modalConfirmDeleteUser');

    $btnAddNew.click(function () {
        resetModal();
        $headerUpdate.hide();

        const formDataArray = [
            { name: 'userId', value: '0' },
            { name: 'name', value: '' },
            { name: 'email', value: '' },
        ];

        autoFillForm('#formUpSertUser', formDataArray);
    });

    $(document).on('click', '.btnEdit', function () {
        resetModal();
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

    $btnDelete.click(function () {
        const userId = $(this).closest('tr').attr('data-user-id');
        // Show confirm
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
                return $(this).closest('tr').attr('data-user-id');
            })
            .get();

        if (selectedIds.length > 0) {
            $modalConfirmDeleteAll.modal('show');

            const formDataArray = [
                { name: 'userIds', value: selectedIds },
            ];
    
            autoFillForm('#formConfirmDeleteUser', formDataArray);
        } else {
            alert('No items selected');
        }
    });

    function resetModal() {
        $headerCreate.show();
        $headerUpdate.show();
        $('#formUpSertUser').trigger('reset'); // Reset the form
        $('#formUpSertUser').validate().resetForm(); // Reset validation
    }
});
