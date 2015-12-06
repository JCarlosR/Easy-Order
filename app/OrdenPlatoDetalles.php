<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenPlatoDetalles extends Model
{
    protected $table = 'OrdenPlatoDetalles';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['ordenplatos_id', 'detalle_id'];

    public function detalle()
    {
        return $this->belongsTo('App\Detalle', 'detalle_id');
    }

}
