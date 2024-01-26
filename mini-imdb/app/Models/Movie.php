<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Movie extends Model
{
    use HasFactory;
    use Searchable;



    protected $fillable = [
        'title',
        'year',
        'rank',
        'description',
        'genre_id',
    ];

    public function crews(): BelongsToMany
    {

        return $this->BelongsToMany(Crew::class);
    }

    public function genre(): BelongsTo
    {
        return $this->BelongsTo(Genre::class);
    }

}
