<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (auth()->check()) {
            // User telah diotentikasi, lanjutkan dengan memeriksa peran
            if (auth()->user()->hasRole($role)) {
                // User memiliki peran admin
                return $next($request);
            } else {
                // User tidak memiliki peran yang diizinkan
                abort(403, 'Unauthorized.');
            }
        } else {
            // User belum diotentikasi, alihkan ke halaman login
            return redirect()->route('login');
        }

        // if (auth()->check()) {
        //     // User telah diotentikasi, lanjutkan dengan memeriksa peran
        //     if (auth()->user()->hasAnyRole($roles)) {
        //         // User memiliki salah satu peran yang diizinkan
        //         return $next($request);
        //     } else {
        //         // User tidak memiliki peran yang diizinkan
        //         abort(403, 'Unauthorized.');
        //     }
        // } else {
        //     // User belum diotentikasi, alihkan ke halaman login
        //     return redirect()->route('login');
        // }

        // if (auth()->check()) {
        //     // Mengubah array dari $roles ke bentuk array yang dapat diterima
        //     $roles = is_array($roles) ? $roles : explode(',', $roles);
        //     // User telah diotentikasi, lanjutkan dengan memeriksa peran
        //     if (auth()->user()->hasAnyRole($roles)) {
        //         // User memiliki salah satu peran yang diizinkan
        //         return $next($request);
        //     } else {
        //         // User tidak memiliki peran yang diizinkan
        //         abort(403, 'Unauthorized.');
        //     }
        // } else {
        //     // User belum diotentikasi, alihkan ke halaman login
        //     return redirect()->route('login');
        // }

    }
}
