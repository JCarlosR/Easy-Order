<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = 'Plato';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['tipo_id', 'nombre', 'descripcion', 'imagen', 'precio'];

    // Cada plato se puede relacionar con un detalle
    public function plato_detalles()
    {
        return $this->hasMany('App\PlatoDetalles', 'plato_id');
    }

    // Cada plato se puede relacionar con varios menus
    public function menu_platos()
    {
        return $this->hasMany('App\MenuPlatos', 'plato_id');
    }

    // Cada plato se puede relacionar con varios combos
    public function combo_platos()
    {
        return $this->hasMany('App\ComboPlatos', 'plato_id');
    }

    //Cada plato tiene un tipo de plato
    public function tipo()
    {
        return $this->belongsTo('App\Tipo', 'tipo_id');
    }

    //Cada plato presenta varios detalles
    public function detalles()
    {
        return $this->belongsToMany('App\Detalle', 'PlatoDetalles', "plato_id");
    }
}
