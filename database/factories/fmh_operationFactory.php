<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\fmh_operation>
 */
class Fmh_operationFactory extends Factory
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
            'ONE_FO_FHSH' => $faker->word,
            'ONE_FO_DFSO' => $faker->date(),
            'ONE_FO_FSO' => $faker->word,
        ];
    }
}
