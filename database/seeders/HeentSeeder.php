<?php

namespace Database\Seeders;

use App\Models\Heent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heents = [
            [
                'one_ef_client_id' => '1',
                'ONE_HE_HEENT' => 'Essentially Normal'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_HE_HEENT' => 'Icteric sclerae'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_HE_HEENT' => 'Others'
            ],



            [
                'one_ef_client_id' => '2',
                'ONE_HE_HEENT' => 'Abnormal pupillary reaction'
            ],
            [
                'one_ef_client_id' => '2',
                'ONE_HE_HEENT' => 'Pale conjuctive'
            ],


            [
                'one_ef_client_id' => '3',
                'ONE_HE_HEENT' => 'Essentially Normal'
            ],
            [
                'one_ef_client_id' => '3',
                'ONE_HE_HEENT' => 'Icteric sclerae'
            ]
        ];

        foreach ($heents as $heent) {
            Heent::create($heent);
        }
    }
}
