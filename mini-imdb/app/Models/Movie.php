<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'rank',
        'description',
    ];

    public function crews(){
        
        return $this->BelongsToMany(Crew::class);
    }

    public function genre(){
        return $this->BelongsTo(Genre::class);
    }
}
