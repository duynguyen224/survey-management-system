<?php

namespace App\Enums;

enum QuestionType: int
{
  case SINGLE_ANSWER = 0;
  case MULTIPLE_ANSWERS = 1;
  case FREE_DESCRIPTION = 2;
}
