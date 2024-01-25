<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'family',
        'role',
        'birthdate'
    ];

    public function movies(): BelongsToMany
    {
        return $this->BelongsToMany(Movie::class);
    }
}
