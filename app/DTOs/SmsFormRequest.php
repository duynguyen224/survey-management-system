<?php

namespace App\DTOs;

use Illuminate\Foundation\Http\FormRequest;

class SmsFormRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }
}
