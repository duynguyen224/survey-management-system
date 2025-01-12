<?php

namespace App\Models\BaseModels;

use App\Constants\Constants;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MySqlBaseModel extends Model
{
  use HasUuids, HasFactory;

  protected $connection = 'mysql';
  protected $dateFormat = Constants::FORMAT_FULL_DATE_TIME;

  protected $fillable = [
    'created_by_id',
    'created_by_name',
    'updated_by_id',
    'updated_by_name'
  ];

  protected static function booted(): void
  {
    $user = Auth::user();

    static::creating(function (Model $model) use ($user) {
      $model->created_by_id = $user ? $user->id : null;
      $model->created_by_name = $user ? $user->name : 'anonymous';
      $model->updated_by_id = $user ? $user->id : null;
      $model->updated_by_name = $user ? $user->name : 'anonymous';
    });

    static::updating(function (Model $model) use ($user) {
      $model->updated_by_id = $user ? $user->id : null;
      $model->updated_by_name = $user ? $user->name : 'anonymous';
    });
  }
}
