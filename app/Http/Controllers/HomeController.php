<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller {

    public function getWelcome()
    {
        if (Auth::check()) {
            switch (Auth::user()->tipo) {
                case 0: return view('user.welcome');
                case 1: return view('chef.welcome');
                case 2: return view('admin.welcome');
            }
        }

        return view('home');
    }

    public function validarUsuario(Request $request)
    {
        $username      = $request->get('username');
        $password  = $request->get('password');
        $usuario   = User::where('username', $username)->first();

        $respuesta    = new \stdClass();

        // Si no existe el usuario
        if ($usuario)
        {
            if ( Hash::check($password, $usuario->password) )
            {
                $respuesta->exito = true;
                $respuesta->tipo = $usuario->tipo;
                // 0: Usuario | 1: Chef | 2: Administrador
            } else {
                $respuesta->exito = false;
                $respuesta->mensaje = "Contraseña incorrecta.";
            }
        } else {
            $respuesta->exito = false;
            $respuesta->mensaje = "No existe una cuenta de usuario con el nombre indicado.";
        }

        return response()->json($respuesta);
    }

    public function postUsuarioRegistrar(Request $request)
    {
        $usuario = User::where('username', $request->username)->first();
        if ($usuario != null)
        {
            $exito = false;
        }
        else
        {
            $user = User::create([
                'username' => $request->username,
                'full_name' => $request->full_name,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'email' => $request->email,
                'tipo' => 0
            ]);
            $user->save();
            $exito = true;
        }
        return response()->json($exito);
    }

}