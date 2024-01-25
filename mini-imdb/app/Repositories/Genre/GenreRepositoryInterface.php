<?php

namespace App\Repositories\Genre;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;

interface GenreRepositoryInterface
{
    public function getAllGenres();
    public function createGenre(array $genreData);
    public function getGenreById($genreId);
    public function updateGenre($genreId, array $genreData);
    public function deleteGenre($genreId);


}
