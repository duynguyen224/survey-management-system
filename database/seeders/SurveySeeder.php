<?php

namespace Database\Seeders;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Survey::factory()->count(50)->create();

        $arisAdmin = User::where('name', 'aris.admin')->first();

        Survey::query()->update(
            [
                'agency_id' => $arisAdmin->agency_id,
                'created_by_id' => $arisAdmin->id,
                'created_by_name' => $arisAdmin->name,
                'updated_by_id' => $arisAdmin->id,
                'updated_by_name' => $arisAdmin->name,
            ]
        );
    }
}
