<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\immothers>
 */
class ImmothersFactory extends Factory
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
            'ONE_EF_IMMCHILDOTH' => $faker->word,
            'ONE_EF_IMMADULTOTH' => $faker->word,
            'ONE_EF_IMMPREGOTH' => $faker->word,
            'ONE_EF_IMMELDOTH' => $faker->word,
        ];
    }
}
