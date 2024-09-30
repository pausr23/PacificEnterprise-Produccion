<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckJobTitle
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $jobTitleId
     * @return mixed
     */
    public function handle($request, Closure $next, $jobTitleId)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')->withErrors('Debes iniciar sesión para acceder.');
        }

        $user = Auth::user();

        // Solo redirigir si el job_titles_id no coincide
        if ($user->job_titles_id != $jobTitleId) {
            return redirect()->route('admin.login')->withErrors('No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
