<?php

namespace Database\Seeders;

use App\Models\PastMedicalSpec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PastMedicalSpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $pmSpecs = [
            [
                'one_ef_client_id' => '1',
                'ONE_EF_HIGHESTSYSTOLIC' => '168',
                'ONE_EF_HIGHESTDIASTOLIC' => '102',
            ],
            [
                'one_ef_client_id' => '2',
                'ONE_EF_ORGANCANCER' => 'Lung Cancer',
            ],
            [
                'one_ef_client_id' => '3',
                'ONE_EF_ALLERGY' => 'Shrimp Fish Chicken',
                'ONE_EF_PULTUB' => 'Category II',
            ],
        ];

        foreach($pmSpecs as $pmSpec){
            PastMedicalSpec::create($pmSpec);
        }
    }
}
