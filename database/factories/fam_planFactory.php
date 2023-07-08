<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Fam_planFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();
        return [
            // 'ONE_EF_FPC' => $faker->text(),
            'one_ef_client_id' => $faker->numberBetween(1, 10),
            'ONE_EF_FPC' => $faker->randomElement(['Yes', 'No']),
       
        ];
    }
}


