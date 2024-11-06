<?php

namespace App\Services\Interfaces;

use App\Models\Survey;

interface IMailService
{
  public function sendSurvey(string $email, Survey $survey);
}
