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
    public function createCrew(array $crewData)
    {
        return Crew::create($crewData);
    }
    public function getCrewById($crewId)
    {
        return Crew::findOrfail($crewId);
    }

    public function updateCrew($crewId, array $crewData)
    {
        $crew = Crew::findOrFail($crewId);
        $crew->update($crewData);
        return $crew;

    }
    public function deleteCrew($crewId)
    {
        $crew = Crew::findOrFail($crewId);
        $crew->movies()->detach();
        $crew->delete();
    }

}
