<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Masyarakat</title>
    @vite(['resources/css/app.css'])
    <link rel="icon" type="image/jpg" href="{{ asset('images/FR.jpg?v=1') }}">
    <link rel="shortcut icon" href="{{ asset('images/FR.jpg') }}" type="image/jpg">
</head>
<body class="masyarakat-dashboard">
<div class="container">
    <div class="header">
        <div class="logo"><img src="{{ asset('images/FR.jpg') }}" alt="FR Logo"></div>
        <h1>Dashboard Masyarakat</h1>
        <p>Selamat datang, {{ auth()->user()->name }}!</p>
    </div>

    <div style="text-align: center;">
        <a href="/pengaduan" class="btn btn-buat">+ Buat Pengaduan</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-logout">Logout</button>
        </form>
    </div>

    <h3>Pengaduan Anda</h3>
    <div class="table-container" style="display: flex; justify-content: center;">
        <table style="margin: 0 auto; width: 90%; max-width: 1000px; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        <tbody>
            @forelse($pengaduan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->tgl_pengaduan->format('d/m/Y') }}</td>
                <td>{{ substr($p->isi_laporan, 0, 50) }}...</td>
                <td>
                    <span class="badge badge-{{ $p->status }}">{{ ucfirst($p->status) }}</span>
                </td>
                <td>
                    @if($p->tanggapan->count() > 0)
                        <a href="/tanggapan/{{ $p->id }}" class="btn" style="padding: 5px 10px; font-size: 12px;">Lihat Tanggapan</a>
                    @else
                        <span style="color: #666; font-size: 12px;">Belum ada tanggapan</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">Anda belum membuat pengaduan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<br>
@include('footer')

</body>
</html>
