<?php

namespace App\Repository;

use App\Http\Requests\StoreCrewRequest;
use App\Http\Requests\UpdateCrewRequest;

interface CrewRepositoryInterface
{
    public function getAllCrews();
    public function getCrewById($crewId);
    public function deleteCrew($CrewId);
    public function createCrew(StoreCrewRequest $request);
    public function updateMovie($CrewId, UpdateCrewRequest $request);
}
