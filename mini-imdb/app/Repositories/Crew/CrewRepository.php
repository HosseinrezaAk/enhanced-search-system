<?php

namespace App\Repositories\Crew;

use App\Http\Requests\StoreCrewRequest;
use App\Http\Requests\UpdateCrewRequest;
use App\Models\Crew;
use App\Repositories\Crew\CrewRepositoryInterface;

class CrewRepository implements CrewRepositoryInterface
{

    public function getAllCrews()
    {
        return Crew::all();
    }

    public function getCrewById($crewId)
    {
        return Crew::findOrfail($crewId);
    }

    public function deleteCrew($crewId)
    {
        Crew::destroy($crewId);
    }

    public function createCrew(StoreCrewRequest $request)
    {
        return Crew::create($request->all());
    }

    public function updateCrew($crewId, UpdateCrewRequest $request)
    {
        $crew = Crew::findOrFail($crewId);
        return $crew->update($request->all());

    }
}
