<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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


}