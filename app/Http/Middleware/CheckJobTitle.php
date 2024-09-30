<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckJobTitle
{
    public function handle($request, Closure $next, $roleId)
    {
        if (auth()->check() && auth()->user()->id !== (int)$roleId) {
            // Redirigir si el usuario no tiene el rol correcto
            return redirect()->route('admin.login')->withErrors('No tienes permisos para acceder a esta página.');
        }

        return $next($request);
    }
}
