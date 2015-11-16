<?php namespace App\Http\Controllers;

use App\Detalle;
use App\Menu;
use App\MenuPlatos;
use App\Plato;
use App\PlatoDetalles;
use App\Tipo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        $diasSlug = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        $diasName = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
        $tipos = Tipo::all();

        return view('admin.asignar-menu')->with(compact('diasSlug', 'diasName', 'tipos'));
    }

    public function getAsignarPlatos($dia, $tipo)
    {
        //Comprobamos si es domingo
        $carbon = Carbon::now('America/Lima');
        $isSunday = $carbon->dayOfWeek == 0;

//        if (!$isSunday)
//            return redirect('previsualizar/menu/'.$dia.'/'.$tipo);

        switch ($dia){
            case 'lunes':
                $adicionales = 1;
                break;
            case 'martes':
                $adicionales = 2;
                break;
            case 'miercoles':
                $adicionales = 3;
                break;
            case 'jueves':
                $adicionales = 4;
                break;
            case 'viernes':
                $adicionales = 5;
                break;
            case 'sabado':
                $adicionales = 6;
                break;
            case 'domingo':
                $adicionales = 7;
                break;
        }
        $carbon = $carbon->addDays($adicionales);
        $menu = Menu::where('fecha',$carbon->toDateString())->first();
        if (!$menu)
            $menu = Menu::create([
                'fecha' => $carbon
            ]);
        $relaciones = MenuPlatos::where('menu_id',$menu->id);
        $platos = Plato::all();
        $asignados = [];
        $noAsignados = [];
        foreach ($platos as $plato) {
            $asignado = false;
            foreach ($relaciones as $relacion) {
                //se encontro el plato dentro de las relaciones
                if ($relacion->plato_id == $plato->id) {
                    $asignado = true;
                    break;
                }
            }
            if ($asignado) {
                $asignados[] = $plato;
            }
            else {
                $noAsignados[] = $plato;
            }
        }
        return view('admin.asignar-platos')->with(compact(['asignados','noAsignados']));
    }

    public function getPrevisualizarMenu($dia, $tipo)
    {
        dd($tipo);
        return view('admin.previsualizar-menu');
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
        $notif = Session::get('notif');
        $platos = Plato::all();
        return view('admin.gestionar-platos')->with(compact(['platos', 'notif']));
    }

    public function getGestionarDetalles()
    {
        //$detalles = Detalle::paginate(12);
        $notif = Session::get('notif');
        $detalles = Detalle::all();
        return view('admin.gestionar-detalles')->with(compact(['detalles', 'notif']));
    }

    public function getPlatoDetalles()
    {
        $platos = Plato::all();
        return view('admin.gestionar-platodetalles')->with(compact(['platos']));
    }

    public function getGestionarPlatoDetalles($id)
    {
        $relaciones = PlatoDetalles::where('plato_id',$id)->get();
        $detalles = Detalle::all();
        $plato = Plato::find($id);

        $asignados = [];
        $noAsignados = [];
        foreach ($detalles as $detalle) {
            $asignado = false;
            foreach ($relaciones as $relacion) {
                //se encontro el plato dentro de las relaciones
                if ($relacion->detalle_id == $detalle->id) {
                    $asignado = true;
                    break;
                }
            }
            if ($asignado) {
                $asignados[] = $detalle;
            } else {
                $noAsignados[] = $detalle;
            }
        }

        return view('admin.asignar-detalles')->with(compact(['plato','asignados','noAsignados']));
    }

    public function postGestionarPlatoDetalles($id, Request $request){
        $asignar = $request->get('asignar');
        if($asignar == 1){
            $relacion = PlatoDetalles::create([
                'plato_id'=>$id,
                'detalle_id'=>$request->get('detalle_id')
            ]);
            if($relacion)
                return ['exito'=>true];
            return ['exito'=>false];
        }
        else{
            $relacion = PlatoDetalles::where('plato_id',$id)->where('detalle_id',$request->get('detalle_id'))->first();
            $relacion->delete();
            return ['exito'=>true];
        }
    }



}