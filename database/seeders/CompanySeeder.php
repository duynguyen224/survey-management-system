<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = ['ARIS VN', 'FPT SOFTWARE'];

        foreach ($companies as $company) {
            Company::create([
                'name' => $company,
            ]);
        }
    }
}
