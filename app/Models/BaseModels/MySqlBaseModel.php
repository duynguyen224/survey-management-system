<?php

namespace App\Models\BaseModels;

use App\Constants\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MySqlBaseModel extends Model
{
  protected $connection = 'mysql';
  // protected $dateFormat = Constants::FORMAT_FULL_DATE_TIME;

  protected static function booted(): void
  {
    $user = Auth::user();
    
    static::creating(function (Model $model) use ($user) {
      $model->created_by_id = $user ? $user->id : null;
      $model->created_by_name = $user ? $user->username : 'anonymous';
      $model->updated_by_id = $user ? $user->id : null;
      $model->updated_by_name = $user ? $user->username : 'anonymous';
    });

    static::updating(function (Model $model) use ($user) {
      $model->updated_by_id = $user ? $user->id : null;
      $model->updated_by_name = $user ? $user->username : 'anonymous';
    });
  }
}
