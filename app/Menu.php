<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'Menu';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['fecha'];

    // Cada menu se puede relacionar con varios platos
    public function menu_platos()
    {
        return $this->hasMany('App\MenuPlatos', 'menu_id');
    }

}
