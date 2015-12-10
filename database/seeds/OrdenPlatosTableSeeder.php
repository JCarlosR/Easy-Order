<?php

use App\OrdenPlatos;
use Illuminate\Database\Seeder;

class OrdenPlatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrdenPlatos::create([
            'orden_id' => 1,
            'plato_id' => 1
        ]);
        OrdenPlatos::create([
            'orden_id' => 1,
            'plato_id' => 4
        ]);
        OrdenPlatos::create([
            'orden_id' => 1,
            'plato_id' => 6
        ]);
        OrdenPlatos::create([
            'orden_id' => 1,
            'plato_id' => 8
        ]);

        OrdenPlatos::create([
            'orden_id' => 2,
            'plato_id' => 2
        ]);
        OrdenPlatos::create([
            'orden_id' => 2,
            'plato_id' => 4
        ]);
        OrdenPlatos::create([
            'orden_id' => 2,
            'plato_id' => 7
        ]);
        OrdenPlatos::create([
            'orden_id' => 2,
            'plato_id' => 8
        ]);

        OrdenPlatos::create([
            'orden_id' => 3,
            'plato_id' => 3
        ]);
        OrdenPlatos::create([
            'orden_id' => 3,
            'plato_id' => 5
        ]);
        OrdenPlatos::create([
            'orden_id' => 3,
            'plato_id' => 6
        ]);
        OrdenPlatos::create([
            'orden_id' => 3,
            'plato_id' => 8
        ]);

        OrdenPlatos::create([
            'orden_id' => 4,
            'plato_id' => 1
        ]);
        OrdenPlatos::create([
            'orden_id' => 4,
            'plato_id' => 5
        ]);
        OrdenPlatos::create([
            'orden_id' => 4,
            'plato_id' => 7
        ]);
        OrdenPlatos::create([
            'orden_id' => 4,
            'plato_id' => 8
        ]);

        $platos5 = [ 1, 5, 7, 8 ];
        foreach ($platos5 as $plato_id) {
            OrdenPlatos::create([
                'orden_id' => 5,
                'plato_id' => $plato_id
            ]);
        }

        $platos6 = [ 3, 5, 6, 8 ];
        foreach ($platos6 as $plato_id) {
            OrdenPlatos::create([
                'orden_id' => 6,
                'plato_id' => $plato_id
            ]);
        }

        $platos7 = [ 2, 4, 7, 8 ];
        foreach ($platos7 as $plato_id) {
            OrdenPlatos::create([
                'orden_id' => 7,
                'plato_id' => $plato_id
            ]);
        }

        $platos8 = [ 1, 4, 6, 8 ];
        foreach ($platos8 as $plato_id) {
            OrdenPlatos::create([
                'orden_id' => 8,
                'plato_id' => $plato_id
            ]);
        }

    }
}
