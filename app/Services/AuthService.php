<?php

namespace App\Services;

use App\DTOs\Auth\LoginRequest;
use App\DTOs\Auth\ResetPasswordRequest;
use App\DTOs\SmsWebResponse;
use App\Services\Interfaces\IAuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthService implements IAuthService
{
  public function login(LoginRequest $request): SmsWebResponse
  {
    $res = new SmsWebResponse();

    $data = $request->all();

    if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
      $request->session()->regenerate();
      $res = $res->setIsSuccess(true)->setMessage('Logged in');
    } else {
      $res = $res->setMessage('Invalid credentials');
    }

    return $res;
  }

  public function resetPassword(ResetPasswordRequest $request): SmsWebResponse {
    $res = new SmsWebResponse();

    dd('Reset password screen is not designed.');

    $res = $res->setIsSuccess(true)->setMessage('Reset password successfully');

    return $res;
  }

  public function logout(): SmsWebResponse
  {
    $res = new SmsWebResponse();

    Session::flush();
    Auth::logout();

    $res = $res->setIsSuccess(true)->setMessage('Logged out');

    return $res;
  }
}
