<?php

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
        // Registramos un usuario administrador
        DB::table('Plato')->insert([
            'tipo_id' => '1', // Sea entrada o segundo
            'nombre' => 'Nombre del platillo',

            'descripcion' => 'Este plato consta de ...',
            'imagen' => 'nombre del archivo',
            'precio' => 12.50
        ]);
    }
}
