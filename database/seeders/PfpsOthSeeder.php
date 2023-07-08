<?php

namespace Database\Seeders;

use App\Models\Pfps_Oth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PfpsOthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pfpsoths = [
            [
                'one_ef_client_id' => '1',
                'ONE_EF_HEENTOTH' => 'others for heent',
                'ONE_PH_HEARTOTH' => 'others for heart',
                'ONE_PA_ABDOMENOTH' => 'others for abdomen',
                'ONE_PD_RECTALOTH' => 'others for dre'
            ],

            [
                'one_ef_client_id' => '2',
                'ONE_PG_GENITOTH' => 'others for genit'
            ],

        ];

        foreach ($pfpsoths as $pfpsoth) {
            Pfps_Oth::create($pfpsoth);
        }
    }
}
