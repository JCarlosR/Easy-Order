<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComboPlatos extends Model
{
    protected $table = 'ComboPlatos';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['combo_id', 'plato_id'];

    // Cada comboplatos asocia un combo
    public function combo()
    {
        return $this->belongsTo('App\Combo', 'combo_id');
    }
    // con un plato
    public function plato()
    {
        return $this->belongsTo('App\Plato', 'plato_id');
    }
    //un ComboPlatos se relaciona con varios ComboPlatoDetalles
    public function comboplatodetalles()
    {
        return $this->hasMany('App\ComboPlatoDetalles', 'comboplatos_id');
    }
}