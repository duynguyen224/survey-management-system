<?php

namespace App\Enums;

enum Role: string
{
  case SYSTEM_ADMIN = 'System Admin';
  case AGENCY_ADMIN = 'Agency Admin';
  case USER = 'User';
}
