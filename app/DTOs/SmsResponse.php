<?php

namespace App\DTOs;

class SmsResponse
{
  protected $isSuccess; // A boolean indicating the status of the operation
  protected $message; // A human-readable message about the operation (could be string, or null)
  protected $data; // The main payload of the response (could be an array, object, or null)
  protected $errors; // Any error messages or validation failures (null if no errors)

  public function __construct()
  {
    $this->isSuccess = false;
    $this->message = null;
    $this->data = null;
    $this->errors = null;
  }

  public function setIsSuccess($isSuccess)
  {
    $this->isSuccess = $isSuccess;
    return $this;
  }

  public function setMessage($message)
  {
    $this->message = $message;
    return $this;
  }

  public function setData($data)
  {
    $this->data = $data;
    return $this;
  }

  public function setErrors($errors)
  {
    $this->errors = $errors;
    return $this;
  }

  public function getIsSuccess()
  {
    return $this->isSuccess;
  }

  public function getMessage()
  {
    return $this->message;
  }

  public function getData()
  {
    return $this->data;
  }

  public function getErrors()
  {
    return $this->errors;
  }
}
