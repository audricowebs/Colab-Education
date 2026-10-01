<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsMurid
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role !== 'murid') {
            return redirect()->route('guru.beranda')->with('error', 'Anda bukan murid!');
        }
        return $next($request);
    }
}
