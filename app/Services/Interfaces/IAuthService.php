<?php

namespace App\Services\Interfaces;

use App\DTOs\Login\LoginRequest;
use App\DTOs\SmsWebResponse;

interface IAuthService
{
  public function login(LoginRequest $request): SmsWebResponse;
  public function logout(): SmsWebResponse;
}
