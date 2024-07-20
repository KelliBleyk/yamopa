<?php

use Illuminate\Support\Facades\Route;

app()->setLocale('ru');

Route::get('/', function () {
    return view('app');
});
