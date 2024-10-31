@extends('layouts.main-layout')

@section('title', 'Change password')

@section('content')
    <x-pages.page-header>
        <x-pages.page-title title="" />
    </x-pages.page-header>

    <x-pages.page-body></x-pages.page-body>

    <x-pages.page-footer></x-pages.page-footer>

    <!-- Modal change password -->
    <x-modals.modal-create-or-update modalId="modalChangePassword" formId="formChangePassword" labelSubmit="Change password">
        <x-slot:modalHeader>
            <span>Change password</span>
        </x-slot:modalHeader>

        <x-slot:modalSubHeader>
            <p class="mb-0">Please enter your current password and new password.</p>
            <p class="mb-0">When you changed the password, you will be automatically logged out.</p>
            <p>Please login again with your new password.</p>
        </x-slot:modalSubHeader>

        <x-slot:formBody>
            <div class="row">
                <div class="col mb-3">
                    <label for="current_password" class="form-label">Current password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter current password"/>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="new_password" class="form-label">New password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter new password" />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="new_password_confirmation" class="form-label">New password (confirm)</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Enter new password confirm" />
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
