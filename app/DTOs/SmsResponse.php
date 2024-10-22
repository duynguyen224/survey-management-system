<?php

namespace App\DTOs;

class SmsResponse
{
  private $isSuccess;
  private $message;

  public function __construct()
  {
    $this->isSuccess = false;
    $this->message = null;
  }

  public function setIsSuccess(bool $isSuccess)
  {
    $this->isSuccess = $isSuccess;
    return $this;
  }

  public function setMessage(string $message)
  {
    $this->message = $message;
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
}
