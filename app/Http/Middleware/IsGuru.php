<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsGuru
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role !== 'guru') {
            return redirect()->route('murid.beranda')->with('error', 'Anda bukan guru!');
        }
        return $next($request);
    }
}
