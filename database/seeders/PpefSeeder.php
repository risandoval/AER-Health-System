<?php

namespace Database\Seeders;

use App\Models\Ppef;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PpefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ppefs = [
            [
                'one_ef_client_id' => '1',
                'ONE_EF_BPSYSTOLIC' => '100',
                'ONE_EF_BPDIASTOLIC' => '80',
                'ONE_EF_WEIGHT' => '45.6',
                'ONE_EF_HEIGHT' => '170.18',
                'ONE_EF_BMI' => '15.7',
                'ONE_EF_RESPRATE' => '20',
                'ONE_EF_VAL' => '20',
                'ONE_EF_VAR' => '20',
                'ONE_EF_TEMP' => '36.5',
                'ONE_EF_LENGTH' => '20',
                'ONE_EF_HCIRCUM' => '20',
                'ONE_EF_SKINFOLD' => '20',
                'ONE_EF_WAIST' => '32.3',
                'ONE_EF_MAUACIRCUM' => '20',
                'ONE_EF_HIP' => '34.6',
                'ONE_EF_LIMBS' => '20',
                'ONE_EF_BLOODTYPE' => 'AB',
                'ONE_EF_AAA' => 'Yes',
                'ONE_EF_AS' => 'Yes',
            ]
        ];

        foreach($ppefs as $ppef) {
            Ppef::create($ppef);
        }
    }
}
