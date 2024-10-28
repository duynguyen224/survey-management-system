<?php

namespace Database\Seeders;

use App\Enums\Role as RoleEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            RoleEnum::SystemAdmin->value,
            RoleEnum::AgencyAdmin->value,
            RoleEnum::User->value
        ];

        foreach ($roles as $roleName) {
            Role::create([
                'name' => $roleName,
            ]);
        }
    }
}
