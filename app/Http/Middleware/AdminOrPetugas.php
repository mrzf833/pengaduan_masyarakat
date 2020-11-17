<?php

namespace App\Http\Middleware;

use Closure;

class AdminOrPetugas
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
        if($role === 'admin'|| $role === 'petugas'){
            return $next($request);
        }
        return abort(403,'role hanya untuk admin');
    }
}
