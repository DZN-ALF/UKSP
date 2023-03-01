<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Pembayaran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->level != 'admin' && auth()->user()->level != 'petugas') {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki hak akses');
        }
       
        return $next($request);
    }
    
}
