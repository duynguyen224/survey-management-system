<?php

namespace App\Models;

use App\Models\BaseModels\MySqlBaseModel;

class SurveyAssignment extends MySqlBaseModel
{
    protected $table = 'survey_assignments';

    protected $fillable = [
        'user_id',
        'survey_id',
        'deadline',
    ];
}
