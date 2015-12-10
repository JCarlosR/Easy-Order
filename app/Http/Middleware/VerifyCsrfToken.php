<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     * @var array
     */
    protected $except = [
        'plato*',
        'detalle*',
        'gestionar/platodetalles/*',
        'asignar/platos/*',
        'pedidos/pendientes*',
        'pedidos/entregados*',
        'validar*',
        'recepcion*'

    ];
}
