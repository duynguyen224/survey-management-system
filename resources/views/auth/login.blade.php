@extends('layouts.empty-layout')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div>
                <div class="mb-3">
                    <img src="{{ asset('sms/img/pe-bank-logo.png') }}" alt="pe-bank logo" width="250">
                </div>
                <div class="row align-items-end">
                    <div class="col-4">
                        <form action="{{ route('auth.login') }}" method="POST">
                            @csrf
                            @error('invalid_credential')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus value="{{ old('email') }}" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div>
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end mb-3">
                                <a href="auth-forgot-password-basic.html">
                                    <small>Reset Password?</small>
                                </a>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Log in</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-6">
                        <img src="{{ asset('sms/img/pe-bank-login-illutration.png') }}" alt="login-illutration"
                            width="500">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
