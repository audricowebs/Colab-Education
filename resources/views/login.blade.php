<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CoLab-Edu</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="header">
        <div class="logo">CoLab-Edu</div>
    </div>

    <div class="login-wrap">
        <div class="login-kiri">
            <div class="logo-besar">CoLab-Edu</div>
            <h3 class="serif">Colab-edu memudahkan pengerjaan Guru dan Murid</h3>
            <p class="serif">CoLab-Edu menyediakan sistem manajemen tugas mandiri dan kelompok,
                galeri portofolio siswa, serta rekapitulasi nilai untuk pembelajaran yang
                terstruktur, transparan, dan kolaboratif.</p>
        </div>

        <form action="{{ route('login.store') }}" method="POST" class="kartu-login">
            @csrf
            <h3 class="serif">Login</h3>

            <!-- Session::get mengambil session dari with controller -->
            @if (Session::get('success'))
                <div class="alert-sukses">{{ Session::get('success') }}</div>
            @endif
            @if (Session::get('error'))
                <div class="alert-error">{{ Session::get('error') }}</div>
            @endif

            <label>Username</label>
            <input type="text" name="username" value="{{ old('username') }}" autocomplete="off">
            @error('username')
                <small class="pesan-error">{{ $message }}</small>
            @enderror

            <label>Password</label>
            <input type="password" name="password">
            @error('password')
                <small class="pesan-error">{{ $message }}</small>
            @enderror

            <button type="submit" class="btn-merah">Login</button>
        </form>
    </div>
</body>
</html>
