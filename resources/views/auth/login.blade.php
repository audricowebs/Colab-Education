<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - CoLab-Edu</title>
</head>
<body>
    <h1>Login</h1>

    @if (session('gagal'))
        <p style="color:red">{{ session('gagal') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label>Username</label><br>
            <input type="text" name="username" value="{{ old('username') }}">
            @error('username') <p style="color:red">{{ $message }}</p> @enderror
        </div>
        <div>
            <label>Password</label><br>
            <input type="password" name="password">
            @error('password') <p style="color:red">{{ $message }}</p> @enderror
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
