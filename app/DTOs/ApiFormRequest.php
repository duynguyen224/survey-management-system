<?php

namespace App\DTOs;

use App\Enums\HttpStatusCode;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiFormRequest extends SmsFormRequest
{
  protected function failedValidation(Validator $validator)
  {
    $errors = $validator->errors();

    $res = (new SmsApiResponse())->setStatusCode(HttpStatusCode::BAD_REQUEST->value)
      ->setMessage(__('common.Validation failed'))
      ->setErrors($errors);

    throw new HttpResponseException($res->toJsonResponse());
  }

  protected function prepareForValidation()
  {
    // $this->merge([
    //   'status' => filter_var($this->status, FILTER_VALIDATE_BOOLEAN),
    // ]);
  }
}
