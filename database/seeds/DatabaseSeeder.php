<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Registramos un admin, 2 chef y 3 clientes
        $this->call(UserTableSeeder::class);

        // Registramos platos por defecto
        $this->call(PlatoTableSeeder::class);

        // Registramos detalles por defecto
        $this->call(DetalleTableSeeder::class);

        // Asociamos los platos con sus detalles correspondientes
        $this->call(PlatoDetallesTableSeeder::class);

        // Menú del día (fecha actual) y sus platos
        $this->call(MenuTableSeeder::class);

        Model::reguard();
    }
}
