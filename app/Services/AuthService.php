<?php

namespace App\Services;

use App\DTOs\Login\LoginRequest;
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

  public function logout(): SmsWebResponse
  {
    $res = new SmsWebResponse();

    Session::flush();
    Auth::logout();

    $res = $res->setIsSuccess(true)->setMessage('Logged out');

    return $res;
  }
}
