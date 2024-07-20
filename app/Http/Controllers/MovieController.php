<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Js;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use stdClass;

class MovieController extends Controller
{
    protected static function parse(string $id): array
    {
        $movieJSON = Http::get(
            config('services.omdbapi.url'),
            [
                'apiKey' => config('services.omdbapi.key'),
                'i' => $id
            ]
        )->json();

        $movie = [
            "imdbID" => $movieJSON['imdbID'],
            "title" => $movieJSON['Title'],
            "year" => intval($movieJSON['Year']),
            "rated" => $movieJSON['Rated'],
            "released" => $movieJSON['Released'],
            "runtime" => $movieJSON['Runtime'],
            "genre" => $movieJSON['Genre'],
            "director" => $movieJSON['Director'],
            "writer" => $movieJSON['Writer'],
            "actors" => $movieJSON['Actors'],
            "plot" => $movieJSON['Plot'],
            "language" => $movieJSON['Language'],
            "country" => $movieJSON['Country'],
            "awards" => $movieJSON['Awards'],
            "poster" => $movieJSON['Poster'],
            "ratings" => json_encode($movieJSON['Ratings']),
            "metascore" => $movieJSON['Metascore'],
            "imdbRating" => floatval($movieJSON['imdbRating']),
            "imdbVotes" => floatval($movieJSON['imdbVotes']),
            "type" => $movieJSON['Type'],
            "DVD" => $movieJSON['DVD'],
            "boxOffice" => $movieJSON['BoxOffice'],
            "production" => $movieJSON['Production'],
            "website" => $movieJSON['Website'],
        ];

        return $movie;
    }

    public function index()
    {
        $movies = Movie::all()->toArray();

        foreach ($movies as $movieKey => $movieValue) {
            $movies[$movieKey]['ratings'] = json_decode($movieValue['ratings'], true);
        }

        return view('app')->with(
            ['movies' => $movies]
        );
    }

    /**
     * Summary of show
     * @param string $id imdbID
     * @var mixed $movie
     * @return mixed|\Illuminate\Contracts\View\View
     */
    public function show(string $id)
    {
        $movie = Movie::select('*')->where('imdbID', '=', $id)->first();
        
        if ($movie) {
            $movie = $movie->toArray();
        } else {
            $movie = static::parse($id);
            
            $movie['created_at'] = now();
            $movie['updated_at'] = now();
            
            Movie::insert($movie);
        }
        
        $movie['ratings'] = json_decode($movie['ratings'], true);

        return view('app')
            ->with(['movies' => [$movie]]);
    }
}
