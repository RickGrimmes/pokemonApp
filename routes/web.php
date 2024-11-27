<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::resource('pokemon', PokemonController::class);

Route::get('/', function () {
    return view('welcome');
});
