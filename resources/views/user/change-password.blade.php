@extends('layouts.main-layout')

@section('title', 'Change password')

@section('content')
    <x-pages.page-header>
        <x-pages.page-title title="" />
    </x-pages.page-header>

    <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
        <div class="p-5 bg-white rounded">
            <div class="text-center">
                <h5>Change password</h5>
                <p class="mb-0">Please enter your current password and new password.</p>
                <p class="mb-0">When you changed the password, you will be automatically logged out.</p>
                <p>Please login again with your new password.</p>
            </div>

            <x-empty-space />

            <form action="{{ route('users.changePassword') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col mb-3">
                        <label for="current_password" class="form-label">Current password</label>
                        <input type="text" name="current_password" id="current_password" class="form-control"
                            placeholder="Enter current password" value="{{ old('current_password') }}"/>
                        <x-validation-message field="current_password" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="new_password" class="form-label">New password</label>
                        <input type="text" name="new_password" id="new_password" class="form-control"
                            placeholder="Enter new password" value="{{ old('new_password') }}"/>
                        <x-validation-message field="new_password" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="new_password_confirmation" class="form-label">New password (confirm)</label>
                        <input type="text" name="new_password_confirmation" id="new_password_confirmation"
                            class="form-control" placeholder="Enter new password confirm" value="{{ old('new_password_confirmation') }}"/>
                        <x-validation-message field="new_password_confirmation" />
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-100">Reset your password</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal validation error --}}
    <x-modals.modal-error-message>
        <p>There is insufficient registration information.</p>
        <p>Please enter all the information.</p>
    </x-modals.modal-error-message>

@endsection