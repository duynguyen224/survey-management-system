<?php

namespace App\Models;

use App\Models\BaseModels\MySqlBaseModel;

class Survey extends MySqlBaseModel
{
    protected $table = 'surveys';

    protected $fillable = [
        'title',
        'status',
    ];
}