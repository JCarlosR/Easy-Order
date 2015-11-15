<?php


Route::get('/', function () {
    if (Auth::check()) {
        switch (Auth::user()->tipo) {
            case 0: return view('user.welcome');
            case 1: return view('chef.welcome');
            case 2: return view('admin.welcome');
        }
    }

    return view('home');
});

Route::get('ingresar', 'Auth\AuthController@getLogin');
Route::post('ingresar', 'Auth\AuthController@postLogin');

Route::get('registro', 'Auth\AuthController@getRegister');
Route::post('registro', 'Auth\AuthController@postRegister');

Route::get('salir', 'Auth\AuthController@getLogout');

// Páginas disponibles para un usuario autenticado
Route::get('bienvenido/usuario', 'UsuarioController@getWelcome');
Route::get('solicitar', 'UsuarioController@getSolicitar');
Route::post('previsualizar', 'UsuarioController@getPrevisualizar');
Route::get('confirmar', 'UsuarioController@getConfirmar');
Route::get('recepcion', 'UsuarioController@getRecepcion');
Route::get('anteriores', 'UsuarioController@getAnteriores');

// Páginas disponibles para un admin autenticado
Route::get('bienvenido/admin', 'AdminController@getWelcome');
Route::get('asignar/menu', 'AdminController@getAsignarMenu');
Route::get('asignar/platos/{dia}/{tipo}', 'AdminController@getAsignarPlatos');
Route::get('previsualizar/menu/{dia}/{tipo}', 'AdminController@getPrevisualizarMenu');
Route::get('pedidos/entregados', 'AdminController@getEntregados');
Route::get('pedidos/pendientes', 'AdminController@getPendientes');
Route::get('gestionar/platos', 'AdminController@getGestionarPlatos');
Route::get('gestionar/detalles', 'AdminController@getGestionarDetalles');
Route::get('gestionar/platodetalles', 'AdminController@getGestionarPlatoDetalles');

// Páginas disponibles para un chef autenticado
Route::get('bienvenido/chef', 'ChefController@getWelcome');
Route::get('pedidos/en-espera', 'ChefController@getEnEspera');


// CRUD para los platos
Route::post('plato/registrar', 'PlatoController@postRegistrar');
Route::post('plato/modificar', 'PlatoController@postModificar');
Route::post('plato/eliminar', 'PlatoController@postEliminar');

// CRUD para los detalles
Route::post('detalle/registrar', 'DetalleController@postRegistrar');
Route::post('detalle/modificar', 'DetalleController@postModificar');
Route::post('detalle/eliminar', 'DetalleController@postEliminar');
