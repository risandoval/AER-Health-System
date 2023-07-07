<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\social_history>
 */
class Social_historyFactory extends Factory
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
            'ONE_EF_SMOKE' => $faker->randomElement(['Yes', 'No']),
            'ONE_EF_PACKS' => $faker->numberBetween(1, 30),
            'ONE_EF_ALC' => $faker->randomElement(['Yes', 'No']),
            'ONE_EF_BOT' => $faker->numberBetween(1, 30),
            'ONE_EF_DRUGS' => $faker->randomElement(['Yes', 'No']),
            'ONE_EF_SEXACTIVE' => $faker->randomElement(['Yes', 'No']),
            'ONE_EF_IMMUNO' => $faker->randomElement(['Yes', 'No']),
        ];
    
    }
}
