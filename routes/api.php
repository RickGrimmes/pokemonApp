<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::get('/pokemons', [PokemonController::class, 'index']);
Route::get('/pokemon/{id}', [PokemonController::class, 'show']);
Route::post('/pokemon', [PokemonController::class, 'create']);
Route::put('/pokemons/{id}', [PokemonController::class, 'update']);
Route::delete('/pokemon/{id}', [PokemonController::class, 'delete']);