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

}
