<?php

namespace App\Services;

use App\DTOs\Auth\LoginRequest;
use App\DTOs\Auth\ResetPasswordRequest;
use App\DTOs\SmsWebResponse;
use App\Mail\ResetPassword;
use App\Models\User;
use App\Services\Interfaces\IAuthService;
use App\Services\Interfaces\IMailService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthService implements IAuthService
{
  private $mailService;

  public function __construct(IMailService $mailService)
  {
    $this->mailService = $mailService;
  }

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

  public function resetPassword(ResetPasswordRequest $request): SmsWebResponse
  {
    $res = new SmsWebResponse();

    $data = $request->all();
    $email = $data['email'];

    $user = User::where('email', $email)->first();
    if ($user) {
      // Reset password to 123456 and send email to user
      $newPassword = '123456';

      $user->update([
        'password' => bcrypt($newPassword)
      ]);

      $this->mailService->sendResetPassword($user->email, $newPassword);

      $res = $res->setIsSuccess(true)
        ->setMessage('Reset password successfully. Please check your email for the new password.');
    } else {
      $res = $res->setMessage('Email not found.');
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
