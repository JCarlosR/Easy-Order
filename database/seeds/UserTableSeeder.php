<?php

use App\User;
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
        User::create([
            'username' => 'admin',
            'password' => bcrypt('123123'),
            'full_name' => 'Administrador',
            'email' => str_random(10).'@gmail.com',
            'phone' => '123456789',
            'tipo' => 2
        ]);

        // Registramos un usuario chef
        User::create([
            'username' => 'chef',
            'password' => bcrypt('123123'),
            'full_name' => 'Chef',
            'email' => 'juancagb.17@gmail.com',
            'phone' => '321654987',
            'tipo' => 1
        ]);

        // Registramos un usuario cliente
        User::create([
            'username' => 'jcarlos',
            'password' => bcrypt('123123'),
            'full_name' => 'Juan Ramos Suyón',
            'email' => 'juancagb.17@gmail.com',
            'phone' => '966543777',
            'tipo' => 0
        ]);
    }
}
