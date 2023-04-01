<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin>
 */
class adminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->userName(),
            'ferst_name' => fake()->unique()->firstName(),
            'last_name' => fake()->unique()->lastName(),
            'password' => fake()->unique()->password(), // password
            'token' => Str::random(10),
        ];
    }
}
