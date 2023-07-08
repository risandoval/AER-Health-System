<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Mens_historyFactory extends Factory
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
            'ONE_EF_MENARCHE' => $faker->word,
            'ONE_EF_MENARCHEAGE' => $faker->numberBetween(1, 99),
            'ONE_EF_ONSETSEX' => $faker->numberBetween(0, 99),
            'ONE_EF_MENOP' => $faker->word,
            'ONE_EF_MENOPAGE' => $faker->numberBetween(40, 60),
            'ONE_EF_MENSDAYS' => $faker->numberBetween(1, 7),
            'ONE_EF_PADS' => $faker->numberBetween(1, 10),
        ];
    }
}
