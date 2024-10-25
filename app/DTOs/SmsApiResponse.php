<?php

namespace App\DTOs;

use Illuminate\Http\JsonResponse;

class SmsApiResponse extends SmsResponse
{
  private $statusCode; // The HTTP status code

  public function __construct()
  {
    parent::__construct();
    $this->statusCode = 0;
  }

  public function setStatusCode($statusCode)
  {
    $this->statusCode = $statusCode;
    return $this;
  }

  /**
   * Convert object to Json Response
   */
  public function toJsonResponse(): JsonResponse
  {
    return response()->json([
      "isSuccess" => $this->isSuccess,
      "statusCode" => $this->statusCode,
      "message" => $this->message,
      "data" => $this->data,
      "errors" => $this->errors
    ]);
  }
}
