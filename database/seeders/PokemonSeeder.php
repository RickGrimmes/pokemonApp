<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pokemon::create([
            'name' => 'Charizard',
            'type' => 'Fuego',
            'lp' => 180,
            'evolutionPhase' => 3,
        ]);

        Pokemon::create([
            'name' => 'Bulbasaur',
            'type' => 'Planta',
            'lp' => 100,
            'evolutionPhase' => 1,
        ]);

        Pokemon::create([
            'name' => 'Squirtle',
            'type' => 'Agua',
            'lp' => 120,
            'evolutionPhase' => 1,
        ]);

        Pokemon::create([
            'name' => 'Pikachu',
            'type' => 'Electrico',
            'lp' => 80,
            'evolutionPhase' => 1,
        ]);

        Pokemon::create([
            'name' => 'Jigglypuff',
            'type' => 'Normal',
            'lp' => 80,
            'evolutionPhase' => 1,
        ]);

        Pokemon::create([
            'name' => 'Gengar',
            'type' => 'Fantasma',
            'lp' => 130,
            'evolutionPhase' => 3,
        ]);

        Pokemon::create([
            'name' => 'Machamp',
            'type' => 'Lucha',
            'lp' => 150,
            'evolutionPhase' => 3,
        ]);

        Pokemon::create([
            'name' => 'Gyarados',
            'type' => 'Agua',
            'lp' => 160,
            'evolutionPhase' => 3,
        ]);

        Pokemon::create([
            'name' => 'Dragonite',
            'type' => 'Dragon',
            'lp' => 180,
            'evolutionPhase' => 3,
        ]);

        Pokemon::create([
            'name' => 'Mewtwo',
            'type' => 'Psiquico',
            'lp' => 200,
            'evolutionPhase' => 1,
        ]);

        Pokemon::create([
            'name' => 'Mew',
            'type' => 'Psiquico',
            'lp' => 200,
            'evolutionPhase' => 1,
        ]);

        Pokemon::create([
            'name' => 'Zapdos',
            'type' => 'Electrico',
            'lp' => 180,
            'evolutionPhase' => 1,
        ]);

    }
}
