<?php namespace App\Http\Controllers;

use App\Chef;
use App\Detalle;
use App\Estado;
use App\Menu;
use App\MenuPlatos;
use App\Orden;
use App\OrdenPlatoDetalles;
use App\OrdenPlatos;
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

        $carbon = Carbon::now()->startOfWeek();

//        Alguna vez pensamos algo pero no lo usamos tal cual.
//        $isSunday = $carbon->dayOfWeek == 0;

//        if (!$isSunday)
//            return redirect('previsualizar/menu/'.$dia.'/'.$tipo);

            switch ($dia){
              case 'lunes':
                $adicionales = 0;
                break;
            case 'martes':
                $adicionales = 1;
                break;
            case 'miercoles':
                $adicionales = 2;
               break;
           case 'jueves':
                $adicionales = 3;
                break;
           case 'viernes':
                $adicionales = 4;
                break;
            case 'sabado':
               $adicionales = 5;
               break;
           case 'domingo':
               $adicionales = 6;
               break;
        }

        $carbon = $carbon->addDays($adicionales);

        $menu = Menu::where('fecha',$carbon->toDateString())->first();

        if (!$menu)
            $menu = Menu::create([
                'fecha' => $carbon
            ]);

        $relaciones = MenuPlatos::where('menu_id',$menu->id)->get();

        //Filtramos el tipo de plato que se mostrara en la vista
        switch($tipo) {
            case 'Entradas':
                $tipo = 1;
                break;
            case 'Segundos':
                $tipo = 2;
                break;
            case 'Postres':
                $tipo = 3;
                break;
            case 'Bebidas':
                $tipo = 4;
                break;
        }

        $platos = Plato::where('tipo_id', $tipo)->get();

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

    public function postAsignarPlatos( $dia, $tipo,  Request $request){
        $asignar = $request->get('asignar');
        $carbon = Carbon::now()->startOfWeek();
        switch ($dia){
            case 'lunes':
                $adicionales = 0;
                break;
            case 'martes':
                $adicionales = 1;
                break;
            case 'miercoles':
                $adicionales = 2;
                break;
            case 'jueves':
                $adicionales = 3;
                break;
            case 'viernes':
                $adicionales = 4;
                break;
            case 'sabado':
                $adicionales = 5;
                break;
            case 'domingo':
                $adicionales = 6;
                break;
        }
        $carbon = $carbon->addDays($adicionales);

        $menu = Menu::where('fecha',$carbon->toDateString())->first();

        if($asignar == 1){
            $relacion = MenuPlatos::create([
                'menu_id' => $menu->id,
                'plato_id' => $request->get('plato_id')
            ]);
            if($relacion)
                return ['exito'=>true];
            return ['exito'=>false];
        }
        else{
            $relacion = MenuPlatos::where('menu_id', $menu->id)->where('plato_id',$request->get('plato_id'))->first();

            $relacion->delete();
            return ['exito'=>true];
        }
    }

    public function getPrevisualizarMenu($dia, $tipo)
    {
        //dd($tipo);
        return view('admin.previsualizar-menu');
    }

    public function getPendientes()
    {
        $user = Auth::user();
        $estado = 'confirmado';
        $ordenesD = Orden::where('estado','<>',$estado)->where('tipo_orden',0)->get();
        $ordenesP = Orden::where('estado','<>',$estado)->where('tipo_orden',1)->get();
        return view('admin.pendientes')->with(compact('ordenesD','ordenesP','user'));
    }

    public function postPendientes(Request $request)
    {
        $ordenplato = OrdenPlatos::where('orden_id',$request->get('orden_id'))->where('plato_id',$request->get('plato_id'))->first();
        $ordendetalles = OrdenPlatoDetalles::where('ordenplatos_id', $ordenplato->id)->get();
        foreach($ordendetalles as $ordendetalle){
            $detalles[] = $ordendetalle->detalle;
        }
        return response()->json($detalles);
    }

    public function getEntregados()
    {
        $estado = 'confirmado';
        $ordenesD = Orden::where('estado', $estado)->where('tipo_orden',0)->get();
        $ordenesP = Orden::where('estado', $estado)->where('tipo_orden',1)->get();
        return view('admin.entregados')->with(compact('ordenesD','ordenesP'));
    }

    public function postEntregados(Request $request)
    {
        $ordenplato = OrdenPlatos::where('orden_id',$request->get('orden_id'))->where('plato_id',$request->get('plato_id'))->first();
        $ordendetalles = OrdenPlatoDetalles::where('ordenplatos_id', $ordenplato->id)->get();
        foreach($ordendetalles as $ordendetalle){
            $detalles[] = $ordendetalle->detalle;
        }
        return response()->json($detalles);
    }

    public function getGestionarPlatos()
    {
        $notif = Session::get('notif');
        $platos = Plato::all();
        $tipos = Tipo::all();
        return view('admin.gestionar-platos')->with(compact(['platos','tipos', 'notif']));
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

    public function getGestionarChefs(Request $request)
    {
        $notif = Session::get('notif');
        $chefs = Chef::all();
        return view('admin.gestionar-chefs')->with(compact(['chefs', 'notif']));
    }

    public function getGestionarPendientes($id)
    {
        $orden = Orden::find($id);
        $estados = Estado::where('state','>',$orden->estadodesc->state)->where('nombre','<>','confirmado')->get();
        return view('chef.gestionar-pendientes')->with(compact(['orden','estados']));
    }

    public function postGestionarPendientes($id,Request $request)
    {
        $orden = Orden::find($id);
        $orden->estado = $request->get('estado');
        $orden->chef_id = Auth::user()->id;
        $orden->save();
        return response()->json($orden);
    }

}