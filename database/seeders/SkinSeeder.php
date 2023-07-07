<?php

namespace Database\Seeders;

use App\Models\Skin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skins = [
            [
                'one_ef_client_id' => '1',
                'ONE_PS_SKIN' => 'Essentially Normal'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PS_SKIN' => 'Clubbing'
            ],
            [
                'one_ef_client_id' => '1',
                'ONE_PS_SKIN' => 'Cold clammy'
            ],

            [
                'one_ef_client_id' => '2',
                'ONE_PS_SKIN' => 'Cyanosis/Molted skin'
            ],

            [
                'one_ef_client_id' => '3',
                'ONE_PS_SKIN' => 'Rashes/Petechiae'
            ]
        ];

        foreach ($skins as $skin) {
            Skin::create($skin);
        }
    }
}
