<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crew>
 */
class CrewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->firstName,
            'family' => fake()->lastName,
            'role'=> fake()->randomElement(['Director','Producer','Actor','Screenwriter','Production Designer','Composer']),
            'birthdate' =>fake()->date,
        ];
    }
}
