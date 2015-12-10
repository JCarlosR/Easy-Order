<?php namespace App\Http\Controllers;


use App\Combo;
use App\ComboPlatoDetalles;
use App\ComboPlatos;
use App\Detalle;
use App\Menu;
use App\Orden;
use App\OrdenPlatoDetalles;
use App\OrdenPlatos;
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
        $carbon = Carbon::now('America/Lima');
        $fechaActual = $carbon->toDateString();
        $menu = Menu::where('fecha', $fechaActual)->first();
        $hora = $carbon->toTimeString();

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
        return view('user.solicitar')->with(compact(['hora', 'combos','entradas','segundos','postres','bebidas', 'platos']));
    }

    public function postPrevisualizar(Request $request)
    {
        $total = 0;

        $entradas_id = $request->get('entradas');
        $segundos_id = $request->get('segundos');
        $postres_id = $request->get('postres');
        $bebidas_id = $request->get('bebidas');
        $tipo_orden = $request->get('tipo_orden');
        $combo_id = null;

        //dd($tipo_orden);

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
        $request->session()->put('tipo_orden', $tipo_orden);
        $request->session()->put('detalles', $detalles);
        $request->session()->put('importe', $total);
        //dd($detalles);
        return view('user.orden')->with(compact(['combo_id','total', 'entradas', 'segundos', 'postres', 'bebidas', 'detalles']));
    }

    public function getPrevisualizar(Request $request, $tipo, $combo_id)
    {
        $total = 0;
        $entradas = [];
        $segundos = [];
        $postres = [];
        $bebidas = [];
        $comboplatos = ComboPlatos::where('combo_id',$combo_id)->get();

        // Detalles de todos los platos, arreglo de arreglos
        $detalles = [];

        foreach($comboplatos as $comboplato)
        {
            $plato = $comboplato->plato;
            $total += $plato->precio;
            // Capturar detalles en un arreglo global
            $comboplatodetalles_actual = ComboPlatoDetalles::where('comboplatos_id', $comboplato->id)->get();
            $detalles_actual = collect([]);

            foreach($comboplatodetalles_actual as $comboplatodetalle_actual)
            {
                $detalles_actual->push($comboplatodetalle_actual->detalle);
                $total += $comboplatodetalle_actual->detalle->precio;
            }

            $detalles[$plato->id] = $detalles_actual;

            // Clasificar
            switch ($plato->tipo_id){
                case 1: $entradas[] = $plato; break;
                case 2: $segundos[] = $plato; break;
                case 3: $postres[] = $plato; break;
                case 4: $bebidas[] = $plato; break;
            }

        }
        //dd($detalles);
        $request->session()->put('entradas', $entradas);
        $request->session()->put('segundos', $segundos);
        $request->session()->put('postres', $postres);
        $request->session()->put('bebidas', $bebidas);
        $request->session()->put('detalles', $detalles);
        $request->session()->put('importe', $total);
        $request->session()->put('tipo_orden', $tipo);
        //
        //dd($tipo);
        return view('user.orden')->with(compact(['combo_id','total', 'entradas', 'segundos', 'postres', 'bebidas', 'detalles']));

    }

    public function postConfirmar(Request $request)
    {

        $tipo_orden = $request->session()->get('tipo_orden');
        $combo_name = $request->get('comboName');
        //dd($combo_name);

        // Validación de los datos requeridos
        if (! $request->has('direccion'))
            return redirect('solicitar')->with('information', 'No ha indicado la dirección destino.');
        if (! isset($tipo_orden))
            return redirect('solicitar')->with('information', 'No ha indicado el tipo de orden (delivery o pick-up).');

        $direccion = $request->get('direccion');
        $carbon = Carbon::now('America/Lima');
        $hora_pedido = $carbon->format('h:i:s A');
        $hora_entrega = $carbon->addHours(2)->format('h:i:s A');

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
        //dd($tipo_orden);
        //$request->session()->put('combo_name', $combo_name);
        $fecha = $dia_name." ".$dia_mes." de ".$mes_name." de ".$year;
        return view('user.confirmar')->with(compact('combo_name','tipo_orden', 'fecha','hora_pedido', 'hora_entrega', 'direccion'));
    }

    public function postOrden(Request $request)
    {
        $detalles = $request->session()->get('detalles');

        $entradas = $request->session()->get('entradas');
        $segundos = $request->session()->get('segundos');
        $postres = $request->session()->get('postres');
        $bebidas = $request->session()->get('bebidas');
        $importe = $request->session()->get('importe');
        $tipo_orden = $request->session()->get('tipo_orden');

        $combo_name = $request->get('combo_name');

        //dd($entradas);
        $orden = Orden::create([
            'usuario_id' => Auth::user()->id,
            'fecha' => Carbon::now('America/Lima'),
            'importe' => $importe,
            'descuento' => 0,
            'estado' => 'Espera',
            //'combo_name' => ,
            'tipo_orden' => $tipo_orden
        ]);

        if($entradas)
            foreach ($entradas as $entrada){
                $plato = OrdenPlatos::create([
                    'orden_id' => $orden->id,
                    'plato_id' => $entrada->id
                ]);
                if($detalles[$entrada->id]){
                    foreach ($detalles[$entrada->id] as $detalle){
                        OrdenPlatoDetalles::create([
                            'ordenplatos_id' => $plato->id,
                            'detalle_id' => $detalle->id
                        ]);
                    }
                }
            }

        if($segundos)
            foreach ($segundos as $segundo){
                $plato = OrdenPlatos::create([
                    'orden_id' => $orden->id,
                    'plato_id' => $segundo->id
                ]);
                if($detalles[$segundo->id])
                    foreach ($detalles[$segundo->id] as $detalle){
                        OrdenPlatoDetalles::create([
                            'ordenplatos_id' => $plato->id,
                            'detalle_id' => $detalle->id
                        ]);
                    }
            }

        if($postres)
            foreach ($postres as $postre){
                $plato = OrdenPlatos::create([
                    'orden_id' => $orden->id,
                    'plato_id' => $postre->id
                ]);
                if($detalles[$postre->id])
                    foreach ($detalles[$postre->id] as $detalle){
                        OrdenPlatoDetalles::create([
                            'ordenplatos_id' => $plato->id,
                            'detalle_id' => $detalle->id
                        ]);
                    }
            }

        if($bebidas)
            foreach ($bebidas as $bebida){
                $plato = OrdenPlatos::create([
                    'orden_id' => $orden->id,
                    'plato_id' => $bebida->id
                ]);
                if($detalles[$bebida->id])
                    foreach ($detalles[$bebida->id] as $detalle){
                        OrdenPlatoDetalles::create([
                            'ordenplatos_id' => $plato->id,
                            'detalle_id' => $detalle->id
                        ]);
                    }
            }

        $carbon = Carbon::now('America/Lima');
        $fechaActual = $carbon->toDateString();
        if($combo_name != "")
        {
            $combo = Combo::create([
                'usuario_id' => Auth::user()->id,
                'fecha' => $fechaActual,
                'destacado' => 0,
                'nombre' => $combo_name
            ]);
            if($entradas)
                foreach ($entradas as $entrada){
                    $comboplato = ComboPlatos::create([
                        'combo_id' => $combo->id,
                        'plato_id' => $entrada->id
                    ]);
                    foreach ($detalles[$entrada->id] as $detalle){
                        ComboPlatoDetalles::create([
                            'comboplatos_id' => $comboplato->id,
                            'detalle_id' => $detalle->id
                        ]);
                    }
                }
            if($segundos)
                foreach ($segundos as $segundo){
                    $comboplato = ComboPlatos::create([
                        'combo_id' => $combo->id,
                        'plato_id' => $segundo->id
                    ]);
                    foreach ($detalles[$segundo->id] as $detalle){
                        ComboPlatoDetalles::create([
                            'comboplatos_id' => $comboplato->id,
                            'detalle_id' => $detalle->id
                        ]);
                    }
                }

            if($postres)
                foreach ($postres as $postre){
                    $comboplato = ComboPlatos::create([
                        'combo_id' => $combo->id,
                        'plato_id' => $postre->id
                    ]);
                    foreach ($detalles[$postre->id] as $detalle){
                        ComboPlatoDetalles::create([
                            'comboplatos_id' => $comboplato->id,
                            'detalle_id' => $detalle->id
                        ]);
                    }
                }

            if($bebidas)
                foreach ($bebidas as $bebida){
                    $comboplato = ComboPlatos::create([
                        'combo_id' => $combo->id,
                        'plato_id' => $bebida->id
                    ]);
                    foreach ($detalles[$bebida->id] as $detalle){
                        ComboPlatoDetalles::create([
                            'comboplatos_id' => $comboplato->id,
                            'detalle_id' => $detalle->id
                        ]);
                    }
                }


        }


        return redirect('solicitar')->with('notif', 'Su orden se ha registrado correctamente.');
    }

    public function getRecepcion()
    {
        $estado = 'terminado';
        $usuario = Auth::user()->id;
        $ordenes = Orden::where('estado', $estado)->where('usuario_id',$usuario)->get();
        return view('user.recepcion')->with(compact('ordenes'));
    }

    public function postRecepcion(Request $request)
    {
        $orden = Orden::find($request->get('orden_id'));
        $orden->estado = $request->get('estado');
        $orden->save();
        return response()->json($orden);
    }

    public function getAnteriores()
    {
        // Obtener todas las ordenes con estado-> 'confirmado'
        $estado = 'confirmado';
        $usuario = Auth::user()->id;
        $ordenes = Orden::where('estado', $estado)->where('usuario_id',$usuario)->get();
        return view('user.anteriores')->with(compact('ordenes'));
    }
    public function postguardarName(Request $request)
    {

    }

}
