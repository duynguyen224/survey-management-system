<?php

namespace App\DTOs\Auth;

use App\DTOs\SmsFormRequest;

class LoginRequest extends SmsFormRequest
{
  public function rules(): array
  {
    return [
      'email' => 'required|email',
      'password' => 'required',
    ];
  }

  public function messages(): array
  {
    return [
      'email.required' => 'The email field is required.',
      'email.email' => 'Please enter a valid email address.',
      'password.required' => 'The password field is required.',
    ];
  }
}
