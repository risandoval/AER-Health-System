<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Abdomen;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Heent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Client::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PastMedicalSpecSeeder::class,
            PastMedicalHistorySeeder::class,

            // LAGI MAY SEEDER (e.g. ModelNameSeeder)
            PpefSeeder::class,
            HeentSeeder::class,
            CblSeeder::class,
            HeartSeeder::class,
            AbdomenSeeder::class,
            GenitourinarySeeder::class,
            DreSeeder::class
        ]);

    }
}
