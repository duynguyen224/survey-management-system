@extends('layouts.empty-layout')

@section('title', 'Login')

@section('content')
    <div class="sms-bg-primary d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh">
        <div class="p-5 bg-white rounded">
            <div class="text-center">
                <h5>RESET PASSWORD</h5>
                <p class="mb-0">We will send you a URL to reset your password</p>
                <p>Please enter your registered email address and click the send button</p>
            </div>

            <x-empty-space />

            <form action="{{ route('auth.resetPassword') }}" method="POST">
                @csrf
                @error('invalid_credential')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"
                        autofocus value="{{ old('email') }}" />
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Reset your password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
