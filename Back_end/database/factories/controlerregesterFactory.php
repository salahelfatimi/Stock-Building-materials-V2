<?php

namespace Database\Factories;

use App\Models\designation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\controlerregester>
 */
class controlerregesterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullName'=>fake()->name(),
            'idCard'=>fake()->unique()->numerify('EE####'),
            'Address'=>fake()->address(),
            'speciality'=>fake()->randomElement(designation::all())['speciality'],
            'phoneNum'=>fake()->phoneNumber(),
            'email'=>fake()->unique()->email(),
            'dateStart'=>fake()->date(),

                ];
    }
}
