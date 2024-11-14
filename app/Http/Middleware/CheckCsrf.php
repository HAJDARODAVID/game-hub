<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCsrf
{
    protected $except = [
        // other routes that need excepting
        'stripe/*',
    ];

    public function handle($request, Closure $next): Response
    {
        if($request->route()->named('logout')) {

            if (!Auth::check() || Auth::guard()->viaRemember()) {

                $this->except[] = 'logout';
                
            }   
        }

        return $next($request);
    }
}
