<?php

namespace App\Http\Middleware;

use Closure;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Lógica del middleware.
        //Pregunta si la sesión existe.
        if(!session()->has('administrador')) {
            return back();
        }
        return $next($request);
    }
}
