<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            // Jika user tidak login atau rolenya tidak diizinkan,
            // kembalikan ke halaman 403 (Forbidden)
            abort(403, 'AKSI TIDAK DIIZINKAN.');
        }

        return $next($request);
    }
}
