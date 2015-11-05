<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuPlatos extends Model
{
    protected $table = 'MenuPlatos';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['menu_id', 'plato_id'];

    // Cada menuplatos asocia un menu
    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id');
    }
    // con un plato
    public function plato()
    {
        return $this->belongsTo('App\Plato', 'plato_id');
    }

}
