<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $table = 'chefs';

    public $timestamps = false;

    protected $fillable = ['usuario_id','email','nombres', 'apellidos', 'dni','direccion','telefono','sueldo','masculino','activo'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
