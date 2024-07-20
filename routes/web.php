<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

app()->setLocale('ru');

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
