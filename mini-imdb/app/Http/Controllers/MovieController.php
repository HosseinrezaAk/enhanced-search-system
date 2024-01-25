<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Repositories\Movie\MovieRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private MovieRepositoryInterface $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
           'response' => $this->movieRepository->getAllMovies()
        ]);
    }

    public function store(StoreMovieRequest $request){

        //

    }
}
