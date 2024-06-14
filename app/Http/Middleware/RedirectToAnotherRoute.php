<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectToAnotherRoute
{
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('GET')) {
            return redirect()->route('cekrekomendasi');
        }else{
            return $next($request);
        }


    }
}
