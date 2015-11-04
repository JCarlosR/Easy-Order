<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        return view('admin.welcome');
    }

    public function getGestionarDetalles()
    {
        return view('admin.gestionar-detalles');
    }



}