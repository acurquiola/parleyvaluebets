<?php

namespace App\Http\Middleware;

use Closure;

class AdminUserMiddleware
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
        $user = \Auth::user();
        if($user->tipoUsuario != 'admin'){
            return \View::make('home.errors.error_403')->with('status', 'Acceso Denegado');
        }
        return $next($request);
    }
}
