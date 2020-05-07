<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
{
    public function handle($request, Closure $next)
    {
//        if (session()->has($request->cookie()['name'])) {
//            return $next($request);
//        } else {
//            return redirect()->route('login');
//        }
        return $next($request);
    }
}
