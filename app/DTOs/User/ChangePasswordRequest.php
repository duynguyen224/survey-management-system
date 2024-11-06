<?php

namespace App\DTOs\User;

use App\DTOs\SmsFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends SmsFormRequest
{
    public function rules()
    {
        // dd(request()->all());

        return [
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'new_password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Please enter your current password.',

            'new_password.required' => 'Please enter a new password.',
            'new_password.min' => 'The new password must be at least 8 characters long.',
            'new_password.confirmed' => 'The new password and confirmation does not match.',

            'new_password_confirmation.required' => 'Please enter password confirmation.',
        ];
    }
}
