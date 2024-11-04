<?php

namespace App\DTOs\Survey;

use App\DTOs\ApiFormRequest;

class SurveyUpSertRequest extends ApiFormRequest
{
    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'questions' => 'required|array',
            'questions.*.title' => 'required|string|max:255',
            'questions.*.description' => 'nullable|string|max:500',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'The survey title is required.',
            'title.max' => 'The survey title may not be greater than 255 characters.',

            'questions.required' => 'You must add at least one question.',
            'questions.array' => 'The questions must be an array format.',

            'questions.*.title.required' => 'Question must have a title.',
            'questions.*.title.string' => 'Question title must be a string.',
            'questions.*.title.max' => 'Question title cannot exceed 255 characters.',

            'questions.*.description.string' => 'Question description must be a string.',
            'questions.*.description.max' => 'Question description cannot exceed 500 characters.',
        ];
    }
}
