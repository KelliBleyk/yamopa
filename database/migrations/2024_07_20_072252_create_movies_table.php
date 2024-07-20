<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->string('imdbID')->primary();
            $table->string('title');
            $table->year('year');
            $table->string('rated');
            $table->datetime('released');
            $table->string('runtime');
            $table->string('genre');
            $table->string('director');
            $table->string('writer');
            $table->string('actors');
            $table->string('plot');
            $table->string('language');
            $table->string('country');
            $table->string('awards');
            $table->string('poster');
            $table->json('ratings');
            $table->integer('metascore');
            $table->float('imdbRating');
            $table->float('imdbVotes');
            // $table->string('imdbID');
            $table->string('type');
            $table->string('DVD');
            $table->string('boxOffice');
            $table->string('production');
            $table->string('website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
