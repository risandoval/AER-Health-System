<?php

namespace Database\Seeders;

use App\Models\Ncd_Hra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NcdHraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ncds = [
            [
                'one_ef_client_id' => '1',
                'ONE_EF_FATFOOD' => 'Yes',
                'ONE_EF_VEG' => 'Yes',
                'ONE_EF_FRUIT' => 'No',
                'ONE_EF_PHYACTIV' => 'Yes',
                'ONE_EF_DIABETES' => 'Yes',
                'ONE_EF_DIABETESYES' => 'No',
                'ONE_EF_SYMPTOMS'  => null,
                'ONE_EF_RBG' => 'Yes',
                'ONE_EF_FBSRBS' => 'fbsrbs',
                'ONE_EF_RBGL' => '43',
                'ONE_EF_RBGDATE' => '2023-07-25',
                'ONE_EF_RBL' => 'rbl',
                'ONE_EF_RBLDATE' => '2023-07-25',
                'ONE_EF_CHOLESTEROL'  => '21',
                'ONE_EF_KETONESPRES' => 'ketonespres',
                'ONE_EF_KETONES'  => '26',
                'ONE_EF_KETONESDATE' => '2023-07-25',
                'ONE_EF_PROTEINPRES' => 'proteinpres',
                'ONE_EF_PROTEIN' => '56',
                'ONE_EF_PROTEINDATE' => '2023-07-25',
                'ONE_EF_AHA' => 'aha',
                'ONE_EF_CHESTPAIN' => 'Yes',
                'ONE_EF_CENTERPAIN' => 'Yes',
                'ONE_EF_UPHILL' => 'No',
                'ONE_EF_WALKING' => 'Yes',
                'ONE_EF_TONGUE' => 'Yes',
                'ONE_EF_10M' => 'Yes',
                'ONE_EF_CHESTFRONT' => 'Yes',
                'ONE_EF_SATIA' => 'Yes',
                'ONE_EF_DIFF' => 'Yes',
                'ONE_EF_RISK' => 'Yes'
            ]
        ];

        foreach ($ncds as $ncd) {
            Ncd_Hra::create($ncd);
        }
    }
}
