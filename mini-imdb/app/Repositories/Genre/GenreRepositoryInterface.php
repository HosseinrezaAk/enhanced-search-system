<?php

namespace App\Repositories\Genre;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;

interface GenreRepositoryInterface
{
    public function getAllGenres();
    public function getGenreById($genreId);
    public function deleteGenre($genreId);
    public function createGenre(StoreGenreRequest $request);
    public function updateGenre($genreId, UpdateGenreRequest $request);
}
