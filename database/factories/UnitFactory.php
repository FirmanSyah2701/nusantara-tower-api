<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unit_name' => 'Unit '.$this->faker->randomElement(['A', 'B', 'C', 'D']),
            'floor' => rand(1,2),
            'area' => rand(200,400).'m2',
        ];
    }
}
