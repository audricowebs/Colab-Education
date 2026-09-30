<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul') - CoLab-Edu</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
@php
    $menu = [
        ['Beranda', 'beranda', 'beranda'],
        ['Tugas-Tugas', 'tugas.index', 'tugas.*'],
        ['Kelompok Belajar', 'kelompok.index', 'kelompok.*'],
        ['Gallery Karya', 'karya.index', 'karya.*'],
        ['Laporan Pribadi', 'laporan.index', 'laporan.*'],
    ];
    if (auth()->user()->role === 'guru') {
        $menu[] = ['Penilaian', 'penilaian.index', 'penilaian.*'];
    }
@endphp

<div class="header">
    <div class="logo">CoLab-Edu</div>
    <div class="header-judul">@yield('judul')</div>
    <div class="header-kanan">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
        <div class="avatar"></div>
    </div>
</div>

<div class="wrapper">
    <div class="sidebar">
        <div>
            <div class="menu-label">☰ MENU</div>
            <div class="menu">
                @foreach ($menu as [$nama, $rute, $pola])
                    <a href="{{ Route::has($rute) ? route($rute) : '#' }}"
                       class="{{ request()->routeIs($pola) ? 'aktif' : '' }}">{{ $nama }}</a>
                @endforeach
            </div>
        </div>
        <div class="sidebar-bawah">
            <b>Selamat Datang</b>
            {{ auth()->user()->nama_lengkap }}
        </div>
    </div>

    <div class="konten">
        @if (session('error')) <div class="alert-error">{{ session('error') }}</div> @endif
        @if (session('sukses')) <div class="alert-sukses">{{ session('sukses') }}</div> @endif
        @yield('isi')
    </div>
</div>
</body>
</html>
