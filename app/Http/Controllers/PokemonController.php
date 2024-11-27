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
                return response()->json([
                    'status' => 'success',
                    'data' => $pokemon
                ], 200);
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
            return response()->json([
                'status' => 'success',
                'data' => $pokemon
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
                return response()->json([
                    'status' => 'success',
                    'data' => $pokemon
                ], 200);
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
                return response()->json([
                    'status' => 'success',
                    'data' => $pokemon
                ], 200);
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
