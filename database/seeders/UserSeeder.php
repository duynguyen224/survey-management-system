<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        for ($i = 1; $i <= 50; $i++) {
            User::create([
                'name' => 'user' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'password' => bcrypt('123456'),
            ]);
        }
    }
}
