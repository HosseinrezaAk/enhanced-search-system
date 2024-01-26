<?php

namespace App\Repositories\Movie;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use App\Repositories\Movie\MovieRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

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


    public function searchMovies(array $criteria): Collection|array
    {

        $cacheKey = 'movie_search_' . md5(json_encode($criteria));

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $query = Movie::query();
        if (isset($criteria['title'])) {
            $query->where('title', 'like', '%' . $criteria['title'] . '%');
        }

        if (isset($criteria['crew'])) {
            $query->whereHas('crews', function ($subQuery) use ($criteria) {
                $subQuery->where('name', 'like', '%' . $criteria['crew'] . '%');
            });
        }

        if (isset($criteria['genre'])) {
            $query->whereHas('genre', function ($subQuery) use ($criteria) {
                $subQuery->where('title', 'like', '%' . $criteria['genre'] . '%');
            });
        }

        if (isset($criteria['rank'])) {
            $query->where('rank', '>=', $criteria['rank']);
        }

        if (isset($criteria['year'])) {
            $query->where('year', '=', $criteria['year']);
        }
        $query->with('genre', 'crews');

        $result = $query->get();


        Cache::put($cacheKey, $result, 60);
        return $result;
    }

    public function searchElastic(array $criteria)
    {
        return Movie::search($criteria['query']);
    }

}
