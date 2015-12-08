<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComboPlatoDetalles extends Model
{
    protected $table = 'ComboPlatoDetalles';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['comboplatos_id', 'detalle_id'];

    // Cada comboplatodetalles asocia un comboplatos
    public function comboplato()
    {
        return $this->belongsTo('App\ComboPlatos', 'comboplatos_id');
    }
    // con un detalle
    public function detalle()
    {
        return $this->belongsTo('App\ComboPlatoDetalles', 'comboplatodetalles_id');
    }
}