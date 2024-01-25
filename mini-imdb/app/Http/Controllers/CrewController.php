<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCrewRequest;
use App\Http\Requests\UpdateCrewRequest;
use App\Models\Crew;
use App\Repositories\Crew\CrewRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CrewController extends Controller
{

    private CrewRepositoryInterface $crewRepository;
    public function __construct(CrewRepositoryInterface $crewRepository)
    {
        $this->crewRepository = $crewRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
           'result' => $this->crewRepository->getAllCrews()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCrewRequest $request): JsonResponse
    {
        $crewData = $request->only([
            'name',
            'family',
            'role',
        ]);

        return response()->json([
            'result' => $this->crewRepository->createCrew($crewData)
        ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($crewId)
    {
        return response()->json([
            'result' => $this->crewRepository->getCrewById($crewId)
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCrewRequest $request, $crewId)
    {
        $crewData = $request->all();

        return response()->json([
            'result' => $this->crewRepository->updateCrew($crewId, $crewData)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($crewId)
    {

        $this->crewRepository->deleteCrew($crewId);
        return response()->json(['message' => 'Crew member deleted successfully']);
    }
}
