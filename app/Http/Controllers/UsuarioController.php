<?php namespace App\Http\Controllers;


use App\Combo;
use App\Detalle;
use App\Menu;
use App\Orden;
use App\Plato;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getWelcome()
    {
        return view('user.welcome');
    }

    public function getSolicitar()
    {
        // Listado de combos
        $combos = Combo::all();

        // Variables a llenar
        $platos = [];
        $entradas = [];
        $segundos = [];
        $postres = [];
        $bebidas = [];

        // Menu del día
        $fechaActual = Carbon::now()->toDateString();
        $menu = Menu::where('fecha', $fechaActual)->first();

        if ($menu) {
            $relaciones = $menu->menu_platos;

            foreach ( $relaciones as $relacion )
            {
                $platos[] = $relacion->plato;
                switch ( $relacion->plato->tipo->descripcion )
                {
                    case "Entradas":
                        $entradas[] = $relacion->plato;
                        break;
                    case "Segundos":
                        $segundos[] = $relacion->plato;
                        break;
                    case "Postres" :
                        $postres[]  = $relacion->plato;
                        break;
                    case "Bebidas" :
                        $bebidas[]  = $relacion->plato;
                        break;
                }
            }
        }
        return view('user.solicitar')->with(compact(['combos','entradas','segundos','postres','bebidas', 'platos']));
    }

    public function getPrevisualizar(Request $request)
    {
        $total = 0;

        $entradas_id = $request->get('entradas');
        $segundos_id = $request->get('segundos');
        $postres_id = $request->get('postres');
        $bebidas_id = $request->get('bebidas');

        $entradas = Plato::find( $entradas_id );
        if($entradas)
        foreach($entradas as $entrada)
            $total += $entrada->precio;

        $segundos = Plato::find( $segundos_id );
        if($segundos)
        foreach($segundos as $segundo)
            $total += $segundo->precio;

        $postres = Plato::find( $postres_id );
        if($postres)
        foreach($postres as $postre)
            $total += $postre->precio;

        $bebidas = Plato::find( $bebidas_id );
        if($bebidas)
        foreach($bebidas as $bebida)
            $total += $bebida->precio;

        $detalles = [];
        if($entradas_id)
            foreach($entradas_id as $entrada) {
                $detalles_id = $request->get('detalles'.$entrada);
                $detalles_objetos = Detalle::find($detalles_id);
                $detalles[$entrada] = $detalles_objetos;
                if($detalles_objetos)
                foreach($detalles_objetos as $detalle)
                    $total += $detalle->precio;

            }
        if($segundos_id)
            foreach($segundos_id as $segundo) {
                $detalles_id = $request->get('detalles'.$segundo);
                $detalles_objetos = Detalle::find($detalles_id);
                $detalles[$segundo] = $detalles_objetos;
                if($detalles_objetos)
                foreach($detalles_objetos as $detalle)
                    $total += $detalle->precio;
            }
        if($postres_id)
            foreach($postres_id as $postre) {
                $detalles_id = $request->get('detalles'.$postre);
                $detalles_objetos = Detalle::find($detalles_id);
                $detalles[$postre] = $detalles_objetos;
                if($detalles_objetos)
                    foreach($detalles_objetos as $detalle)
                        $total += $detalle->precio;
            }
        if($bebidas_id)
            foreach($bebidas_id as $bebida) {
                $detalles_id = $request->get('detalles'.$bebida);
                $detalles_objetos = Detalle::find($detalles_id);
                $detalles[$bebida] = $detalles_objetos;
                if($detalles_objetos)
                    foreach($detalles_objetos as $detalle)
                        $total += $detalle->precio;

            }

        // Guardamos en variables de sesión para que los datos persistan
        $request->session()->put('entradas', $entradas);
        $request->session()->put('segundos', $segundos);
        $request->session()->put('postres', $postres);
        $request->session()->put('bebidas', $bebidas);

        return view('user.orden')->with(compact(['total', 'entradas', 'segundos', 'postres', 'bebidas', 'detalles']));
    }

    public function postConfirmar(Request $request)
    {
        $entradas = $request->session()->get('entradas');
        $segundos = $request->session()->get('segundos');
        $postres = $request->session()->get('postres');
        $bebidas = $request->session()->get('bebidas');
        //dd($request->session()->all());

        // Validación de los datos requeridos
        if (! $request->has('direccion'))
            return redirect('solicitar')->with('information', 'No ha indicado la dirección destino.');
        if (! $request->has('tipo_orden'))
            return redirect('solicitar')->with('information', 'No ha indicado el tipo de orden (delivery o pick-up).');

        $tipo_orden = $request->get('tipo_orden');
        $direccion = $request->get('direccion');
        $hora_pedido = date('h:i A', time() - 3600*date('I'));
        $hora_entrega = date('h:i A', time() - 3600*date('I') + 3600*2);

        date_default_timezone_set("America/Lima" ) ;

        $time = getdate(time());
        $dia = $time['wday'];
        $dia_mes = $time['mday'];
        $mes = $time['mon'];
        $year = $time['year'];
        $dia_name = "";
        $mes_name = "";
        switch ($dia){
            case "1": $dia_name="Lunes"; break;
            case "2": $dia_name="Martes"; break;
            case "3": $dia_name="Miércoles"; break;
            case "4": $dia_name="Jueves"; break;
            case "5": $dia_name="Viernes"; break;
            case "6": $dia_name="Sábado"; break;
            case "0": $dia_name="Domingo"; break;
        }
        switch($mes) {
            case "1": $mes_name = "Enero"; break;
            case "2": $mes_name = "Febrero"; break;
            case "3": $mes_name = "Marzo"; break;
            case "4": $mes_name = "Abril"; break;
            case "5": $mes_name = "Mayo"; break;
            case "6": $mes_name = "Junio"; break;
            case "7": $mes_name = "Julio"; break;
            case "8": $mes_name = "Agosto"; break;
            case "9": $mes_name = "Septiembre"; break;
            case "10": $mes_name = "Octubre"; break;
            case "11": $mes_name = "Noviembre"; break;
            case "12": $mes_name = "Diciembre"; break;
        }

        $fecha = $dia_name." ".$dia_mes." de ".$mes_name." de ".$year;
        return view('user.confirmar')->with(compact('fecha','hora_pedido', 'hora_entrega', 'direccion'));
    }

    public function getRecepcion()
    {
        return view('user.recepcion');
    }

    public function getAnteriores()
    {
        // Obtener todas las ordenes con estado-> 'confirmado'
        $estado = 'confirmado';
        $usuario = Auth::user()->id;
        $ordenes = Orden::where('estado', $estado)->where('usuario_id',$usuario)->get();

        return view('user.anteriores')->with(compact('ordenes'));
    }

}
