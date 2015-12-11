<?php

namespace App\Http\Controllers;

use App\Detalle;
use App\Orden;
use App\OrdenPlatoDetalles;
use App\OrdenPlatos;
use App\Plato;
use App\PlatoDetalles;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdenController extends Controller
{
    public function getEntregadas()
    {
        $entregadas = Orden::where('estado','confirmado')->get();
        return response()->json($entregadas);
    }

    public function getPendientes()
    {
        $orders = Orden::all();
        $entregadas = [];

        foreach( $orders as $order )
        {
            if( $order->estado != "confirmado" )
            {
                $Pendientes[] = $order;
            }
        }
        return response()->json($Pendientes);
    }

    public function getOrdenPlatos($id)
    {
        $order = Orden::where('id',$id)->first();

        foreach($order->orden_platos as $orden_plato)
        {
            $platos[] = $orden_plato->plato;
        }

        return response()->json($platos);
    }

    public function getOrdenPlatoDetalles($orden_id,$plato_id)
    {
        $orden_platos = OrdenPlatos::where('orden_id',$orden_id)->get();
        $detalles = [];
        foreach($orden_platos as $orden_plato)
        {
            if( $orden_plato->plato_id == $plato_id )
            {
                $ordenPlatoDetalles = OrdenPlatoDetalles::where('ordenplatos_id',$orden_plato->id)->get();
                foreach($ordenPlatoDetalles as $ordenPlatoDetalle)
                {
                    $detalles[] = Detalle::find($ordenPlatoDetalle->detalle_id);
                }
            }
        }
        return response()->json($detalles);
    }

    public function postOrdenCambiarEstado( Request $request )
    {
        $orden = Orden::find($request->orden_id);
        $estadoCorreto = false;

        switch ($request->estado)
        {
            case 'espera':
                $estadoCorreto = true;
                break;
            case 'preparacion':
                $estadoCorreto = true;
                break;
            case 'terminado':
                $estadoCorreto = true;
                break;
            case 'confirmado':
                $estadoCorreto = true;
                break;
        }

        if($orden != null AND $estadoCorreto)
        {
            $orden->chef_id = $request->chef_id;
            $orden->estado = $request->estado;
            $respuesta = "Orden modificada correctamente.";
            $orden->save();
        }
        else if($orden == null)
        {
            $respuesta = "La orden no existe.";
        }
        else
            $respuesta = "El estado de la orden no es correcto.";

        return response()->json($respuesta);
    }

    public function postRegistrarMenuOrden( Request $request)
    {
        $usuario_id = $request->usuario_id;
        $detalles = $request->detalles;

        $entradas = $request->entradas;
        $segundos = $request->segundos;
        $postres = $request->postres;
        $bebidas = $request->bebidas;

        $importe = $request->importe;
        $tipo_orden = $request->tipo_orden;

        $orden = Orden::create([
            'usuario_id' => $usuario_id,
            'fecha' => Carbon::now('America/Lima'),
            'importe' => $importe,
            'descuento' => 0,
            'estado' => 'Espera',
            'tipo_orden' => $tipo_orden
        ]);

        if ($entradas)
            foreach ($entradas as $entrada) {
                $plato = OrdenPlatos::create([
                    'orden_id' => $orden->id,
                    'plato_id' => $entrada->id
                ]);

                foreach ( $detalles[ $entrada->id ] as $detalle) {

                    OrdenPlatoDetalles::create([
                        'ordenplatos_id' => $plato->id,
                        'detalle_id' => $detalle->id
                    ]);
                }
            }

        if ($segundos)
            foreach ($segundos as $segundo) {
                $plato = OrdenPlatos::create([
                    'orden_id' => $orden->id,
                    'plato_id' => $segundo->id
                ]);
                foreach ( $detalles[$segundo->id ] as $detalle ) {
                    OrdenPlatoDetalles::create([
                        'ordenplatos_id' => $plato->id,
                        'detalle_id' => $detalle->id
                    ]);
                }
            }

        if ($postres)
            foreach ($postres as $postre) {
                $plato = OrdenPlatos::create([
                    'orden_id' => $orden->id,
                    'plato_id' => $postre->id
                ]);
                foreach ( $detalles[ $postre->id ] as $detalle) {
                    OrdenPlatoDetalles::create([
                        'ordenplatos_id' => $plato->id,
                        'detalle_id' => $detalle->id
                    ]);
                }
            }

        if ($bebidas)
            foreach ($bebidas as $bebida) {
                $plato = OrdenPlatos::create([
                    'orden_id' => $orden->id,
                    'plato_id' => $bebida['id']
                ]);
                foreach ( $detalles[ $bebida->id ] as $detalle) {
                    OrdenPlatoDetalles::create([
                        'ordenplatos_id' => $plato->id,
                        'detalle_id' => $detalle->id
                    ]);
                }
            }

        return response()->json("Registro satisfctorio");
    }
}