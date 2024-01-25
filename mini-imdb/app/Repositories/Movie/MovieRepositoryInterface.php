<?php

namespace App\Repositories\Movie;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

interface MovieRepositoryInterface
{
    public function getAllMovies();
    public function getMovieById($movieId);
    public function deleteMovie($movieId);
    public function createMovie(StoreMovieRequest $request);
    public function updateMovie($movieId, UpdateMovieRequest $request);
}
