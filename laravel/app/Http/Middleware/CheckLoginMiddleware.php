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
        if (!$request->session()->has('is_login') || !$request->session()->has('name')) {
            $request->session()->flush();
            return redirect(route('login')); 
        }

        return $next($request);
    }
}
