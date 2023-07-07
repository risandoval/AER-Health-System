<?php

namespace Database\Seeders;

use App\Models\Neuro_Exam;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NeuroExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $neuros = [
            [
                'one_ef_client_id' => '1',
                'ONE_PN_NEURO' => 'Abnormal position sense'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PN_NEURO' => 'Poor muscle tone/strength'
            ],

            [
                'one_ef_client_id' => '2',
                'ONE_PN_NEURO' => 'Abnormal sensation'
            ],
            [
                'one_ef_client_id' => '2',
                'ONE_PN_NEURO' => 'Poor/altered memory'
            ],

            [
                'one_ef_client_id' => '3',
                'ONE_PN_NEURO' => 'Abnormal position sense'
            ]
        ];

        foreach ($neuros as $neuro) {
            Neuro_Exam::create($neuro);
        }
    }
}
