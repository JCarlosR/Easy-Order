<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenPlatos extends Model
{
    protected $table = 'OrdenPlatos';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['orden_id', 'plato_id'];

    public function plato()
    {
        return $this->belongsTo('App\Plato', 'id');
    }

    public function orden()
    {
        return $this->belongsTo('App\Orden', 'id');
    }

}
