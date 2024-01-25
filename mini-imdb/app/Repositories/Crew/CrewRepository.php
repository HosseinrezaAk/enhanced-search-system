<?php

namespace App\Repositories\Crew;

use App\Http\Requests\StoreCrewRequest;
use App\Http\Requests\UpdateCrewRequest;
use App\Repositories\Crew\CrewRepositoryInterface;

class CrewRepository implements CrewRepositoryInterface
{

    public function getAllCrews()
    {
        // TODO: Implement getAllCrews() method.
    }

    public function getCrewById($crewId)
    {
        // TODO: Implement getCrewById() method.
    }

    public function deleteCrew($crewId)
    {
        // TODO: Implement deleteCrew() method.
    }

    public function createCrew(StoreCrewRequest $request)
    {
        // TODO: Implement createCrew() method.
    }

    public function updateCrew($crewId, UpdateCrewRequest $request)
    {
        // TODO: Implement updateCrew() method.
    }
}
