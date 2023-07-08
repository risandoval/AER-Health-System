<?php

namespace Database\Seeders;

use App\Models\Dre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dres = [
            [
                'one_ef_client_id' => '1',
                'ONE_PD_RECTAL' => 'Enlarge Prostate'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PD_RECTAL' => 'Mass'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PD_RECTAL' => 'Others'
            ],

            [
                'one_ef_client_id' => '2',
                'ONE_PD_RECTAL' => 'Not Applicable'
            ],
            [
                'one_ef_client_id' => '2',
                'ONE_PD_RECTAL' => 'Hemorrhoids'
            ],
            
            [
                'one_ef_client_id' => '3',
                'ONE_PD_RECTAL' => 'Others'
            ],
        ];

        foreach ($dres as $dre) {
            Dre::create($dre);
        }
    }
}
