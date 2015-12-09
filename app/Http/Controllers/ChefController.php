<?php namespace App\Http\Controllers;
use App\Chef;
use App\Orden;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
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
            'dni' => 'required|min:7|max:8',
            'email' => 'required|min:5|max:50',
            'direccion' => 'required|min:3|max:50',
            'telefono' => 'required|min:6|max:9',
            'sueldo' => 'required|min:0'
        ]);

        $chef_test = Chef::where('dni',$request->dni )->first();

        if( strpos(trim($request->nombres),' ') == false )
            $espacio = strlen($request->nombres);
        else
            $espacio = strpos(trim($request->nombres),' ');
        $nombre  = substr($request->nombres,0,$espacio);

        if( strpos(trim($request->apellidos),' ') == false )
            $space = strlen($request->apellidos);
        else
            $space = strpos($request->apellidos,' ');
        $apellido  = substr($request->apellidos,0,$space);

        if ($validator->fails() OR strlen($nombre)<3 OR strlen($apellido)<3 OR $chef_test != null) {
            $data['errors'] = $validator->errors();
            if($chef_test != null)
                $data['errors']->add("dni", "No puede registrar 2  chefs con el mismo dni");
            else if( strlen($nombre)<3 )
                $data['errors']->add("nombre", "El primer nombre debe tener por lo menos 3 caracteres ");
            else if ( strlen($apellido)<3 )
                $data['errors']->add("apellido", "El primer apellido debe tener por lo menos 3 caracteres ");

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
            'direccion'  => $request->get('direccion'),
            'email'      => $request->get('email'),
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
                'password'  => bcrypt( $request->get('dni') ),
                'phone'     => $request->get('telefono'),
                'email'     => $request->get('email'),
                'tipo'      => 1
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
                'username' => $user_completo,
                'full_name' => $fullname,
                'password' => bcrypt( $request->get('dni') ),
                'phone'    => $request->get('telefono'),
                'email'    => $request->get('email'),
                'tipo'     => 1
            ]);
        }
        $data['notif'] = "El Chef con USUARIO: ".$user->username." y CLAVE: ".$chef->dni." ha sido registrado correctamente.";
        $user->save();
        $chef->save();

        return redirect('gestionar/chefs')->with($data);
    }

    public function postModificar(Request $request)
    {
        $validator = Validator::make($request->all(), [
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