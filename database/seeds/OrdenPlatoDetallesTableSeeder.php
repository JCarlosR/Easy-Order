<?php

use Illuminate\Database\Seeder;

class OrdenPlatoDetallesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ordenPlatoDetalles = [
            [ 'ordenplatos_id' => 1, 'detalle_id' => 2 ],
            [ 'ordenplatos_id' => 2, 'detalle_id' => 8 ],
            [ 'ordenplatos_id' => 3, 'detalle_id' => 11 ],
            [ 'ordenplatos_id' => 4, 'detalle_id' => 16 ],
            [ 'ordenplatos_id' => 5, 'detalle_id' => 2 ],
            [ 'ordenplatos_id' => 6, 'detalle_id' => 7 ],
            [ 'ordenplatos_id' => 7, 'detalle_id' => 13 ],
            [ 'ordenplatos_id' => 8, 'detalle_id' => 15 ],
            [ 'ordenplatos_id' => 9, 'detalle_id' => 5 ],
            [ 'ordenplatos_id' => 10, 'detalle_id' => 10 ],
            [ 'ordenplatos_id' => 11, 'detalle_id' => 12 ],
            [ 'ordenplatos_id' => 12, 'detalle_id' => 16 ],
            [ 'ordenplatos_id' => 13, 'detalle_id' => 3 ],
            [ 'ordenplatos_id' => 14, 'detalle_id' => 7 ],
            [ 'ordenplatos_id' => 15, 'detalle_id' => 14 ],
            [ 'ordenplatos_id' => 16, 'detalle_id' => 15 ],
            [ 'ordenplatos_id' => 17, 'detalle_id' => 2 ],
            [ 'ordenplatos_id' => 18, 'detalle_id' => 7 ],
            [ 'ordenplatos_id' => 19, 'detalle_id' => 14 ],
            [ 'ordenplatos_id' => 20, 'detalle_id' => 15 ],
            [ 'ordenplatos_id' => 21, 'detalle_id' => 5 ],
            [ 'ordenplatos_id' => 22, 'detalle_id' => 10 ],
            [ 'ordenplatos_id' => 23, 'detalle_id' => 11 ],
            [ 'ordenplatos_id' => 24, 'detalle_id' => 16 ],
            [ 'ordenplatos_id' => 25, 'detalle_id' => 4 ],
            [ 'ordenplatos_id' => 26, 'detalle_id' => 7 ],
            [ 'ordenplatos_id' => 27, 'detalle_id' => 13 ],
            [ 'ordenplatos_id' => 28, 'detalle_id' => 15 ],
            [ 'ordenplatos_id' => 29, 'detalle_id' => 3 ],
            [ 'ordenplatos_id' => 30, 'detalle_id' => 8 ],
            [ 'ordenplatos_id' => 31, 'detalle_id' => 12 ],
            [ 'ordenplatos_id' => 32, 'detalle_id' => 16 ]
        ];

        foreach($ordenPlatoDetalles as $ordenPlatoDetalle){
            ComboPlatoDetalles::create($ordenPlatoDetalle);
        }
    }
}
