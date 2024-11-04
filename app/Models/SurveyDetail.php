<?php

namespace App\Models;

use App\Models\BaseModels\MySqlBaseModel;

class SurveyDetail extends MySqlBaseModel
{
    protected $table = 'survey_details';

    protected $fillable = [
        'question_title',
        'question_description',
        'question_type',
        'question_number',
        'survey_id',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }
}
