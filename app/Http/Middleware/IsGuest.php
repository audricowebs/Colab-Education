<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsGuest
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'guru') {
                return redirect()->route('guru.beranda')->with('error', 'Anda sudah login!');
            } else {
                return redirect()->route('murid.beranda')->with('error', 'Anda sudah login!');
            }
        } else {
            return $next($request);
        }
    }
}
