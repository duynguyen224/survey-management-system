<?php

namespace App\Services;

use App\Mail\ResetPassword;
use App\Mail\SendSurvey;
use App\Models\Survey;
use App\Models\User;
use App\Services\Interfaces\IMailService;
use Illuminate\Support\Facades\Mail;

class MailService implements IMailService
{
  public function sendSurvey(User $engineer, Survey $survey, $deadline, $surveyUrl)
  {
    Mail::to($engineer->email)->send(new SendSurvey($engineer, $survey, $deadline, $surveyUrl));
  }

  public function sendResetPassword(string $email, string $newPassword)
  {
    Mail::to($email)->send(new ResetPassword($newPassword));
  }
}
