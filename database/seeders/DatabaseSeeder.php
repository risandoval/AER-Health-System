<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\fam_plan;
use App\Models\birth_method;
use App\Models\family_medical_history;
use App\Models\family_medical_spec;
use App\Models\fmh_operation;
use App\Models\immothers;
use App\Models\immu_adult;
use App\Models\Immu_Children;
use App\Models\Immu_eld;
use App\Models\Immu_preg;
use App\Models\Mens_history;
use App\Models\past_medical_history;
use App\Models\past_medical_spec;
use App\Models\pmh_operation;
use App\Models\preg_history;
use App\Models\Social_history;

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
            PpefSeeder::class
        ]);

        fam_plan::factory(10)->create();
        birth_method::factory(10)->create();
        family_medical_history::factory(10)->create();
        family_medical_spec::factory(10)->create();
        fmh_operation::factory(10)->create();
        immothers::factory(10)->create();
        immu_adult::factory(10)->create();
        Immu_Children::factory(10)->create();
        Immu_eld::factory(10)->create();
        Immu_preg::factory(10)->create();
        mens_history::factory(10)->create();
        past_medical_history::factory(10)->create();
        past_medical_spec::factory(10)->create();
        pmh_operation::factory(10)->create();
        preg_history::factory(10)->create();
        Social_history::factory(10)->create();
    }
}
