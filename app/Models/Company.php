<?php

namespace App\Models;

use App\Models\BaseModels\MySqlBaseModel;

class Company extends MySqlBaseModel
{
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'person_in_charge_name',
        'person_in_charge_email',
        'post_code',
        'prefecture',
        'address',
        'building_name',
        'agency_id',
    ];
}
