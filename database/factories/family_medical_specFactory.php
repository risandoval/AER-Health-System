<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\family_medical_spec>
 */
class Family_medical_specFactory extends Factory
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
            'ONE_EF_FHALLERGY' => $faker->word,
            'ONE_EF_FHORGANCANCER' => $faker->word,
            'ONE_EF_FHHEPATYPE' => $faker->word,
            'ONE_EF_FHHIGH' => $faker->word,
            'ONE_EF_FHHIGHESTSYSTOLIC' => $faker->randomNumber(3),
            'ONE_EF_FHHIGHESTDIASTOLIC' => $faker->randomNumber(3),
            'ONE_EF_FHPULTUB' => $faker->word,
            'ONE_EF_FHEXPULTUB' => $faker->word,
            'ONE_EF_FHOTHERS' => $faker->word,
        ];
    }
}
