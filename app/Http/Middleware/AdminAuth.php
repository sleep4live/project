<?php

// app/Http/Middleware/AdminAuth.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah admin sudah login (gunakan session)
        if (!session()->has('admin')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }
        
        return $next($request);
    }
}
