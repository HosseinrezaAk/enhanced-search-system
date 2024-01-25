<?php

namespace Database\Factories;

use App\Models\Crew;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'genre_id'=> Genre::all()->random()->id,
            'title'=> fake()->sentence(2),
            'year'=> fake()->year,
            'rank'=> fake()->randomfloat(2,0,10),
            'description' => fake()->paragraph(2),
        ];
    }

    public function configure(): Factory|MovieFactory
    {
        return $this->afterCreating(function (Movie $movie) {

            $crewIds = Crew::all()->random(3)->pluck('id')->toArray();
            $movie->crews()->attach($crewIds);
        });
    }
}
