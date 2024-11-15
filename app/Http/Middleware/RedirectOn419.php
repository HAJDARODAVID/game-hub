<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectOn419
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->hasSession()) {
        return redirect()->route('home');
        }
        return $next($request);
    }
}