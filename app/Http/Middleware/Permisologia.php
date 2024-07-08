<?php

namespace App\Http\Middleware;

use Closure;

class permisologia
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol1=null, $rol2=null, $rol3=null, $rol4=null, $rol5=null, $rol6=null)
    {
        $permisos = array($rol1, $rol2, $rol3, $rol4, $rol5, $rol6);
        if(in_array(\Auth::user()->permit->type, $permisos)){
            return $next($request);
        }
        abort(403);
    }
}
