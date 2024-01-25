<?php

namespace App\Repositories\Genre;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;

interface GenreRepositoryInterface
{
    public function getAllGenres();
    public function createGenre(StoreGenreRequest $request);
    public function getGenreById($genreId);
    public function updateGenre($genreId, UpdateGenreRequest $request);
    public function deleteGenre($genreId);


}
