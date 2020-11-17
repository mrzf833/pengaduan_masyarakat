<?php

namespace App\Http\Middleware;

use Closure;

class Masyarakat
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
        $role = auth()->user()->roles->role;
        if($role === 'masyarakat'){
            return $next($request);
        }
        return abort(403,'role hanya untuk masyarakat');
    }
}
