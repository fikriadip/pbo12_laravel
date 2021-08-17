<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
    //jika akun yang login sesuai dengan role 
    //maka silahkan akses
    //jika tidak sesuai akan diarahkan ke home

    if (in_array($request->user()->role, $roles)) {
        return $next($request);
    }
    return back();
    }
}
