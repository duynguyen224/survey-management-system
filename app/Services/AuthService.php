<?php

namespace App\Services;

use App\DTOs\Login\LoginRequest;
use App\DTOs\SmsResponse;
use App\Services\Interfaces\IAuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthService implements IAuthService
{
  public function login(LoginRequest $request): SmsResponse
  {
    $res = new SmsResponse();

    $data = $request->all();

    if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
      $request->session()->regenerate();
      $res = $res->setIsSuccess(true)->setMessage('Logged in');
    } else {
      $res = $res->setMessage('Invalid credentials');
    }

    return $res;
  }

  public function logout(): SmsResponse
  {
    $res = new SmsResponse();

    Session::flush();
    Auth::logout();

    $res = $res->setIsSuccess(true)->setMessage('Logged out');

    return $res;
  }
}
