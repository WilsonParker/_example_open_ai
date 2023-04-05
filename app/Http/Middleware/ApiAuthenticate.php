<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class ApiAuthenticate extends Middleware
{
    /**
     * @throws \Exception
     */
    protected function unauthenticated($request, array $guards)
    {
        throw new \Exception(
            'Unauthenticated.', 401
        );
    }
}
