<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\controlerregester;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\controlerlogin>
 */
class controlerloginFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username'=>fake()->unique()->name(),
            'password'=>fake()->unique()->password(),
            'idCard'=>fake()->unique()->randomElement(controlerregester::all())['idCard'],
            'token'=>Str::random(10),

        ];
    }
}
