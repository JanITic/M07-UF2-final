<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/prof',
        '/prof/edit/{id}',
        '/prof/crear',
        '/prof/edit/{id}',
        '/prof/delete/{id}',
        '/prof/pujar',
        '/crearUsuari',
        '/crearUsuari',
        '/signin',
        '/professor',
        '/consulta',
        '/trobat/{product_name}',
        '/notrobat/{product_name}'
    ];
}
