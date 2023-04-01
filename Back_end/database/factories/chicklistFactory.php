<?php

namespace Database\Factories;

use App\Models\controlerregester;
use App\Models\designation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\chicklist>
 */
class chicklistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'designation' => fake()->randomElement(designation::all())['designationName'],
            'qtyCompleted' => fake()->numberBetween(1,30),
            'remainingQty' => fake()->numberBetween(1,30),
            'personsNumber' => fake()->numberBetween(1,15),
            'blocName'=>fake()->numerify('bloc##'),
            'idControler'=>fake()->randomElement(controlerregester::all())['id'],
            'dateValidation'=>fake()->dateTimeBetween('-7 days', '+6 months')->format('Y-m-d')
        ];
    }
}
