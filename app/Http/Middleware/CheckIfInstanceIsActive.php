<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\GameInstance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfInstanceIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $gameInstance = GameInstance::find(Auth::user()->game_inst);
        if ($gameInstance->status == GameInstance::STATUS_ACTIVE) {
            return redirect()->route('gameController', $gameInstance->id);
        }
        return $next($request);
    }
}
