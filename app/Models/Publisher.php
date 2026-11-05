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

class Publisher extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    // Defines the many relationship with the Book model
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
