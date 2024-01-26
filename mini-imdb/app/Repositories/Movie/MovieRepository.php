<?php

namespace App\Repositories\Movie;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use App\Repositories\Movie\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{

    public function getAllMovies()
    {
        return Movie::all();
    }
    public function createMovie(array $movieData)
    {
        $movie = Movie::create([
            'title' => $movieData['title'],
            'year' => $movieData['year'],
            'rank' => $movieData['rank'],
            'description' => $movieData['description'],
            'genre_id' => $movieData['genre_id'],
        ]);

        $movie->crews()->attach($movieData['crew_ids']);
        $movie->load('crews', 'genre');
        return $movie;
    }
    public function getMovieById($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        $movie->load('crews','genre');
        return $movie;
    }
    public function updateMovie($movieId, array $movieData)
    {
        $movie = Movie::findOrFail($movieId);

        $movie->update($movieData);

        if (isset($movieData['crew_ids'])) {
            $movie->crews()->sync($movieData['crew_ids']);
        }

        $movie->load('crews', 'genre');

        return $movie;
    }
    public function deleteMovie($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        $movie->crews()->detach();
        $movie->delete();
    }




}
