<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::get('siswa')) {
            return redirect('/login-siswa')
                ->with('error', 'Silakan login terlebih dahulu!');
        }

        return $next($request);
    }
}
