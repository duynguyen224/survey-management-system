<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agencies = ['ARIS VN', 'FPT SOFTWARE'];

        foreach ($agencies as $agency) {
            Agency::create([
                'name' => $agency,
            ]);
        }
    }
}
