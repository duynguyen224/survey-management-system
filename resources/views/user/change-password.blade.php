@extends('layouts.main-layout')

@section('title', 'Change password')

@section('content')
    <x-pages.page-header>
        <x-pages.page-title title="" />
    </x-pages.page-header>

    <x-pages.page-body></x-pages.page-body>

    <x-pages.page-footer></x-pages.page-footer>

    <!-- Modal change password -->
    <x-modals.modal-create-or-update modalId="modalChangePassword" formId="formChangePassword">
        <x-slot:modalHeader>
            <span>Change password</span>
        </x-slot:modalHeader>

        <x-slot:modalSubHeader>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, provident?</p>
        </x-slot:modalSubHeader>

        <x-slot:formBody>
            <input type="hidden" name="userId" id="userId" value="">
            <div class="row">
                <div class="col mb-3">
                    <label for="currentPassword" class="form-label">Current password</label>
                    <input type="text" name="currentPassword" id="currentPassword" class="form-control" placeholder="Enter current password"/>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="newPassword" class="form-label">New password</label>
                    <input type="text" name="newPassword" id="newPassword" class="form-control" placeholder="Enter new password" />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="newPasswordConfirm" class="form-label">New password (confirm)</label>
                    <input type="text" name="newPasswordConfirm" id="newPasswordConfirm" class="form-control" placeholder="Enter new password confirm" />
                </div>
            </div>
        </x-slot:formBody>
    </x-modals.modal-create-or-update>

    {{-- Modal validation error --}}
    <x-modals.modal-validation-error>
        <p>There is insufficient registration information.</p>
        <p>Please enter all the information.</p>
    </x-modals.modal-validation-error>

@endsection

@section('scripts')
    <script src="{{ asset('sms/js/user/form-change-password.js') }}"></script>
@endsection
