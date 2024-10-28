<?php

namespace App\DTOs\Company;

use App\DTOs\SmsFormRequest;

class CompanyUpSertRequest extends SmsFormRequest
{
    public function rules()
    {
        $company = $this->route('company');
        
        $rules = [
            'name' => 'required|string|max:255',
            'person_in_charge_name' => 'required|string|max:255',
            'person_in_charge_email' => 'required|email|max:255|unique:companies,person_in_charge_email,' . $company->id,
            'post_code' => 'required|string|max:20',
            'prefecture' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'building_name' => 'required|string|max:255',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'The company name is required.',
            'name.max' => 'The company name may not be greater than 255 characters.',

            'person_in_charge_name.required' => 'The name of the person in charge is required.',
            'person_in_charge_name.max' => 'The name of the person in charge may not be greater than 255 characters.',

            'person_in_charge_email.required' => 'The email of the person in charge is required.',
            'person_in_charge_email.email' => 'The email of the person in charge must be a valid email address.',
            'person_in_charge_email.unique' => 'The email of the person in charge has already been taken.',
            'person_in_charge_email.max' => 'The email of the person in charge may not be greater than 255 characters.',

            'post_code.required' => 'The post code is required.',
            'post_code.max' => 'The post code may not be greater than 20 characters.',

            'prefecture.required' => 'The prefecture is required.',
            'prefecture.max' => 'The prefecture may not be greater than 100 characters.',

            'address.required' => 'The address is required.',
            'address.max' => 'The address may not be greater than 255 characters.',

            'building_name.required' => 'The company building name is required.',
            'building_name.max' => 'The company building name may not be greater than 255 characters.',
        ];
    }
}
