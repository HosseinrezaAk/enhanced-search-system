<?php

namespace App\Repositories\Crew;

use App\Http\Requests\StoreCrewRequest;
use App\Http\Requests\UpdateCrewRequest;

interface CrewRepositoryInterface
{
    public function getAllCrews();
    public function getCrewById($crewId);
    public function deleteCrew($crewId);
    public function createCrew(StoreCrewRequest $request);
    public function updateCrew($crewId, UpdateCrewRequest $request);
}
