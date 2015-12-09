<?php

namespace App\Http\Controllers;

use App\Orden;
use App\OrdenPlatoDetalles;
use App\OrdenPlatos;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdenController extends Controller
{
    //API
    public function index()
    {
        $orders = Orden::all();
        $date = Carbon::now('America/Lima');
        $today = $date->toDateString();
        $ordenes = [];

        foreach( $orders as $order )
        {
            if( date_create($order->fecha)< date_create($today)  )
            {
                $ordenes[] = $order;
            }
        }
        return response()->json($ordenes);
    }

    public function store( Request $request)
    {
        $usuario_id = $request->get('usuario_id');
        $detalles = $request->get('detalles');
        $entradas = $request->get('entradas');
        $segundos = $request->get('segundos');
        $postres = $request->get('postres');
        $bebidas = $request->get('bebidas');
        $importe = $request->get('importe');
        $tipo_orden = $request->get('tipo_orden');

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
                    'plato_id' => $entrada['id']
                ]);

                foreach ( $detalles[$entrada['id'] ] as $detalle) {

                    dd($detalle);

                    OrdenPlatoDetalles::create([
                        'ordenplatos_id' => $plato->id,
                        'detalle_id' => $detalle['id']
                    ]);
                }
            }

        if ($segundos)
            foreach ($segundos as $segundo) {
                $plato = OrdenPlatos::create([
                    'orden_id' => $orden->id,
                    'plato_id' => $segundo['id']
                ]);
                foreach ( $detalles[$segundo['id'] ] as $detalle) {
                    OrdenPlatoDetalles::create([
                        'ordenplatos_id' => $plato->id,
                        'detalle_id' => $detalle['id']
                    ]);
                }
            }

        if ($postres)
            foreach ($postres as $postre) {
                $plato = OrdenPlatos::create([
                    'orden_id' => $orden->id,
                    'plato_id' => $postre['id']
                ]);
                foreach ( $detalles[$postre['id'] ] as $detalle) {
                    OrdenPlatoDetalles::create([
                        'ordenplatos_id' => $plato->id,
                        'detalle_id' => $detalle['id']
                    ]);
                }
            }

        if ($bebidas)
            foreach ($bebidas as $bebida) {
                $plato = OrdenPlatos::create([
                    'orden_id' => $orden->id,
                    'plato_id' => $bebida['id']
                ]);
                foreach ( $detalles[$bebida['id'] ] as $detalle) {
                    OrdenPlatoDetalles::create([
                        'ordenplatos_id' => $plato->id,
                        'detalle_id' => $detalle['id']
                    ]);
                }
            }

        return response()->json("Registro satisfctorio");
    }

    public function create()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
