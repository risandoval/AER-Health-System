<?php

namespace Database\Seeders;

use App\Models\Heart;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hearts = [
            [
                'one_ef_client_id' => '1',
                'ONE_PH_HEART' => 'Displaced  apex beat'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PH_HEART' => 'Irregular rhythm'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PH_HEART' => 'Others'
            ],

            [
                'one_ef_client_id' => '2',
                'ONE_PH_HEART' => 'Irregular rhythm'
            ],

            [
                'one_ef_client_id' => '3',
                'ONE_PH_HEART' => 'Heaves/trills'
            ],
            [
                'one_ef_client_id' => '3',
                'ONE_PH_HEART' => 'Murmurs'
            ]
        ];

        foreach ($hearts as $heart) {
            Heart::create($heart);
        }
    }
}
