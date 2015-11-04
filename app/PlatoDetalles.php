<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlatoDetalles extends Model
{
    protected $table = 'PlatoDetalles';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['plato_id', 'detalle_id'];

    // Cada platodetalles asocia un plato
    public function plato()
    {
        return $this->belongsTo('App\Plato', 'id');
    }
    // con un detalle
    public function detalle()
    {
        return $this->belongsTo('App\Detalle', 'id');
    }

}
