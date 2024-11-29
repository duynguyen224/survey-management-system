<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;

class EngineerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = bcrypt('123456');

        // ARIS
        $arisAdmin = User::where('name', 'aris.admin')->first();

        // ARIS engineers
        for ($i = 1; $i <= 30; $i++) {
            User::create([
                'name' => 'ARIS engineer' . $i,
                'email' => 'aris.engineer' . $i . '@gmail.com',
                'password' => $password,
                'type' => UserType::ENGINEER->value,
                'agency_id' => $arisAdmin->agency_id,
            ]);
        }
    }
}
