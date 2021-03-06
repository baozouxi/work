<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginMiddleware
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
        if (!$request->session()->has('role_id') || !$request->session()->has('access_nodes')) {
            $request->session()->flush();
            return redirect(route('login')); 
        }

        return $next($request);
    }
}
