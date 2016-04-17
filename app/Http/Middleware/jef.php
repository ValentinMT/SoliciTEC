<?php

namespace App\Http\Middleware;

use Closure;

class jef
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
        if(!session()->has('jefe')) {
            return back();
        }
        return $next($request);
    }
}
