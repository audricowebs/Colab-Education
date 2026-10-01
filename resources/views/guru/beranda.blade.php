<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - CoLab-Edu</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="header">
        <div class="logo">CoLab-Edu</div>
        <div class="header-judul">Beranda</div>
        <div class="header-kanan">
            <a href="{{ route('logout') }}" class="btn-logout">Logout</a>
            <div class="avatar"></div>
        </div>
    </div>

    <div class="wrapper">
        <div class="sidebar">
            <div>
                <div class="menu-label">☰ MENU</div>
                <div class="menu">
                    <a href="{{ route('guru.beranda') }}" class="aktif">Beranda</a>
                    <a href="#">Tugas-Tugas</a>
                    <a href="#">Kelompok Belajar</a>
                    <a href="#">Gallery Karya</a>
                    <a href="#">Laporan Pribadi</a>
                    <a href="#">Penilaian</a>
                </div>
            </div>
            <div class="sidebar-bawah">
                <b>Selamat Datang</b>
                {{ Auth::user()->nama_lengkap }}
            </div>
        </div>

        <div class="konten">
            @if (Session::get('success'))
                <div class="alert-sukses">{{ Session::get('success') }}</div>
            @endif
            @if (Session::get('error'))
                <div class="alert-error">{{ Session::get('error') }}</div>
            @endif

            <h1 class="judul-halaman">Selamat Datang, {{ Auth::user()->nama_lengkap }}</h1>
            <p class="sub-judul">Lihat ringkasan pendidikan, progres, dan aktivitas terbaru hari ini.</p>

            <!-- 4 kartu ringkasan -->
            <div class="kartu-wrap">
                <div class="kartu">
                    <small>Tugas Dibuat</small>
                    <div class="angka">{{ $tugasDibuat }}</div>
                    <div class="ket">Tugas yang anda buat</div>
                </div>
                <div class="kartu">
                    <small>Tugas Dinilai</small>
                    <div class="angka">{{ $tugasDinilai }}</div>
                    <div class="ket">Pengumpulan yang sudah dinilai</div>
                </div>
                <div class="kartu">
                    <small>Kelompok Dibuat</small>
                    <div class="angka">{{ $kelompokDibuat }}</div>
                    <div class="ket">kelompok yang anda buat</div>
                </div>
                <div class="kartu">
                    <small>Rekap Nilai</small>
                    <div class="angka">{{ $rekap }}</div>
                    <div class="ket">Rata-rata nilai murid</div>
                </div>
            </div>

            <!-- jadwal: tiap baris = sesi ke-1, ke-2, ke-3 ; [0] [1] [2] = urutan jam -->
            <table class="jadwal">
                <tr>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                    <th>Sabtu</th>
                    <th>Minggu</th>
                </tr>
                <tr>
                    <td>{{ $senin[0]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $selasa[0]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $rabu[0]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $kamis[0]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $jumat[0]->mapel->nama_mapel ?? '' }}</td>
                    <td rowspan="3" class="libur"></td>
                    <td rowspan="3" class="libur"></td>
                </tr>
                <tr>
                    <td>{{ $senin[1]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $selasa[1]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $rabu[1]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $kamis[1]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $jumat[1]->mapel->nama_mapel ?? '' }}</td>
                </tr>
                <tr>
                    <td>{{ $senin[2]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $selasa[2]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $rabu[2]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $kamis[2]->mapel->nama_mapel ?? '' }}</td>
                    <td>{{ $jumat[2]->mapel->nama_mapel ?? '' }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
