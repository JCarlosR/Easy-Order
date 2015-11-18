<?php namespace App\Http\Controllers;

use App\Combo;
use App\ComboPlatos;
use App\Plato;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ComboController extends Controller
{
	public function index()
	{
		$combos = Combo::all();
		$comboPlatos = ComboPlatos::all();


		foreach ( $combos as $combo )
		{
			foreach( $comboPlatos as $comboPlato )
			{
				if ( $combo->id == $comboPlato->combo_id )
					$platos[] = $comboPlato->plato;
			}
			$answer[] = ['combo'=>$combo,'platos'=>$platos];
			$platos=[];
		}

		return $answer;
	}

	public function show($id)
	{
		$destacado = Combo::where('id',$id)->first();
		$comboPlatos = ComboPlatos::all();
		foreach( $comboPlatos as $comboPlato )
		{
			if($comboPlato->combo_id == $id)
				$platos[] = $comboPlato->plato;
		}
		$answer['platos']=$platos;
		$answer['destacado']=$destacado->destacado;
		return $answer;
	}
}