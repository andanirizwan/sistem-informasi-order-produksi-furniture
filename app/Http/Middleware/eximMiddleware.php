<?php

namespace App\Http\Middleware;

use Closure;

class eximMiddleware
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
        $user= $request->user();

        if ($user->role == 'exim') {
            return $next($request);
        }

        return redirect (404);
    }
}
