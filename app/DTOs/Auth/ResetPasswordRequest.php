<?php

namespace App\DTOs\Auth;

use App\DTOs\SmsFormRequest;

class ResetPasswordRequest extends SmsFormRequest
{
  public function rules(): array
  {
    return [
      'email' => 'required|email',
    ];
  }

  public function messages(): array
  {
    return [
      'email.required' => 'The email field is required.',
      'email.email' => 'Please enter a valid email address.',
    ];
  }
}
