<?php

namespace App\Models;

use App\Models\BaseModels\MySqlBaseModel;

class Survey extends MySqlBaseModel
{
    protected $table = 'surveys';

    protected $fillable = [
        'title',
        'status',
        'agency_id',
    ];

    public function surveyDetails()
    {
        return $this->hasMany(SurveyDetail::class, 'survey_id', 'id')->orderBy('question_number', 'asc');
    }
}
