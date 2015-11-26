<?php namespace App\Http\Controllers;
use App\Chef;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ChefController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getWelcome()
    {
        return view('chef.welcome');
    }

    public function getEnEspera()
    {
        return view('chef.en-espera');
    }

    public function postRegistrar(Request $request)
    {	// Permite registrar un Chef

        $validator = Validator::make($request->all(), [
            'nombres' => 'required|min:3|max:50',
            'apellidos' => 'required|min:3|max:50',
            'dni' => 'required|max:8',
            'email' => 'required|min:5|max:50',
            'direccion' => 'required|min:3|max:50',
            'telefono' => 'required|min:6|max:9',
            'sueldo' => 'required|min:0'
        ]);

        if ($validator->fails()) {
            $data['errors'] = $validator->errors();
            return redirect('gestionar/chefs')
                ->withInput($request->all())
                ->with($data);
        }

        // Si no hay errores, registramos
        $usuario = Auth::user();

        $chef = Chef::create([
            'usuario_id' =>$usuario->id,
            'nombres'	 => $request->get('nombres'),
            'apellidos'  => $request->get('apellidos'),
            'dni'        => $request->get('dni'),
            'email'      => $request->get('email'),
            'direccion'  => $request->get('direccion'),
            'telefono'   => $request->get('telefono'),
            'sueldo'     => $request->get('sueldo'),
            'masculino'  => $request->get('masculino'),
            'activo'     => $request->get('activo'),
        ]);

        $i =1;
        $user_base = strtolower( substr($request->get('nombres'),0,3).substr($request->get('apellidos'),0,3) );
        $user_completo = $user_base.$i;
        $encontrado = User::where('username',$user_completo )->first();
        $fullname = $request->get('nombres').', '.$request->get('apellidos');

        if ($encontrado == null)
        {
            $user = User::create([
                'username'  => $user_completo,
                'full_name' => $fullname,
                'password'  => $request->get('dni'),
                'phone'     => $request->get('telefono'),
                'email'     => $request->get('email'),
                'tipo'      => 2
            ]);
        }
        else
        {
            $user_base = strtolower( substr($request->get('nombres'),0,3).substr($request->get('apellidos'),0,3) );
            while( $encontrado != null )
            {
                $i+=1;
                $user_completo = $user_base.$i;
                $encontrado = User::where('username',$user_completo )->first();

            }

            $user = User::create([
                'username' => bcrypt($user_completo),
                'full_name' => $fullname,
                'password' => $request->get('dni'),
                'phone'    => $request->get('telefono'),
                'email'    => $request->get('email'),
                'tipo'     => 2,
            ]);
        }

        $user->save();
        $chef->save();
        $data['notif'] = "El Chef se ha registrado correctamente.";

        return redirect('gestionar/chefs')->with($data);
    }

    public function postModificar(Request $request)
    {	// Permite guardar cambios sobre un chef

        $validator = Validator::make($request->all(), [
            'nombres' => 'required|min:3|max:50',
            'apellidos' => 'required|min:3|max:50',
            'dni' => 'required|max:8',
            'email' => 'required|min:3|max:50',
            'direccion' => 'required|min:3|max:50',
            'telefono' => 'required|min:6|max:9',
            'sueldo' => 'required|min:0'
        ]);

        if ($validator->fails()) {
            $data['errors'] = $validator->errors();
            return redirect('gestionar/chefs')
                ->with($data);
        }

        // Si no hay errores, editamos
        $usuario = Auth::user();
        $chef = Chef::find($request->get('id'));

        $chef->usuario_id = $usuario->id;
        $chef->nombres	  = $request->get('nombres');
        $chef->apellidos  = $request->get('apellidos');
        $chef->dni        = $request->get('dni');
        $chef->email  = $request->get('email');
        $chef->direccion  = $request->get('direccion');
        $chef->telefono   = $request->get('telefono');
        $chef->sueldo     = $request->get('sueldo');
        $chef->masculino  = $request->get('masculino');
        $chef->activo     = $request->get('activo');
        $chef->save();
        $data['notif'] = "El chef se ha modificado correctamente.";

        return redirect('gestionar/chefs')->with($data);
    }

    public function postEliminar(Request $request)
    {	// Permite eliminarde manera lógica un chef

        $validator = Validator::make($request->all(), [
            'id' => 'exists:Chefs,id'
        ]);

        if ($validator->fails()) {
            $data['errors'] = $validator->errors();
            return redirect('gestionar/chefs')->with($data);
        }
        $usuario = Auth::user();
        $chef = Chef::find($request->get('id'));
        $chef->usuario_id =$usuario->id;
        $chef->activo = 0;
        $chef->save();

        $data['notif'] ="Chef eliminado de manera logica, correctamente.";

        return redirect('gestionar/chefs')->with($data);
    }
}