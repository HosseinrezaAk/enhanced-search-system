<?php

namespace App\Repositories\Crew;

use App\Http\Requests\StoreCrewRequest;
use App\Http\Requests\UpdateCrewRequest;
use App\Models\Crew;
use App\Repositories\Crew\CrewRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CrewRepository implements CrewRepositoryInterface
{

    public function getAllCrews(): Collection
    {
        return Crew::all();
    }
    public function createCrew(array $crewData)
    {
        return Crew::create($crewData);
    }
    public function getCrewById($crewId)
    {
        return Crew::findOrFail($crewId);
    }

    public function updateCrew($crewId, array $crewData)
    {
        $crew = Crew::findOrFail($crewId);
        $crew->update($crewData);
        return $crew;

    }
    public function deleteCrew($crewId): void
    {
        $crew = Crew::findOrFail($crewId);
        $crew->movies()->detach();
        $crew->delete();
    }

}
