<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registramos un usuario administrador
        DB::table('Usuario')->insert([
            'username' => 'admin',
            'password' => bcrypt('123123'),

            'full_name' => 'Juan Ramos',
            'email' => str_random(10).'@gmail.com',
            'phone' => '966543777',
            'tipo' => 2
        ]);
    }
}
