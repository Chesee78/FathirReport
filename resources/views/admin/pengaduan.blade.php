<!DOCTYPE html>
<html>
<head>
    <title>Data Pengaduan</title>
    <link rel="icon" type="image/jpg" href="{{ asset('images/FR.jpg?v=1') }}">
    <link rel="shortcut icon" href="{{ asset('images/FR.jpg') }}" type="image/jpg">
    @vite(['resources/css/app.css'])
</head>
<body class="admin-table">

<div class="header">
    <div class="logo">
        <a href="/admin/dashboard"><img src="{{ asset('images/FR.jpg') }}" alt="FR Logo"></a></div>
    <h2>Data Pengaduan</h2>
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
            @if($p->status != 'selesai')
                <a href="/tanggapan/{{ $p->id }}" class="btn">Tanggapi</a>
            @else
                <span>Selesai</span>
            @endif
        </td>
    </tr>
    @endforeach

</table>
</div>

<button type="button" onclick="history.back()" class="btn-back" style="display: block; margin: 20px auto 0;">
    Kembali
</button>

</body>
</html>