<?php

namespace App\Services;

use App\Mail\SendSurvey;
use App\Models\Survey;
use App\Services\Interfaces\IMailService;
use Illuminate\Support\Facades\Mail;

class MailService implements IMailService
{
  public function sendSurvey(string $email, Survey $survey)
  {
    Mail::to($email)->send(new SendSurvey($survey));
  }
}