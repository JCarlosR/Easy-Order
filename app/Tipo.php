<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'Tipo';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['descripcion'];

    // Cada tipo engloba platos
    public function platos()
    {
        return $this->hasMany('App\Plato', 'plato_id');
    }
}
