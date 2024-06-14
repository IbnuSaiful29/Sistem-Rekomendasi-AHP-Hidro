<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckInputBeforeRecommendation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah input nilai terbaik tersedia di session
        if (!$request->session()->has('best_values')) {
            // Redirect ke halaman input jika nilai terbaik tidak ditemukan di session
            return redirect()->route('cekrekomendasi');
        }

        // if ($request->isMethod('get')) {
        //     // Redirect ke halaman lain jika permintaan menggunakan metode GET
        //     return redirect()->route('cekrekomendasi'); // Ganti dengan nama rute yang ingin Anda arahkan
        // }

        return $next($request);
    }
}
