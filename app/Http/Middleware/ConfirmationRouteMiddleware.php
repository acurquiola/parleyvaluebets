<?php

namespace App\Http\Middleware;

use Closure;

class ConfirmationRouteMiddleware
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
        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            abort(410);
        }

        return $next($request);
    }
}
