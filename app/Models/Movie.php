<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        "imdbID",
        "title",
        "year",
        "rated",
        "released",
        "runtime",
        "genre",
        "director",
        "writer",
        "actors",
        "plot",
        "language",
        "country",
        "awards",
        "poster",
        "ratings",
        "metascore",
        "imdbRating",
        "imdbVotes",
        "type",
        "DVD",
        "boxOffice",
        "production",
        "website",
    ];
}
