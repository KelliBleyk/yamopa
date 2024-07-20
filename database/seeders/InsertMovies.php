<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsertMovies extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * @var object $movieObjectRaw
         * @var object $movieObject
         */
        $movieObjectRaw = json_decode(`{
  "Title": "Paprika",
  "Year": "2006",
  "Rated": "R",
  "Released": "22 Jun 2007",
  "Runtime": "90 min",
  "Genre": "Animation, Drama, Fantasy",
  "Director": "Satoshi Kon",
  "Writer": "Yasutaka Tsutsui, Seishi Minakami, Satoshi Kon",
  "Actors": "Megumi Hayashibara, Tôru Emori, Katsunosuke Hori",
  "Plot": "When a machine that allows therapists to enter their patients' dreams is stolen, all hell breaks loose. Only a young female therapist, Paprika, can stop it.",
  "Language": "Japanese, English",
  "Country": "Japan",
  "Awards": "6 wins & 5 nominations",
  "Poster": "https://m.media-amazon.com/images/M/MV5BNDI4MGEwZDAtZDg0Yy00MjFhLTg1MjctODdmZTMyNTUyNDI3L2ltYWdlXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SX300.jpg",
  "Ratings": [
    { "Source": "Internet Movie Database", "Value": "7.7/10" },
    { "Source": "Rotten Tomatoes", "Value": "86%" },
    { "Source": "Metacritic", "Value": "81/100" }
  ],
  "Metascore": "81",
  "imdbRating": "7.7",
  "imdbVotes": "98,023",
  "imdbID": "tt0851578",
  "Type": "movie",
  "DVD": "N/A",
  "BoxOffice": "$882,267",
  "Production": "N/A",
  "Website": "N/A",
  "Response": "True"
}`);

        $movieObject = [
            "imdbID" => $movieObjectRaw->imdbID,
            "title" => $movieObjectRaw->Title,
            "year" => intval($movieObjectRaw->Year),
            "rated" => $movieObjectRaw->Rated,
            "released" => $movieObjectRaw->Released,
            "runtime" => $movieObjectRaw->Runtime,
            "genre" => $movieObjectRaw->Genre,
            "director" => $movieObjectRaw->Director,
            "writer" => $movieObjectRaw->Writer,
            "actors" => $movieObjectRaw->Actors,
            "plot" => $movieObjectRaw->Plot,
            "language" => $movieObjectRaw->Language,
            "country" => $movieObjectRaw->Country,
            "awards" => $movieObjectRaw->Awards,
            "poster" => $movieObjectRaw->Poster,
            "ratings" => $movieObjectRaw->Ratings,
            "metascore" => $movieObjectRaw->Metascore,
            "imdbRating" => floatval($movieObjectRaw->imdbRating),
            "imdbVotes" => floatval($movieObjectRaw->imdbVotes),
            "type" => $movieObjectRaw->Type,
            "DVD" => $movieObjectRaw->DVD,
            "boxOffice" => $movieObjectRaw->BoxOffice,
            "production" => $movieObjectRaw->Production,
            "website" => $movieObjectRaw->Website,
        ];

        var_dump($movieObject);
        
        Movie::create($movieObject);
    }
}
