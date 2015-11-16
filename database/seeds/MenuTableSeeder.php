<?php

use App\Menu;
use App\MenuPlatos;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registramos un menú para la fecha actual
        Menu::create(['fecha' => Carbon::now()]);

        // Y los platos de este menú
        MenuPlatos::create(['menu_id' => 1, 'plato_id' => 1]);
        MenuPlatos::create(['menu_id' => 1, 'plato_id' => 2]);
        MenuPlatos::create(['menu_id' => 1, 'plato_id' => 4]);
        MenuPlatos::create(['menu_id' => 1, 'plato_id' => 6]);
        MenuPlatos::create(['menu_id' => 1, 'plato_id' => 8]);
    }
}
