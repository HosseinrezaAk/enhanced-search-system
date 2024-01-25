<?php

namespace App\Repositories\Crew;

use App\Http\Requests\StoreCrewRequest;
use App\Http\Requests\UpdateCrewRequest;

interface CrewRepositoryInterface
{
    public function getAllCrews();
    public function createCrew(array $crewData);
    public function getCrewById($crewId);
    public function updateCrew($crewId, array $crewData);
    public function deleteCrew($crewId);


}
