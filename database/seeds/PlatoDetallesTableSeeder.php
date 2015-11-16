<?php

use App\PlatoDetalles;
use Illuminate\Database\Seeder;

class PlatoDetallesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registramos los detalles del plato 1
        PlatoDetalles::create(['plato_id' => 1, 'detalle_id' => 1]);
        PlatoDetalles::create(['plato_id' => 1, 'detalle_id' => 2]);
        PlatoDetalles::create(['plato_id' => 1, 'detalle_id' => 3]);

        // Registramos los detalles del plato 2
        PlatoDetalles::create(['plato_id' => 2, 'detalle_id' => 2]);
        PlatoDetalles::create(['plato_id' => 2, 'detalle_id' => 4]);

        // Registramos los detalles del plato 3
        PlatoDetalles::create(['plato_id' => 3, 'detalle_id' => 5]);
        PlatoDetalles::create(['plato_id' => 3, 'detalle_id' => 6]);

        // Registramos los detalles del plato 4
        PlatoDetalles::create(['plato_id' => 4, 'detalle_id' => 7]);
        PlatoDetalles::create(['plato_id' => 4, 'detalle_id' => 8]);
        PlatoDetalles::create(['plato_id' => 4, 'detalle_id' => 9]);

        // Registramos los detalles del plato 5
        PlatoDetalles::create(['plato_id' => 5, 'detalle_id' => 7]);
        PlatoDetalles::create(['plato_id' => 5, 'detalle_id' => 10]);

        // Registramos los detalles del plato 6
        PlatoDetalles::create(['plato_id' => 6, 'detalle_id' => 11]);
        PlatoDetalles::create(['plato_id' => 6, 'detalle_id' => 12]);

        // Registramos los detalles del plato 7
        PlatoDetalles::create(['plato_id' => 7, 'detalle_id' => 13]);
        PlatoDetalles::create(['plato_id' => 7, 'detalle_id' => 14]);

        // Registramos los detalles del plato 8
        PlatoDetalles::create(['plato_id' => 8, 'detalle_id' => 15]);
        PlatoDetalles::create(['plato_id' => 8, 'detalle_id' => 15]);
    }
}
