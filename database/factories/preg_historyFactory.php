<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\preg_history>
 */
class Preg_historyFactory extends Factory
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
            'ONE_EF_LIVCHILD' => $faker->numberBetween(0, 10),
            'ONE_EF_ABORT' => $faker->numberBetween(0, 10),
            'ONE_EF_PREMATURE' => $faker->numberBetween(0, 10),
            'ONE_EF_FULLTERM' => $faker->numberBetween(0, 10),
            'ONE_EF_DELIVERYTYPE' => $faker->word,
            'ONE_EF_PARI' => $faker->numberBetween(0, 10),
            'ONE_EF_GRAV' => $faker->numberBetween(0, 10),
            'ONE_EF_ECLAMPSIA' => $faker->word,
        ];
    }
}
