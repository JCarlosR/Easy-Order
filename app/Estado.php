<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'Estados';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['nombre','descripcion','color','state'];

    public function ordenes()
    {
        return $this->hasMany('App\Orden', 'nombre');
    }

}
