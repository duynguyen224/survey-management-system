<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AgencySeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            SurveySeeder::class,
        ]);
    }
}
