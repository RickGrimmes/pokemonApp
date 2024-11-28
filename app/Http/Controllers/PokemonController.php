<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        try
        {
            $pokemons = Pokemon::all();
            return response()->json([
                'status' => 'success',
                'data' => $pokemons
            ], 200);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try
        {
            $pokemon = Pokemon::find($id);
            if ($pokemon)
            {
                try
                {
                    // Convertir el nombre del Pokémon a minúsculas
                    $pokemonNameLower = strtolower($pokemon->name);

                    // Crear la URL de la imagen
                    $imageUrl = "https://raw.githubusercontent.com/RickGrimmes/pokemon-img/refs/heads/main/img/{$pokemonNameLower}.png";

                    if ($imageUrl)
                    {
                        // Agregar la URL de la imagen al objeto Pokémon
                        $pokemon->image_url = $imageUrl;
                    } else {
                        // Si no se encuentra la imagen, se agrega una imagen por defecto
                        $pokemon->image_url = "https://raw.githubusercontent.com/RickGrimmes/pokemon-img/refs/heads/main/img/default.png";
                    }
                    return response()->json([
                        'status' => 'success',
                        'data' => $pokemon
                    ], 200);
                }
                catch (\Exception $e)
                {
                    return response()->json([
                        'status' => 'error',
                        'error' => 'Pokemon img not found :c'
                    ], 404);
                }
            }
            else
            {
                return response()->json([
                    'status' => 'error',
                    'error' => 'Pokemon not found :c'
                ], 404);
            }
        }
        catch (\Exception $e)
        {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create(Request $request)
    {
        try
        {
            $pokemon = Pokemon::create([
                'name' => $request->name,
                'type' => $request->type,
                'lp' => $request->lp,
                'evolutionPhase' => $request->evolutionPhase
            ]);
            return to_route('pokemons');
            #return response()->json([
            #    'status' => 'success',
            #    'data' => $pokemon
            #], 200);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $pokemon = Pokemon::find($id);
            if ($pokemon)
            {
                $pokemon->name = $request->name;
                $pokemon->type = $request->type;
                $pokemon->lp = $request->lp;
                $pokemon->evolutionPhase = $request->evolutionPhase;
                $pokemon->save();
                return to_route('pokemons');
                #return response()->json([
                #    'status' => 'success',
                #    'data' => $pokemon
                #], 200);
            }
            else
            {
                return response()->json([
                    'status' => 'error',
                    'error' => 'Pokemon not found :c'
                ], 404);
            }
        }
        catch (\Exception $e)
        {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try
        {
            $pokemon = Pokemon::find($id);
            if ($pokemon)
            {
                $pokemon->delete();
                return to_route('pokemons');
                #return response()->json([
                #    'status' => 'success',
                #    'data' => $pokemon
                #], 200);
            }
            else
            {
                return response()->json([
                    'status' => 'error',
                    'error' => 'Pokemon not found :c'
                ], 404);
            }
        }
        catch (\Exception $e)
        {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
