<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Abdomen;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\PastMedicalHistory;
use App\Models\PastMedicalSpec;
use App\Models\Fam_plan;
use App\Models\Birth_method;
use App\Models\Family_medical_history;
use App\Models\Family_medical_spec;
use App\Models\Fmh_operation;
use App\Models\Immothers;
use App\Models\Immu_adult;
use App\Models\Immu_Children;
use App\Models\Immu_eld;
use App\Models\Immu_preg;
use App\Models\Mens_history;
use App\Models\Pmh_operation;
use App\Models\Preg_history;
use App\Models\Social_history;
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
        // Client::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            // PastMedicalSpecSeeder::class,
            // PastMedicalHistorySeeder::class,
            // PpefSeeder::class,
            // HeentSeeder::class,
            // CblSeeder::class,
            // HeartSeeder::class,
            // AbdomenSeeder::class,
            // GenitourinarySeeder::class,
            // DreSeeder::class,
            // SkinSeeder::class,
            // NeuroExamSeeder::class,
            // PfpsOthSeeder::class,
            // NcdHraSeeder::class
        ]);

        // PastMedicalHistory::factory(10)->create();
        // PastMedicalSpec::factory(10)->create();
        // Pmh_operation::factory(10)->create();
        // Fam_plan::factory(10)->create();
        // Birth_method::factory(10)->create();
        // Family_medical_history::factory(10)->create();
        // Family_medical_spec::factory(10)->create();
        // Fmh_operation::factory(10)->create();
        // Immothers::factory(10)->create();
        // Immu_adult::factory(10)->create();
        // Immu_Children::factory(10)->create();
        // Immu_eld::factory(10)->create();
        // Immu_preg::factory(10)->create();
        // Mens_history::factory(10)->create();
        
        // Preg_history::factory(10)->create();
        // Social_history::factory(10)->create();
    }
}
