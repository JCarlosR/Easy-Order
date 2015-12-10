<?php

// Página principal
Route::get('/', 'HomeController@getWelcome');

// Login
Route::get('ingresar', 'Auth\AuthController@getLogin');
Route::post('ingresar', 'Auth\AuthController@postLogin');

// Registro
Route::get('registro', 'Auth\AuthController@getRegister');
Route::post('registro', 'Auth\AuthController@postRegister');

// Logout
Route::get('salir', 'Auth\AuthController@getLogout');

// Páginas disponibles para un usuario autenticado
Route::get('bienvenido/usuario', 'UsuarioController@getWelcome');
Route::get('solicitar', 'UsuarioController@getSolicitar');
Route::get('previsualizar/{tipo}/{combo}', 'UsuarioController@getPrevisualizar');
Route::post('previsualizar', 'UsuarioController@postPrevisualizar');
Route::post('confirmar', 'UsuarioController@postConfirmar');
Route::post('orden/registrar', 'UsuarioController@postOrden');
Route::get('recepcion', 'UsuarioController@getRecepcion');
Route::get('anteriores', 'UsuarioController@getAnteriores');
Route::post('combo/guardarName', 'UsuarioController@postguardarName');

// Páginas disponibles para un admin autenticado
Route::get('bienvenido/admin', 'AdminController@getWelcome');
Route::get('asignar/menu', 'AdminController@getAsignarMenu');
Route::get('asignar/platos/{dia}/{tipo}', 'AdminController@getAsignarPlatos');
Route::post('asignar/platos/{dia}/{tipo}', 'AdminController@postAsignarPlatos');
Route::get('previsualizar/menu/{dia}/{tipo}', 'AdminController@getPrevisualizarMenu');
Route::get('pedidos/entregados', 'AdminController@getEntregados');
Route::post('pedidos/entregados', 'AdminController@postEntregados');
Route::get('pedidos/pendientes', 'AdminController@getPendientes');
Route::post('pedidos/pendientes', 'AdminController@postPendientes');
Route::get('gestionar/platos', 'AdminController@getGestionarPlatos');
Route::get('gestionar/detalles', 'AdminController@getGestionarDetalles');
Route::get('gestionar/platodetalles', 'AdminController@getPlatoDetalles');
Route::get('gestionar/platodetalles/{id}', 'AdminController@getGestionarPlatoDetalles');
Route::post('gestionar/platodetalles/{id}', 'AdminController@postGestionarPlatoDetalles');
Route::get('gestionar/chefs','AdminController@getGestionarChefs');


// CRUD para los chefs
Route::post('chef/registrar','ChefController@postRegistrar');
Route::post('chef/modificar','ChefController@postModificar');
Route::post('chef/eliminar','ChefController@postEliminar');

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


// Rutas referentes a los webservice (app iOS)

// Platos API
Route::resource('plato', 'PlatoController', ['only' => ['index', 'store', 'update', 'destroy', 'show']]);

// Detalles API
Route::resource('detalle', 'DetalleController', ['only' => ['index', 'store', 'update', 'destroy', 'show']]);

// Menú API
Route::resource('menu', 'MenuController', ['only' => ['index', 'show']]);
// Combos API
Route::resource('combo', 'ComboController', ['only' => ['index', 'show']]);

// Usuario
Route::post('validar', 'HomeController@validarUsuario');
Route::post('usuario/registrar', 'HomeController@postUsuarioRegistrar');

// Ordenes
Route::post('registrar/orden/menu', 'OrdenController@postRegistrarMenuOrden');
Route::get('ordenes/pendientes', 'OrdenController@getPendientes');
Route::get('ordenes/entregadas', 'OrdenController@getEntregadas');
