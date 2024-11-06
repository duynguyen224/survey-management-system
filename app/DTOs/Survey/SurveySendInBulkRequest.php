<?php

namespace App\DTOs\Survey;

use App\DTOs\ApiFormRequest;

class SurveySendInBulkRequest extends ApiFormRequest
{
    public function rules()
    {
        $rules = [
            'surveyId' => 'required|string',
            'surveyResponseDeadline' => 'required|string',
            'engineerIds' => 'required|array',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'surveyId.required' => 'The survey id is required.',

            'surveyResponseDeadline.required' => 'The survey response deadline is required.',

            'engineerIds.required' => 'You must add at least one question.',
            'questions.array' => 'The questions must be an array format.',
        ];
    }
}
