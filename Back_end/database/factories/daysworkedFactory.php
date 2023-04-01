<?php

namespace Database\Factories;

use App\Models\chicklist;
use App\Models\controlerregester;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\daysworked>
 */
class daysworkedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idControler'=>fake()->randomElement(controlerregester::all())['id'],
            'dateValidation'=>fake()->randomElement(chicklist::all())['dateValidation'],
            'blocName'=>fake()->randomElement(chicklist::all())['blocName'],

        ];
    }
}
