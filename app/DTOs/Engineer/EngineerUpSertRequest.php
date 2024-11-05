<?php

namespace App\DTOs\Engineer;

use App\DTOs\ApiFormRequest;

class EngineerUpSertRequest extends ApiFormRequest
{
    public function rules()
    {
        $userId = $this->route('id');

        return [
            'id' => 'nullable|string',
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . $userId,
        ];
    }

    public function messages()
    {
        return [
            'id.string' => 'The ID must be a valid string.',

            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',

            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address has already been taken.',
        ];
    }
}
