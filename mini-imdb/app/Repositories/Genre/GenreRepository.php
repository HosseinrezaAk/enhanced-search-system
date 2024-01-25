<?php

namespace App\Repositories\Genre;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Repositories\Genre\GenreRepositoryInterface;

class GenreRepository implements GenreRepositoryInterface
{

    public function getAllGenres()
    {
        // TODO: Implement getAllGenres() method.
    }

    public function getGenreById($genreId)
    {
        // TODO: Implement getGenreById() method.
    }

    public function deleteGenre($genreId)
    {
        // TODO: Implement deleteGenre() method.
    }

    public function createGenre(StoreGenreRequest $request)
    {
        // TODO: Implement createGenre() method.
    }

    public function updateGenre($genreId, UpdateGenreRequest $request)
    {
        // TODO: Implement updateGenre() method.
    }
}
