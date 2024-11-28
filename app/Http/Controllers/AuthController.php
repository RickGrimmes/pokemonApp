<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view("modules/auth/index");
    }

    public function pokemons(){
        $items = Pokemon::paginate(6);
        return view('modules/auth/pokemons', compact('items'));
    }

    
    // public function registro(){
    //    $items = Pokemon::paginate(6);
    //    return view('modules/auth/pokemons', compact('items'));
    // }

    //public function show(string $id){
    //    $items = Pokemon::find($id);
    //   return view('modules/auth/pokemons', compact('items'));
    //}

    //public function store(Request $request)
    //{
    //    try {
    //        $item = new Pokemon();
    //        $item->name = $request->name;
    //       $item->type = $request->type;
    //        $item->lp = $request->lp;
    //        $item->evolutionPhase = $request->evolutionPhase;
    //        $item->save();
    //        return to_route('pokemons')->with('Se subio :D');
    //    } catch (\Exception $e) {
    //        return response()->json([
    //            'status' => 'error',
     //           'error' => $e->getMessage()
    //        ], 500);
    //    }
    //}
    
    
}
