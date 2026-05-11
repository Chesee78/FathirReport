<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Petugas</title>
    <link rel="icon" type="image/jpg" href="{{ asset('images/FR.jpg?v=1') }}">
    <link rel="shortcut icon" href="{{ asset('images/FR.jpg') }}" type="image/jpg">
    @vite(['resources/css/app.css'])
</head>
<body class="petugas-dashboard">

<div class="header">
    <div class="logo"><img src="{{ asset('images/FR.jpg') }}" alt="FR Logo"></div>
    <h2 style="text-align:center;">Dashboard Petugas</h2>
</div>

@if(session('success'))
    <p style="color:green; text-align:center;">{{ session('success') }}</p>
@endif

<div style="text-align:center; margin:20px;">
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" style="padding:8px 15px; background:#dc3545; color:white; border:none; border-radius:5px; cursor:pointer;">Logout</button>
    </form>
</div>

<div class="table-container" style="display: flex; justify-content: center;">
    <table style="margin: 0 auto; width: 90%; max-width: 1000px; border-collapse: collapse;">
        <tr>
            <th>No</th>
            <th>Isi Laporan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

    @foreach($pengaduan as $p)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $p->isi_laporan }}</td>
        <td>{{ $p->status }}</td>
        <td>
            {{-- Tombol ACC --}}
            @if($p->status == 'pending')
                <form action="{{ route('pengaduan.acc', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn acc">ACC</button>
                </form>
            @endif

            {{-- Tombol Tanggapan --}}
            @if($p->status != 'pending')
                <a href="/tanggapan/{{ $p->id }}" class="btn tanggapan">Tanggapi</a>
            @endif
        </td>
    </tr>
    @endforeach

</table>
</div>

</body>
</html>