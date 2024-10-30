<?php

namespace App\Enums;

enum QuestionType: string
{
  case SINGLE_ANSWER = 'Single Answer';
  case MULTIPLE_ANSWERS = 'Multiple Answers';
  case FREE_DESCRIPTION = 'Free Description';
}
