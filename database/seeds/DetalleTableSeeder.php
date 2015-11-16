<?php

use App\Detalle;
use Illuminate\Database\Seeder;

class DetalleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registramos los detalles

        Detalle::create([
            'nombre' => 'Huevo sancochado',
            'descripcion' => 'Huevo de gallina cocido o duro',
            'imagen' => 'huevosancochado',
            'precio' => 0.5
        ]);
        Detalle::create([
            'nombre' => 'Pan de manteca',
            'descripcion' => 'Tres panes de manteca',
            'imagen' => 'panmanteca',
            'precio' => 0.5
        ]);
        Detalle::create([
            'nombre' => 'Mote',
            'descripcion' => 'Porción de mote caliente',
            'imagen' => 'mote',
            'precio' => 0.3
        ]);
        Detalle::create([
            'nombre' => 'Cancha perla',
            'descripcion' => 'Porción de cancha perla',
            'imagen' => 'cancha',
            'precio' => 0.3
        ]);
        Detalle::create([
            'nombre' => 'Lechuga',
            'descripcion' => 'Porción de lechuga fresca',
            'imagen' => 'lechuga',
            'precio' => 0.2
        ]);
        Detalle::create([
            'nombre' => 'Aceituna',
            'descripcion' => 'Una aceituna fresca',
            'imagen' => 'aceituna',
            'precio' => 0.2
        ]);
        Detalle::create([
            'nombre' => 'Papa Sancochada',
            'descripcion' => 'Dos papas sancochadas',
            'imagen' => 'papasancochada',
            'precio' => 0.9
        ]);
        Detalle::create([
            'nombre' => 'Menestra',
            'descripcion' => 'Porción de Menestra estandar',
            'imagen' => 'menestra',
            'precio' => 0.5
        ]);
        Detalle::create([
            'nombre' => 'Garbanzillo',
            'descripcion' => 'Porción de garbancillo estandar',
            'imagen' => 'garbancillo',
            'precio' => 0.5
        ]);
        Detalle::create([
            'nombre' => 'Crema Huancaina',
            'descripcion' => 'Porción de crema huancaina',
            'imagen' => 'cremahuancaina',
            'precio' => 0.5
        ]);
        Detalle::create([
            'nombre' => 'Canelita en polvo',
            'descripcion' => 'Canelita en polvo',
            'imagen' => 'canelita',
            'precio' => 0.2
        ]);
        Detalle::create([
            'nombre' => 'Guindon extra',
            'descripcion' => 'Un guindon',
            'imagen' => 'guindon',
            'precio' => 0.2
        ]);
        Detalle::create([
            'nombre' => 'Leche condensada',
            'descripcion' => 'Dos cucharadas de leche condensada',
            'imagen' => 'lechecondensada',
            'precio' => 0.2
        ]);
        Detalle::create([
            'nombre' => 'Fresas',
            'descripcion' => 'Una porción de fresas',
            'imagen' => 'fresas',
            'precio' => 0.4
        ]);
        Detalle::create([
            'nombre' => 'Extracto de fresas',
            'descripcion' => 'Un extracto de fresas',
            'imagen' => 'extfresa',
            'precio' => 0.5
        ]);
        Detalle::create([
            'nombre' => 'Extracto de plátano',
            'descripcion' => 'Un extracto de plátano',
            'imagen' => 'extplatano',
            'precio' => 0.5
        ]);

    }
}
