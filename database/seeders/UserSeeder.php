<?php

namespace Database\Seeders;

use App\Enums\Role as RoleEnum;
use App\Models\Agency;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // System admin
        $systemAdminRole = Role::findByName(RoleEnum::SystemAdmin->value);
        
        $systemAdmin = User::create([
            'name' => 'system.admin',
            'email' => 'system.admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $systemAdmin->assignRole($systemAdminRole);

        // Agency admin
        $agencyAdmin = Role::findByName(RoleEnum::AgencyAdmin->value);

        // ARIS
        $arisAgency = Agency::where('name', 'ARIS VN')->first();
        $arisAdmin = User::create([
            'name' => 'aris.admin',
            'email' => 'aris.admin@gmail.com',
            'password' => bcrypt('123456'),
            'agency_id' => $arisAgency->id,
        ]);
        $arisAdmin->assignRole($agencyAdmin);

        // FPT Software
        $fptAgency = Agency::where('name', 'FPT SOFTWARE')->first();
        $fptAdmin = User::create([
            'name' => 'fpt.admin',
            'email' => 'fpt.admin@gmail.com',
            'password' => bcrypt('123456'),
            'agency_id' => $fptAgency->id,
        ]);
        $fptAdmin->assignRole($agencyAdmin);

        // Normal ARIS user
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'ARIS user' . $i,
                'email' => 'aris.user' . $i . '@gmail.com',
                'password' => bcrypt('123456'),
                'agency_id' => $arisAgency->id,
            ]);
        }

        // Normal FPT user
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'FPT user' . $i,
                'email' => 'fpt.user' . $i . '@gmail.com',
                'password' => bcrypt('123456'),
                'agency_id' => $fptAgency->id,
            ]);
        }
    }
}
