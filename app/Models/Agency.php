<?php

namespace App\Models;

use App\Models\BaseModels\MySqlBaseModel;

class Agency extends MySqlBaseModel
{
    protected $table = 'agencies';

    protected $fillable = [
        'name',
        'status'
    ];
}
