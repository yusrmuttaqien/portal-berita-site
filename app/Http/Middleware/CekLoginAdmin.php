<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLoginAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin_id')) {
            return redirect()->route('login.form')->with('error', 'Silakan login dulu.');
        }
        return $next($request);
    }
}
