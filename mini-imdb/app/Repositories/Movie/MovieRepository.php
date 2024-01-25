<?php

namespace App\Repositories\Movie;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Repositories\Movie\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{

    public function getAllMovies()
    {
        // TODO: Implement getAllMovies() method.
    }

    public function getMovieById($movieId)
    {
        // TODO: Implement getMovieById() method.
    }

    public function deleteMovie($movieId)
    {
        // TODO: Implement deleteMovie() method.
    }

    public function createMovie(StoreMovieRequest $request)
    {
        // TODO: Implement createMovie() method.
    }

    public function updateMovie($movieId, UpdateMovieRequest $request)
    {
        // TODO: Implement updateMovie() method.
    }
}
