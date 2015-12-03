<?php

use App\Plato;
use Illuminate\Database\Seeder;

class PlatoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registramos los platos de tipo 1

        Plato::create([
            'tipo_id' => '1',
            'nombre' => 'Caldo de gallina',
            'descripcion' => 'El plato constará de la presa de gallina y caldo',
            'imagen' => 'caldogallina',
            'precio' => 5
        ]);

        Plato::create([
            'tipo_id' => '1',
            'nombre' => 'Shambar',
            'descripcion' => 'El plato constará del pellejo, caldo y menestras',
            'imagen' => 'shambar',
            'precio' => 5
        ]);

        Plato::create([
            'tipo_id' => '1',
            'nombre' => 'Papa a la huancaina',
            'descripcion' => 'El plato constará de crema Huancaina, huevo y papa',
            'imagen' => 'papahuancaina',
            'precio' => 3
        ]);

        // Registramos los platos de tipo 2

        Plato::create([
            'tipo_id' => '2',
            'nombre' => 'Arroz con pato',
            'descripcion' => 'El plato constará del pato, guiso y arroz',
            'imagen' => 'pato',
            'precio' => 5
        ]);

        Plato::create([
            'tipo_id' => '2',
            'nombre' => 'Lomito saltado',
            'descripcion' => 'El plato constará del lomito tradicional y papa frita',
            'imagen' => 'lomito',
            'precio' => 5
        ]);

        // Registramos los platos de tipo 3

        Plato::create([
            'tipo_id' => '3',
            'nombre' => 'Mazamorra',
            'descripcion' => 'El platillo constará de un vaso de mazamorra',
            'imagen' => 'mazamorra',
            'precio' => 5
        ]);

        Plato::create([
            'tipo_id' => '3',
            'nombre' => 'Ensalada de fruta',
            'descripcion' => 'El plato constará de porciones de platano, papaya y mandarina',
            'imagen' => 'ensaladaf',
            'precio' => 5
        ]);

        // Registramos los platos de tipo 4

        Plato::create([
            'tipo_id' => '4',
            'nombre' => 'Jugo especial',
            'descripcion' => 'El jugo constará de papaya y piña',
            'imagen' => 'jugoespecial',
            'precio' => 5
        ]);

    }
}
