<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->utype === 'Admin'){
            return $next($request);
        }
        else{
            abort(403, 'Access denied');
        }
        return $next($request);
    }
}
