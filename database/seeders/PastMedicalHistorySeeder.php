<?php

namespace Database\Seeders;

use App\Models\PastMedicalHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PastMedicalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pmhs = [

            [
                'one_ef_client_id' => '1',
                'ONE_PM_PMH' => 'Asthma',
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PM_PMH' => 'Hypertension',
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PM_PMH' => 'Diabetes',
            ],


            [
                'one_ef_client_id' => '2',
                'ONE_PM_PMH' => 'Cancer',
            ],
            [
                'one_ef_client_id' => '2',
                'ONE_PM_PMH' => 'Urinary Tract Infection',
            ],


            [
                'one_ef_client_id' => '3',
                'ONE_PM_PMH' => 'Allergy',
            ],
            [
                'one_ef_client_id' => '3',
                'ONE_PM_PMH' => 'Pulmonary Tuberculosis',
            ],

        ];

        foreach($pmhs as $pmh){
            PastMedicalHistory::create($pmh);
        }
    }
}
