<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;
use App\Repositories\Genre\GenreRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenreController extends Controller
{

    private GenreRepositoryInterface $genreRepository;

    public function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
           'result' => $this->genreRepository->getAllGenres()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request): JsonResponse
    {
        return response()->json([
            'result' => $this->genreRepository->createGenre($request->all())
        ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($genreId): JsonResponse
    {
        return response()->json([
           'result' => $this->genreRepository->getGenreById($genreId)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, $genreId): JsonResponse
    {
        return response()->json([
            'result' => $this->genreRepository->updateGenre($genreId, $request->all()),
            'message' => 'Genre updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($genreId): JsonResponse
    {
        $result = $this->genreRepository->deleteGenre($genreId);

        if ($result === false) {
            return response()->json(['error' => 'Cannot delete genre with associated movies.'], Response::HTTP_CONFLICT);
        }

        return response()->json(['message' => 'Genre deleted successfully']);
    }
}
