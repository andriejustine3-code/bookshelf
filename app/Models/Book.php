<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //Telling actual name of table if naming convention is not followed.
    //protected $table = 'books';

    public $timestamps = false;

    // Mass assignment of create/update
    protected $fillable = [
        'title',
        'author',
        'genre',
        'cover',
    ];

    
}
