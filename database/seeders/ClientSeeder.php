<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patients = [
            [
                'ONE_EF_HSAD' => '2023-07-03',
                'ONE_EF_PIN' => '091123456789',
                'ONE_EF_ATC' => '117958123',
                'ONE_EF_LASTNAME' =>'Padilla' ,
                'ONE_EF_FIRSTNAME' => 'Allen Josh',
                'ONE_EF_MIDDLENAME' => 'Arellano',
                'ONE_EF_EXTENSIONNAME' => '',
                'ONE_EF_BDAY' => '2000-04-02',
                'ONE_EF_SEX' => 'Male',
                'ONE_EF_BRGY' => 'Canmogsay',
            ],
        ];

        foreach($patients as $patient){
            Client::create($patient);
        }
    }
}
