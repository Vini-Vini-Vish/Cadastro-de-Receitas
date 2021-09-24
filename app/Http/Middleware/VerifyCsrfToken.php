<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $addHttpCookie = true;

    protected $except = [
        'api',
        '/api/cadastro/salvar',
        '/api/cadastro/update/{id}',
    ];
}
