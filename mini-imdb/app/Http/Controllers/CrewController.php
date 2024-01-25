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

        return response()->json([
            'result' => $this->crewRepository->createCrew($request->all())
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


        return response()->json([
            'result' => $this->crewRepository->updateCrew($crewId, $request->all()),
            'message' => 'Crew member updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($crewId): JsonResponse
    {

        $this->crewRepository->deleteCrew($crewId);
        return response()->json(['message' => 'Crew member deleted successfully']);
    }
}
