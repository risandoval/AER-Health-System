<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\birth_method>
 */
class Birth_methodFactory extends Factory
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
            
            'one_ef_client_id' => $faker->unique()->numberBetween(1, 10),
            'ONE_BC_BCM' => $faker->word,
            'ONE_BC_CYCLE' => $faker->numberBetween(1, 10),

        ];
    }
}
