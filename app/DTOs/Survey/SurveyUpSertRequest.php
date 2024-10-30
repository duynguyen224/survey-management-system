<?php

namespace App\DTOs\Survey;

use App\DTOs\SmsFormRequest;

class SurveyUpSertRequest extends SmsFormRequest
{
    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'The survey title is required.',
            'title.max' => 'The survey title may not be greater than 255 characters.',
        ];
    }
}
