<?php namespace App\Http\Controllers;

use App\Detalle;
use App\Menu;
use App\MenuPlatos;
use App\Plato;
use App\Tipo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

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


}