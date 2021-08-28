<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Tiendas;

class TiendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres = [
            'McDocnald',
            'BurgerKing',
            'Pizza Hut',
            'Domino’s Pizza',
            'Arturos',
            'Wendis',
            'KFC',
            'Starbucks',
            'Dunkin Donuts',
            'Taco Bell',
            'Subway',
            '7 Eleven',
            'Baskin-Robbins',
            'Little Caesars',
            'Papa John’s',
            ' Lizarran',
            'Five Guys Burgers and Fries',
            'A&W Restaurants',
            'Cold Stone Creamery',
            'Denny’s',
        ];

            $faker = \Faker\Factory::create();
            
        foreach($nombres as $nombre){

            Tiendas::create([
                'nombre' => $nombre,
                'direccion' => $faker->sentence(3, false),
                'telefono' => $faker->phoneNumber(),
                'email' => $faker->safeEmail(),
                'latitud' => $faker->latitude($min = -90, $max = 90),
                'longitud' => $faker->longitude($min = -180, $max = 180),
                'image' => $faker->image('public/storage/tiendas', 500, 500, null, false)
            ]);
        }
    }
}


//hacer el seed de 20 tiendas con un array de nombres,
//crear un proyecto en postman donde voy a colocar todos los enpoint del enrutador
//hacer metodo que permita un listado de tiendas por las coincidencias del parametro de busqueda.(saber como hacer la busqueda con .%.LIKE.%.)
// crear proyecto en git y redactar el archivo readme 
