<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\past_medical_spec>
 */
class PastMedicalSpecFactory extends Factory
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
            'ONE_EF_ALLERGY' => $faker->word,
            'ONE_EF_ORGANCANCER' => $faker->word,
            'ONE_EF_HEPATYPE' => $faker->word,
            'ONE_EF_HIGHESTSYSTOLIC' => $faker->randomNumber(3),
            'ONE_EF_HIGHESTDIASTOLIC' => $faker->randomNumber(3),
            'ONE_EF_PULTUB' => $faker->word,
            'ONE_EF_EXPULTUB' => $faker->word,
            'ONE_EF_PMHOTHERS' => $faker->word,
        ];
    }
}
