<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // BYPASS LOGIN: Otomatis login sebagai admin pertama di database
        if (!auth()->check()) {
            $admin = \App\Models\User::where('role', 'admin')->first();
            if ($admin) {
                auth()->login($admin);
            }
        }

        // Cek lagi setelah bypass
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk admin.');
        }

        return $next($request);
    }
}