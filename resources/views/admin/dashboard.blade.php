<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="icon" type="image/jpg" href="{{ asset('images/FR.jpg?v=1') }}">
    <link rel="shortcut icon" href="{{ asset('images/FR.jpg') }}" type="image/jpg">
    @vite(['resources/css/app.css'])
</head>
<body>
<div class="container">
    <div class="header">
        <div class="logo"><img src="{{ asset('images/FR.jpg') }}" alt="FR Logo"></div>
        <h1>Dashboard Admin</h1>
        <p>Selamat datang, {{ auth()->user()->name }}!</p>
    </div>

    <div style="text-align: center;">
        <a href="/admin/pengaduan" class="btn">Kelola Pengaduan</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-logout">Logout</button>
        </form>
    </div>

    <div class="cards">
        <div class="card">
            <h3>Total Pengaduan</h3>
            <p>{{ $total_pengaduan ?? 0 }}</p>
        </div>
        <div class="card">
            <h3>Pending</h3>
            <p>{{ $pending ?? 0 }}</p>
        </div>
        <div class="card">
            <h3>Disetujui</h3>
            <p>{{ $disetujui ?? 0 }}</p>
        </div>
        <div class="card">
            <h3>Selesai</h3>
            <p>{{ $selesai ?? 0 }}</p>
        </div>
    </div>
</div>
<br>

</body>
</html>
