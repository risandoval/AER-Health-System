<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OneEfClient>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //  protected $model = OneEfClient::class;
    
    //php artisan make:factory fam_plan

    public function definition(): array
    {

        $faker = FakerFactory::create();
        return [
            'ONE_EF_HSAD' => $faker->date(),
            'ONE_EF_PIN' => $faker->numberBetween(100000000000, 999999999999),
            'ONE_EF_ATC' => $faker->randomNumber(),
            'ONE_EF_LASTNAME' => $faker->lastName,
            'ONE_EF_FIRSTNAME' => $faker->firstName,
            'ONE_EF_MIDDLENAME' => $faker->firstName,
            'ONE_EF_EXTENSIONNAME' => $faker->suffix,
            'ONE_EF_BDAY' => $faker->date(),
            'ONE_EF_SEX' => $faker->randomElement(['Male', 'Female']),
            'ONE_EF_BRGY' => $faker->address,
        ];
    }
}


