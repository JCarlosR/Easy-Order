<?php namespace App\Http\Controllers;

use App\Menu;
use App\Plato;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class MenuController extends Controller
{
	public function index()
	{
		$menu = Menu::where('fecha','2015-11-7')->first();
		$relaciones = $menu->menu_platos;

		foreach ( $relaciones as $relacion ) {
			switch ($relacion->plato->tipo->descripcion) {
				case "Entradas":
					$entradas[] = $relacion->plato;
					break;
				case "Segundos":
					$segundos[] = $relacion->plato;
					break;
				case "Postres":
					$postres[] = $relacion->plato;
					break;
				case "Bebidas":
					$bebidas[] = $relacion->plato;
					break;
			}
		}

		$answer = [];
		$answer['entradas']= $entradas;
		$answer['segundos']= $segundos;
		$answer['postres'] = $postres;
		$answer['bebidas'] = $bebidas;

		return $answer;
	}

	public function show($id)
	{
		$menu = Menu::where('fecha', '2015-11-7')->first();
		$relaciones = $menu->menu_platos;

		foreach ($relaciones as $relacion) {
			switch ($relacion->plato->tipo->id) {
				case 1:
					$entradas[] = $relacion->plato;
					break;
				case 2:
					$segundos[] = $relacion->plato;
					break;
				case 3:
					$postres[] = $relacion->plato;
					break;
				case 4:
					$bebidas[] = $relacion->plato;
					break;
			}
		}

		switch ($id) {
			case 1:
				return $entradas;
			case 2:
				return $segundos;
			case 3:
				return $postres;
			case 4:
				return $bebidas;
		}
	}
}