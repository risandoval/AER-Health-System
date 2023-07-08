<?php

namespace Database\Seeders;

use App\Models\Genitourinary;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenitourinarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genits = [
            [
                'one_ef_client_id' => '1',
                'ONE_PG_GENIT' => 'Blood stained in exam finger'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PG_GENIT' => 'Cervical dilatation'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PG_GENIT' => 'Presence of abnormal discharge'
            ],

            [
                'one_ef_client_id' => '2',
                'ONE_PG_GENIT' => 'Cervical dilatation'
            ],
            [
                'one_ef_client_id' => '2',
                'ONE_PG_GENIT' => 'Others'
            ],

            [
                'one_ef_client_id' => '3',
                'ONE_PG_GENIT' => 'Presence of abnormal discharge'
            ]
        ];

        foreach ($genits as $genit) {
            Genitourinary::create($genit);
        }   
    }
}
