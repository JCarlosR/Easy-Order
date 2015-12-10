<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'Orden';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['usuario_id', 'chef_id', 'fecha', 'importe', 'descuento', 'estado','combo_name','tipo_orden'];

    // Cada orden se puede relacionar con un plato
    public function orden_platos()
    {
        return $this->hasMany('App\OrdenPlatos', 'orden_id');
    }

    //Cada orden presenta varios platos
    public function platos()
    {
        return $this->belongsToMany('App\Plato', 'OrdenPlatos', "orden_id");
    }

    public function estadodesc()
    {
        return $this->belongsTo('App\Estado', 'estado','nombre');
    }

    public function chef()
    {
        return $this->belongsTo('App\Chef', 'chef_id','usuario_id');
    }

}
