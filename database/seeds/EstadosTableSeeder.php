<?php

use App\Estado;
use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'nombre' => 'espera',
            'descripcion' => 'En espera',
            'color' => 'success',
            'state' => 1
        ]);
        Estado::create([
            'nombre' => 'preparacion',
            'descripcion' => 'En preparación',
            'color' => 'warning',
            'state' => 2
        ]);
        Estado::create([
            'nombre' => 'terminado',
            'descripcion' => 'Terminado',
            'color' => 'primary',
            'state' => 3

        ]);
        Estado::create([
            'nombre' => 'confirmado',
            'descripcion' => 'Confirmado',
            'color' => 'danger',
            'state' => 4
        ]);
    }
}
