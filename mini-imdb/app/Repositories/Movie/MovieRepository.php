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
        return Movie::create($movieData);
    }
    public function getMovieById($movieId)
    {
        return Movie::findOrFail($movieId);
    }
    public function updateMovie($movieId, array $movieData)
    {
        $movie = Movie::findOrFail($movieId);
        $movie->update($movieData);
        return $movie;
    }
    public function deleteMovie($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        $movie->crews()->detach();
        $movie->delete();
    }




}
