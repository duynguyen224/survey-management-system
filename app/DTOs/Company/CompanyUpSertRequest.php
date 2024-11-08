<?php

namespace App\DTOs\Company;

use App\DTOs\SmsFormRequest;

class CompanyUpSertRequest extends SmsFormRequest
{
    public function rules()
    {
        $companyId = 0;
        
        $company = $this->route('company');
        if($company){
            $companyId = $company->id; // case update, check person_in_charge_email unique
        }

        $rules = [
            'name' => 'required|string|max:100',
            'person_in_charge_name' => 'required|string|max:100',
            'person_in_charge_email' => 'required|email|max:100|unique:companies,person_in_charge_email,' . $companyId,
            'postal_code' => 'required|string|max:50',
            'prefecture' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'building_floor' => 'required|string|max:100',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'The company name is required.',
            'name.max' => 'The company name may not be greater than 100 characters.',

            'person_in_charge_name.required' => 'The name of the person in charge is required.',
            'person_in_charge_name.max' => 'The name of the person in charge may not be greater than 100 characters.',

            'person_in_charge_email.required' => 'The email of the person in charge is required.',
            'person_in_charge_email.email' => 'The email of the person in charge must be a valid email address.',
            'person_in_charge_email.unique' => 'The email of the person in charge has already been taken.',
            'person_in_charge_email.max' => 'The email of the person in charge may not be greater than 100 characters.',

            'postal_code.required' => 'The postal code is required.',
            'postal_code.max' => 'The postal code may not be greater than 50 characters.',

            'prefecture.required' => 'The prefecture is required.',
            'prefecture.max' => 'The prefecture may not be greater than 100 characters.',

            'address.required' => 'The address is required.',
            'address.max' => 'The address may not be greater than 255 characters.',

            'building_floor.required' => 'The company building floor is required.',
            'building_floor.max' => 'The company building floor may not be greater than 100 characters.',
        ];
    }
}
