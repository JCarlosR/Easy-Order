<?php namespace App\Http\Controllers;

use App\Detalle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getWelcome()
    {
        return view('admin.welcome');
    }

    public function getAsignarMenu()
    {
        return view('admin.asignar-menu');
    }

    public function getAsignarPlatos()
    {
        return view('admin.asignar-platos');
    }

    public function getPendientes()
    {
        return view('admin.pendientes');
    }

    public function getEntregados()
    {
        return view('admin.entregados');
    }

    public function getGestionarPlatos()
    {
        return view('admin.gestionar-platos');
    }

    public function getGestionarDetalles()
    {
        //$detalles = Detalle::paginate(12);
        $notif = Session::get('notif');
        $detalles = Detalle::all();
        return view('admin.gestionar-detalles')->with(compact(['detalles', 'notif']));
    }



}