<?php

use App\Combo;
use App\ComboPlatos;
use App\ComboPlatoDetalles;
use Illuminate\Database\Seeder;

class ComboTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Combo::create([
            'usuario_id' => 1,
            'fecha' => '2015/10/9',
            'nombre' => 'Norteño',
            'destacado' => true
        ]);
        $platos1 = [ 1, 4, 6, 8 ];
        foreach ($platos1 as $plato_id) {
            ComboPlatos::create([
                'combo_id' => 1,
                'plato_id' => $plato_id
            ]);
        }

        Combo::create([
            'usuario_id' => 1,
            'fecha' => '2015/9/11',
            'nombre' => 'Start Week',
            'destacado' => false
        ]);
        $platos2 = [ 2, 4, 7, 8 ];
        foreach ($platos2 as $plato_id) {
            ComboPlatos::create([
                'combo_id' => 2,
                'plato_id' => $plato_id
            ]);
        }

        Combo::create([
            'usuario_id' => 1,
            'fecha' => '2015/9/12',
            'nombre' => 'All rich',
            'destacado' => true
        ]);
        $platos3 = [ 3, 5, 6, 8 ];
        foreach ($platos3 as $plato_id) {
            ComboPlatos::create([
                'combo_id' => 3,
                'plato_id' => $plato_id
            ]);
        }

        Combo::create([
            'usuario_id' => 1,
            'fecha' => '2015/9/13',
            'nombre' => 'Rimenri',
            'destacado' => false
        ]);
        $platos4 =  [ 4, 5, 7, 8 ];
        foreach ($platos4 as $plato_id) {
            ComboPlatos::create([
                'combo_id' => 4,
                'plato_id' => $plato_id
            ]);
        }

        // ComboPlatoDetalles
        $detalles = [
            [ 'comboplatos_id' => 1, 'detalle_id' => 2 ],
            [ 'comboplatos_id' => 2, 'detalle_id' => 7 ],
            [ 'comboplatos_id' => 3, 'detalle_id' => 12 ],
            [ 'comboplatos_id' => 4, 'detalle_id' => 15 ],
            [ 'comboplatos_id' => 5, 'detalle_id' => 2 ],
            [ 'comboplatos_id' => 6, 'detalle_id' => 8 ],
            [ 'comboplatos_id' => 7, 'detalle_id' => 14 ],
            [ 'comboplatos_id' => 8, 'detalle_id' => 16 ],
            [ 'comboplatos_id' => 9, 'detalle_id' =>  5],
            [ 'comboplatos_id' => 10, 'detalle_id' => 10 ],
            [ 'comboplatos_id' => 11, 'detalle_id' => 11 ],
            [ 'comboplatos_id' => 11, 'detalle_id' => 15 ],
            [ 'comboplatos_id' => 12, 'detalle_id' => 3 ],
            [ 'comboplatos_id' => 13, 'detalle_id' => 7 ],
            [ 'comboplatos_id' => 14, 'detalle_id' => 13 ],
            [ 'comboplatos_id' => 15, 'detalle_id' => 16 ]
        ];
        foreach($detalles as $detalle){
            ComboPlatoDetalles::create($detalle);
        }


    }
}
