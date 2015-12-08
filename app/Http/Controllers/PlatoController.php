<?php namespace App\Http\Controllers;

use App\Plato;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PlatoController extends Controller {

	public function postRegistrar(Request $request)
	{	// Permite registrar un plato

		$validator = Validator::make($request->all(), [
			'nombre' => 'required|min:3|max:50',
			'descripcion' => 'required|min:5|max:255',
			'precio' => 'required|min:0',
			'imagen' => 'required',
			'tipo_id' => 'required'
		]);

		if ($validator->fails()) {
			$data['errors'] = $validator->errors();
			return redirect('gestionar/platos')
				->withInput($request->all())
				->with($data);
		}

		// Si no hay errores, registramos
		$plato = Plato::create([
			'nombre'	  => $request->get('nombre'),
			'descripcion' => $request->get('descripcion'),
			'precio'      => $request->get('precio'),
			'tipo_id'     => $request->get('tipo_id')
		]);

		// Imagen
		if($request->hasFile('imagen'))
		{
			$file = $request->file('imagen');
			// Creamos una instancia de la librería instalada
			$image = Image::make($file);
			// Ruta donde queremos guardar las imágenes para los proveedores
			$path = public_path().'/images/platos/';

			// Guardar
			$sinEspacios = str_replace(' ', '', $plato->nombre);
			$simpleName = strtolower($sinEspacios);
			$fileName = $simpleName . ".jpg";
			$image->save($path . $fileName);

			$plato->imagen = $simpleName;
			$plato->save();
		}

		$data['notif'] = "El plato se ha registrado correctamente.";
		return redirect('gestionar/platos')->with($data);
	}

	public function postModificar(Request $request)
	{	// Permite guardar cambios sobre un plato

		$validator = Validator::make($request->all(), [
			'nombre'        => 'required|min:3|max:50',
			'descripcion'   => 'required|min:5|max:255',
			'precio'        => 'required|min:0',
			'id'		    => 'exists:Plato,id',
			'tipo_id'       => 'required'
		]);

		if ($validator->fails()) {
			$data['errors'] = $validator->errors();
			return redirect('gestionar/platos')
				->with($data);
		}

		// Si no hay errores, editamos
		$plato = Plato::find($request->get('id'));
		$plato->nombre = $request->get('nombre');
		$plato->descripcion = $request->get('descripcion');
		$plato->tipo_id = $request->get('tipo_id');
		$plato->precio = $request->get('precio');
		if($request->hasFile('imagen'))
		{
			$file = $request->file('imagen');
			// Creamos una instancia de la librería instalada
			$image = Image::make($file);
			// Ruta donde queremos guardar las imágenes para los proveedores
			$path = public_path().'/images/platos/';

			// Guardar
			$sinEspacios = str_replace(' ', '', $plato->nombre);
			$simpleName = strtolower($sinEspacios);
			$fileName = $simpleName . ".jpg";
			$image->save($path . $fileName);

			$plato->imagen = $simpleName;

		}
		$plato->save();
		$data['notif'] = "El plato se ha modificado correctamente.";
		return redirect('gestionar/platos')->with($data);
	}

	public function postEliminar(Request $request)
	{	// Permite eliminar un plato

		$validator = Validator::make($request->all(), [
			'id' => 'exists:Plato,id'
		]);

		if ($validator->fails()) {
			$data['errors'] = $validator->errors();
			return redirect('gestionar/platos')->with($data);
		}

		$plato = Plato::find($request->get('id'));

		// Si este plato ha sido asignado a detalles, no se puede eliminar
		if ($plato->plato_detalles->count() > 0) {
			$validator->getMessageBag()->add('asignacion', 'No se puede eliminar porque hay detalles asociados a este plato.');
			return redirect('gestionar/platos')->withErrors($validator);
		}

		$plato->delete();
		$data['notif'] = "El plato se ha eliminado correctamente.";
		return redirect('gestionar/platos')->with($data);
	}

	// Webservice API
	public function index()
	{
		return Plato::all();
	}

	public function show($id)
	{
		return Plato::find($id);
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'nombre'      => 'required|min:3|max:50',
			'descripcion' => 'required|min:5|max:255',
			'precio'      => 'required|min:0',
			'tipo_id'     => 'required|exists:Tipo,id'
		]);

		if ($validator->fails())
			return [
				'created' => false,
				'errors'  => $validator->errors()->all()
			];

		Plato::create([
			'nombre'	  => $request->get('nombre'),
			'descripcion' => $request->get('descripcion'),
			'precio'      => $request->get('precio'),
			'tipo_id'     => $request->get('tipo_id')
		]);

		return ['created' => true];
	}

	public function update($id, Request $request)
	{
		$validator = Validator::make($request->all(), [
			'nombre'      => 'required|min:3|max:50',
			'descripcion' => 'required|min:5|max:255',
			'precio'      => 'required|min:0',
			'tipo_id'     => 'required',
			'id'		  => 'exists:Plato,id'
		]);

		if ($validator->fails())
			return [
				'updated' => false,
				'errors'  => $validator->errors()->all()
			];

		$plato = Plato::find($id);

		$plato->nombre = $request->get('nombre');
		$plato->descripcion = $request->get('descripcion');
		$plato->precio = $request->get('precio');
		$plato->tipo_id = $request->get('tipo_id');
		$plato->save();

		return ['updated' => true];
	}

	public function destroy($id)
	{
		$plato = Plato::find($id);

		if (! $plato)
			return ['deleted' => false, 'error' => 'El plato indicado no existe.'];

		if ($plato->detalles->count()>0)
			return ['deleted' => false, 'error' => 'Deben eliminarse primero los detalles asociados.'];

		$plato->delete();
		return ['deleted' => true];
	}
}
