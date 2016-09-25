<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    protected $hierarchy = [
        'admin' => 5,
        'usuario' => 1

    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        if($this->hierarchy[$user->tipoUsuario] < $this->hierarchy[$role] ){
            abort(403);
        }

        return $next($request);
    }
}
