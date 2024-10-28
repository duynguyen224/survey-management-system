<?php

namespace Database\Seeders;

use App\Models\Company;
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
        $systemAdminRole = Role::findByName('System Admin');
        
        $systemAdmin = User::create([
            'name' => 'system.admin',
            'email' => 'system.admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $systemAdmin->assignRole($systemAdminRole);

        // Company admin
        $companyAdmin = Role::findByName('Company Admin');

        // ARIS
        $arisCompany = Company::where('name', 'ARIS VN')->first();
        $arisAdmin = User::create([
            'name' => 'aris.admin',
            'email' => 'aris.admin@gmail.com',
            'password' => bcrypt('123456'),
            'company_id' => $arisCompany->id,
        ]);
        $arisAdmin->assignRole($companyAdmin);

        // FPT Software
        $fptCompany = Company::where('name', 'FPT SOFTWARE')->first();
        $fptAdmin = User::create([
            'name' => 'fpt.admin',
            'email' => 'fpt.admin@gmail.com',
            'password' => bcrypt('123456'),
            'company_id' => $fptCompany->id,
        ]);
        $fptAdmin->assignRole($companyAdmin);

        // Normal ARIS user
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'ARIS user' . $i,
                'email' => 'aris.user' . $i . '@gmail.com',
                'password' => bcrypt('123456'),
                'company_id' => $arisCompany->id,
            ]);
        }

        // Normal FPT user
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'FPT user' . $i,
                'email' => 'fpt.user' . $i . '@gmail.com',
                'password' => bcrypt('123456'),
                'company_id' => $fptCompany->id,
            ]);
        }
    }
}
