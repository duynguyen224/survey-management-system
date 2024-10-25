<?php

namespace App\Helper;

use App\Constants\Constants;
use Carbon\Carbon;

class Helper
{
  public static function formatDate($dateTime, $format = Constants::FORMAT_YMD_DOTS)
  {
      return Carbon::createFromFormat(Constants::FORMAT_FULL_DATE_TIME, $dateTime)->format($format);
  }
}
