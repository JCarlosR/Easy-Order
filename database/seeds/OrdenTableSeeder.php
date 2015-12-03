<?php

use App\Orden;
use Illuminate\Database\Seeder;

class OrdenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orden::create([
            'usuario_id' => 3,
            'fecha' => '10/10/2015',
            'importe' => 80.5,
            'descuento' => 0,
            'estado' => 'confirmado',
            'combo_name' => 'Megacomb',
            'tipo_orden' => 1
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '11/10/2015',
            'importe' => 70.5,
            'descuento' => 0,
            'estado' => 'pendiente',
            'combo_name' => 'Estelar',
            'tipo_orden' => 1
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '4/11/2015',
            'importe' => 80,
            'descuento' => 0,
            'estado' => 'pendiente',
            'combo_name' => NULL,
            'tipo_orden' => 0
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '6/11/2015',
            'importe' => 90.3,
            'descuento' => 0,
            'estado' => 'confirmado',
            'combo_name' => NULL,
            'tipo_orden' => 0
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '10/10/2015',
            'importe' => 80.5,
            'descuento' => 0,
            'estado' => 'confirmado',
            'combo_name' => NULL,
            'tipo_orden' => 1
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '11/10/2015',
            'importe' => 70.5,
            'descuento' => 0,
            'estado' => 'pendiente',
            'combo_name' => NULL,
            'tipo_orden' => 1
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '4/11/2015',
            'importe' => 80,
            'descuento' => 0,
            'estado' => 'pendiente',
            'combo_name' => NULL,
            'tipo_orden' => 0
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '6/11/2015',
            'importe' => 90.3,
            'descuento' => 0,
            'estado' => 'confirmado',
            'combo_name' => 'SummerCombo',
            'tipo_orden' => 0
        ]);

    }
}
