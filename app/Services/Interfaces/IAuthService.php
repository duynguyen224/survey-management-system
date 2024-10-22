<?php

namespace App\Services\Interfaces;

use App\DTOs\Login\LoginRequest;
use App\DTOs\SmsResponse;

interface IAuthService
{
  public function login(LoginRequest $request): SmsResponse;
  public function logout(): SmsResponse;
}
