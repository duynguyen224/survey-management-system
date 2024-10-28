<?php

namespace App\Enums;

enum Role: string
{
  case SystemAdmin = 'System Admin';
  case AgencyAdmin = 'Agency Admin';
  case User = 'User';
}
