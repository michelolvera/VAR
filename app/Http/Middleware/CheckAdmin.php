<?php
/*
    Middleware que verifica si el usuario que realiza la accion es un administrador.
*/
namespace ArticulosReligiosos\Http\Middleware;

use Closure;

class CheckAdmin
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
        if ($request->user()->admin)
            return $next($request);
        abort(401);
    }
}
