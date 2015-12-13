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
            'fecha' => '2015/10/10',
            'importe' => 80.5,
            'descuento' => 0,
            'estado' => 'terminado',
            'combo_name' => 'Megacombo',
            'tipo_orden' => 1
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '2015/11/10',
            'importe' => 70.5,
            'descuento' => 0,
            'estado' => 'espera',
            'combo_name' => 'Estelar',
            'tipo_orden' => 1
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '2015/11/4',
            'importe' => 80,
            'descuento' => 0,
            'estado' => 'terminado',
            'combo_name' => 'Estelar',
            'tipo_orden' => 0
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '2015/11/6',
            'importe' => 90.3,
            'descuento' => 0,
            'estado' => 'confirmado',
            'combo_name' => 'Rimenri',
            'tipo_orden' => 0
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '2015/10/10',
            'importe' => 80.5,
            'descuento' => 0,
            'estado' => 'confirmado',
            'combo_name' => 'MegaCombo',
            'tipo_orden' => 1
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '2015/11/9',
            'importe' => 70.5,
            'descuento' => 0,
            'estado' => 'espera',
            'combo_name' => NULL,
            'tipo_orden' => 1
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '2015/11/14',
            'importe' => 80,
            'descuento' => 0,
            'estado' => 'espera',
            'combo_name' => NULL,
            'tipo_orden' => 0
        ]);

        Orden::create([
            'usuario_id' => 3,
            'fecha' => '2015/11/6',
            'importe' => 90.3,
            'descuento' => 0,
            'estado' => 'confirmado',
            'combo_name' => 'Rimenri',
            'tipo_orden' => 0
        ]);

    }
}
