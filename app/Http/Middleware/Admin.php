<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Session;

class Admin
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
        if($role === 'admin'){
            $data_proses = Pengaduan::where('status','proses')->count();
            Session::flash('data_proses',$data_proses);
            return $next($request);
        }
        return abort(403,'role hanya untuk admin');
    }
}
