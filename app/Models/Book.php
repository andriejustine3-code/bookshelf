<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Relationship;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\Publisher;
use App\Models\Book;
class Book extends Model
{
    //Telling actual name of table if naming convention is not followed.
    //protected $table = 'books';

    public $timestamps = false;

    // use softDeletes;
    // Mass assignment of create/update
    protected $fillable = [
        'title',
        'author',
        'genre',
        'cover',
        'publisher_id',
    ];

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
}
