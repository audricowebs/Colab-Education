<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validateData = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ],[
            //text error yang akan muncul
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Auth::attempt mencocokkan username dan password dengan tabel users
        if (Auth::attempt($validateData)) {
            $request->session()->regenerate();
            // arahkan sesuai role
            if (Auth::user()->role === 'guru') {
                return redirect()->route('guru.beranda')->with('success', 'Berhasil login');
            } else {
                return redirect()->route('murid.beranda')->with('success', 'Berhasil login');
            }
        } else {
            // Jika Auth gagal (username/password salah)
            return redirect()->route('login')->with('error', 'Login gagal, periksa kembali username dan password anda!')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
