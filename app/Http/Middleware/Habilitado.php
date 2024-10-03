<?php

namespace App\Http\Middleware;

use Closure;

class Habilitado
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
        if ($request->user()->status != 1) {
            toastr('error', 'INFORMACIÓN!', "Te encuentras deshabilitado en el sistema.");
            \Auth::logout();
            return redirect()->route('welcome');
        }
        return $next($request);
    }
}
