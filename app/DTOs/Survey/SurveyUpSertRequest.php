<?php

namespace App\DTOs\Survey;

use App\DTOs\ApiFormRequest;

class SurveyUpSertRequest extends ApiFormRequest
{
    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:100',
            // 'questions' => 'required|array',
            // 'questions.*.title' => 'required|string',
            // 'questions.*.description' => 'required|string',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'The survey title is required.',
            'title.max' => 'The survey title may not be greater than 100 characters.',

            // 'questions.required' => 'You must add at least one question.',
            // 'questions.array' => 'The questions must be an array format.',

            // 'questions.*.title.required' => 'Question must have a title.',
            // 'questions.*.title.string' => 'Question title must be a string.',

            // 'questions.*.description.required' => 'Question must have a description.',
            // 'questions.*.description.string' => 'Question description must be a string.',
        ];
    }
}
