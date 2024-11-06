<?php

namespace App\Services\Interfaces;

use App\DTOs\Auth\LoginRequest;
use App\DTOs\Auth\ResetPasswordRequest;
use App\DTOs\SmsWebResponse;

interface IAuthService
{
  public function login(LoginRequest $request): SmsWebResponse;
  public function resetPassword(ResetPasswordRequest $request) : SmsWebResponse;
  public function logout(): SmsWebResponse;
}
