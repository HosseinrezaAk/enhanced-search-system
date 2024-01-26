<?php

namespace App\Repositories\Movie;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

interface MovieRepositoryInterface
{
    public function getAllMovies();
    public function createMovie(array $movieData);
    public function getMovieById($movieId);
    public function updateMovie($movieId, array $movieData);
    public function deleteMovie($movieId);

    public function searchMovies(array $criteria);

}
