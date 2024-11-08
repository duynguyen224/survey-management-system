<?php

namespace App\DTOs\User;

use App\DTOs\ApiFormRequest;

class UserUpSertRequest extends ApiFormRequest
{
    public function rules()
    {
        $userId = $this->route('id');

        return [
            'id' => 'nullable|string',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email,' . $userId,
        ];
    }

    public function messages()
    {
        return [
            'id.string' => 'The ID must be a valid string.',

            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 100 characters.',
            'name.string' => 'The name must be a valid string.',

            'email.required' => 'The email field is required.',
            'email.max' => 'The email may not be greater than 100 characters.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address has already been taken.',
        ];
    }
}
