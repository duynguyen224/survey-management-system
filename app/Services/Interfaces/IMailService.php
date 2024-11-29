<?php

namespace App\Services\Interfaces;

use App\Models\Survey;
use App\Models\User;

interface IMailService
{
  public function sendSurvey(User $engineer, Survey $survey, $deadline, $surveyUrl);
  public function sendResetPassword(string $email, string $newPassword);
}
