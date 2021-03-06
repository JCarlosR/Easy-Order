<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $table = 'Chefs';

    public $timestamps = false;

    protected $fillable = ['usuario_id','email','nombres', 'apellidos', 'dni','direccion','telefono','sueldo','masculino','activo'];

    public function user()
    {
        return $this->belongsTo('App\User', 'usuario_id');
    }
}
