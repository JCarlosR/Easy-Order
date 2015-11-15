<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    protected $table = 'Combo';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['usuario_id', 'fecha', 'destacado'];

    // Cada combo incluye varios platos
    public function platos()
    {
        return $this->belongsToMany('App\Plato','ComboPlatos' ,'combo_id');
    }

}
