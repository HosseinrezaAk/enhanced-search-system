<?php

namespace App\Repositories\Genre;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;
use App\Repositories\Genre\GenreRepositoryInterface;

class GenreRepository implements GenreRepositoryInterface
{

    public function getAllGenres()
    {
        return Genre::all();
    }

    public function createGenre(array $genreData)
    {
        return Genre::create($genreData);
    }
    public function getGenreById($genreId)
    {
       return Genre::findOrFail($genreId);
    }

    public function updateGenre($genreId, array $genreData)
    {
        $genre = Genre::findOrFail($genreId);
        $genre->update($genreData);
        return $genre;
    }
    public function deleteGenre($genreId): bool
    {
        $genre = Genre::findOrFail($genreId);

        if ($genre->movies()->count() > 0) {
            return false;
        }

        $genre->delete();
        return true;

    }




}
