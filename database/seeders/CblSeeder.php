<?php

namespace Database\Seeders;

use App\Models\Cbl;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cbls = [
            [
                'one_ef_client_id' => '1',
                'ONE_PC_CBL' => 'Essentially Normal'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PC_CBL' => 'Abnormal pupillary reaction'
            ],

            [
                'one_ef_client_id' => '2',
                'ONE_PC_CBL' => 'Icteric sclerae'
            ],
            [
                'one_ef_client_id' => '2',
                'ONE_PC_CBL' => 'Pale conjuctive'
            ],

            [
                'one_ef_client_id' => '3',
                'ONE_PC_CBL' => 'Essentially Normal'
            ],
            [
                'one_ef_client_id' => '3',
                'ONE_PC_CBL' => 'Icteric sclerae'
            ]
        ];

        foreach ($cbls as $cbl) {
            Cbl::create($cbl);
        }
    }
}
