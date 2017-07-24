<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OrderMiddleware
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
        if(!$request->session()->has("users")){

            return redirect("login/");
        }
        return $next($request);
    }
}
