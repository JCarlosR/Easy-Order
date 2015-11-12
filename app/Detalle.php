<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $table = 'Detalle';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'precio'];

    // Cada detalle se puede relacionar con un plato
    public function plato_detalles()
    {
        return $this->hasMany('App\PlatoDetalles', 'detalle_id');
    }

    public function platos()
    {
        return $this->belongsToMany('App\Plato', 'PlatoDetalles', "detalle_id");
    }
}
