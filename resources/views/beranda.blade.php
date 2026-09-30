@extends('layouts.app')

@section('judul', 'Beranda')

@section('isi')
    <h1 class="judul-halaman">Selamat Datang, {{ auth()->user()->nama_lengkap }}</h1>
    <p class="sub-judul">Lihat ringkasan pendidikan, progres, dan aktivitas terbaru hari ini.</p>

    <div class="kartu-wrap">
        @foreach ($kartu as [$label, $angka, $ket])
            <div class="kartu">
                <small>{{ $label }}</small>
                <div class="angka">{{ $angka }}</div>
                <div class="ket">{{ $ket }}</div>
            </div>
        @endforeach
    </div>

    <table class="jadwal">
        <thead>
            <tr>
                <th>Jam</th>
                @foreach ($hari as $h) <th>{{ $h }}</th> @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($slots as $s)
                <tr>
                    <td>{{ $s }}</td>
                    @foreach ($hari as $h)
                        <td class="{{ in_array($h, ['Sabtu', 'Minggu']) ? 'libur' : '' }}">
                            {{ $grid[$s][$h] ?? '' }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
