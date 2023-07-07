<?php

namespace Database\Seeders;

use App\Models\Abdomen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbdomenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abdomens = [
            [
                'one_ef_client_id' => '1',
                'ONE_PA_ABDOMEN' => 'Abdominal rigidity'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PA_ABDOMEN' => 'Hyperactive bowel sounds'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PA_ABDOMEN' => 'Others'
            ],

            [
                'one_ef_client_id' => '2',
                'ONE_PA_ABDOMEN' => 'Abdominal rigidity'
            ],
            [
                'one_ef_client_id' => '2',
                'ONE_PA_ABDOMEN' => 'Hyperactive bowel sounds'
            ],

            [
                'one_ef_client_id' => '3',
                'ONE_PA_ABDOMEN' => 'Abdominal rigidity'
            ],
            [
                'one_ef_client_id' => '3',
                'ONE_PA_ABDOMEN' => 'Hyperactive bowel sounds'
            ]
        ];

        foreach ($abdomens as $abdomen) {
            Abdomen::create($abdomen);
        }
    }
}
