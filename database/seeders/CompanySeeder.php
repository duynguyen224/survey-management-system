<?php

namespace Database\Seeders;

use App\Models\Agency;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arisAgency = Agency::where('name', 'ARIS VN')->first();

        Company::create([
            'name' => 'Tech Innovators',
            'person_in_charge_name' => 'Alice Johnson',
            'person_in_charge_email' => 'alice@techinnovators.com',
            'postal_code' => '12345',
            'prefecture' => 'Tokyo',
            'address' => '1-2-3 Chiyoda',
            'building_floor' => 'Tech Tower',
            'agency_id' => $arisAgency->id,
        ]);

        Company::create([
            'name' => 'Global Solutions',
            'person_in_charge_name' => 'Bob Smith',
            'person_in_charge_email' => 'bob@globalsolutions.com',
            'postal_code' => '67890',
            'prefecture' => 'Osaka',
            'address' => '4-5-6 Naniwa',
            'building_floor' => 'Global Plaza',
            'agency_id' => $arisAgency->id,
        ]);

        Company::create([
            'name' => 'Innovatech',
            'person_in_charge_name' => 'Charlie Brown',
            'person_in_charge_email' => 'charlie@innovatech.com',
            'postal_code' => '11223',
            'prefecture' => 'Kyoto',
            'address' => '7-8-9 Shimogyo',
            'building_floor' => 'Innovatech Building',
            'agency_id' => $arisAgency->id,
        ]);

        Company::create([
            'name' => 'Pioneer Corp',
            'person_in_charge_name' => 'David Lee',
            'person_in_charge_email' => 'david@pioneercorp.com',
            'postal_code' => '44556',
            'prefecture' => 'Nagoya',
            'address' => '10-11-12 Naka',
            'building_floor' => 'Pioneer Tower',
            'agency_id' => $arisAgency->id,
        ]);

        Company::create([
            'name' => 'Synergy Works',
            'person_in_charge_name' => 'Eve Adams',
            'person_in_charge_email' => 'eve@synergyworks.com',
            'postal_code' => '77889',
            'prefecture' => 'Fukuoka',
            'address' => '13-14-15 Hakata',
            'building_floor' => 'Synergy Center',
            'agency_id' => $arisAgency->id,
        ]);

        Company::create([
            'name' => 'Mouse Works',
            'person_in_charge_name' => 'Evemouse Adams',
            'person_in_charge_email' => 'evemouse@synergyworks.com',
            'postal_code' => '77889',
            'prefecture' => 'Fukuoka',
            'address' => '13-14-15 Hakata',
            'building_floor' => 'Synergy Center',
            'agency_id' => $arisAgency->id,
        ]);
    }
}
