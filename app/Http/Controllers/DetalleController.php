<?php namespace App\Http\Controllers;

use App\Detalle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class DetalleController extends Controller {

	public function postRegistrar(Request $request)
	{	// Permite registrar un detalle

		$validator = Validator::make($request->all(), [
			'nombre' => 'required|min:3|max:50',
			'descripcion' => 'required|min:5|max:255',
			'precio' => 'required|min:0',
			'imagen' => 'required'
		]);

		if ($validator->fails()) {
			$data['errors'] = $validator->errors();
			return redirect('gestionar/detalles')
				->withInput($request->all())
				->with($data);
		}

		// Si no hay errores, registramos
		$usuario = Auth::user();
		$detalle = Detalle::create([
			'nombre'	  => $request->get('nombre'),
			'descripcion' => $request->get('descripcion'),
			'precio'      => $request->get('precio')
		]);

		// Imagen
		if($request->hasFile('imagen'))
		{
			$file = $request->file('imagen');
			// Creamos una instancia de la librería instalada
			$image = Image::make($file);
			// Ruta donde queremos guardar las imágenes para los proveedores
			$path = public_path().'/images/detalles/';

			// Guardar
			$sinEspacios = str_replace(' ', '', $detalle->nombre);
			$simpleName = strtolower($sinEspacios);
			$fileName = $simpleName . ".jpg";
			$image->save($path . $fileName);

			$detalle->imagen = $simpleName;
			$detalle->save();
		}

		$data['notif'] = "El detalle se ha registrado correctamente.";
		return redirect('gestionar/detalles')->with($data);
	}

	public function postModificar(Request $request)
	{	// Permite guardar cambios sobre un detalle

		$validator = Validator::make($request->all(), [
			'nombre'        => 'required|min:3|max:50',
			'descripcion'   => 'required|min:5|max:255',
			'precio'        => 'required|min:0',
			'id'		    => 'exists:Detalle,id'
		]);

		if ($validator->fails()) {
			$data['errors'] = $validator->errors();
			return redirect('gestionar/detalles')
				->with($data);
		}

		// Si no hay errores, editamos
		$detalle = Detalle::find($request->get('id'));
		$detalle->nombre = $request->get('nombre');
		$detalle->descripcion = $request->get('descripcion');
		$detalle->precio = $request->get('precio');
		if($request->hasFile('imagen'))
		{
			$file = $request->file('imagen');
			// Creamos una instancia de la librería instalada
			$image = Image::make($file);
			// Ruta donde queremos guardar las imágenes para los proveedores
			$path = public_path().'/images/detalles/';

			// Guardar
			$sinEspacios = str_replace(' ', '', $detalle->nombre);
			$simpleName = strtolower($sinEspacios);
			$fileName = $simpleName . ".jpg";
			$image->save($path . $fileName);

			$detalle->imagen = $simpleName;

		}
		$detalle->save();
		$data['notif'] = "El detalle se ha modificado correctamente.";
		return redirect('gestionar/detalles')->with($data);
	}

	public function postEliminar(Request $request)
	{	// Permite eliminar un detalle

		$validator = Validator::make($request->all(), [
			'id' => 'exists:Detalle,id'
		]);

		if ($validator->fails()) {
			$data['errors'] = $validator->errors();
			return redirect('gestionar/detalles')->with($data);
		}

		$detalle = Detalle::find($request->get('id'));

		// Si este detalle ha sido asignado a platos, no se puede eliminar
		if ($detalle->plato_detalles->count() > 0) {
			$validator->getMessageBag()->add('asignacion', 'No se puede eliminar porque hay platos asociados a este detalle.');
			return redirect('gestionar/detalles')->withErrors($validator);
		}

		$detalle->delete();
		$data['notif'] = "El detalle se ha eliminado correctamente.";
		return redirect('gestionar/detalles')->with($data);
	}


	// Webservice API
	public function index()
	{
		return Detalle::all();
	}

	public function show($id)
	{
		return Detalle::find($id);
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'nombre' => 'required|min:3|max:50',
			'descripcion' => 'required|min:5|max:255',
			'precio' => 'required|min:0'
		]);


		if ($validator->fails())
			return [
				'created' => false,
				'errors'  => $validator->errors()->all()
			];

		Detalle::create([
			'nombre'	  => $request->get('nombre'),
			'descripcion' => $request->get('descripcion'),
			'precio'      => $request->get('precio')
		]);

		return ['created' => true];
	}

	public function update($id, Request $request)
	{
		$validator = Validator::make($request->all(), [
			'nombre'      => 'required|min:3|max:50',
			'descripcion' => 'required|min:5|max:255',
			'precio'      => 'required|min:0',
			'id'		  => 'exists:Detalle,id'
		]);

		if ($validator->fails())
			return [
				'updated' => false,
				'errors'  => $validator->errors()->all()
			];

		$detalle = Detalle::find($id);
		$detalle->nombre = $request->get('nombre');
		$detalle->descripcion = $request->get('descripcion');
		$detalle->precio = $request->get('precio');
		$detalle->save();

		return ['updated' => true];
	}

	public function destroy($id)
	{
		$detalle = Detalle::find($id);

		if (! $detalle)
			return ['deleted' => false, 'error' => 'El plato indicado no existe.'];

		if ($detalle->detalles->count()>0)
			return ['deleted' => false, 'error' => 'Deben eliminarse primero los detalles asociados.'];

		$detalle->delete();
		return ['deleted' => true];
	}
}
