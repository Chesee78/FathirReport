<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaduan</title>
    <link rel="icon" type="image/jpg" href="{{ asset('images/FR.jpg?v=1') }}">
    <link rel="shortcut icon" href="{{ asset('images/FR.jpg') }}" type="image/jpg">
    @vite(['resources/css/app.css'])
</head>
<body>

<div class="header">
    <div class="logo"><img src="{{ asset('images/FR.jpg') }}" alt="FR Logo"></div>
</div>

<div style="padding: 0 30px;">
    <a href="/masyarakat/dashboard" class="btn-kembali">← Kembali</a>
</div>

<div class="container">
    <h2>Keluhan</h2>

    @if(session('success'))
        <p style="color:green; text-align:center;">
            {{ session('success') }}
        </p>
    @endif

    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <textarea name="isi_laporan" placeholder="Isi Keluhan" required></textarea>

        <input type="file" name="foto">

        <button type="submit">Kirim</button>
    </form>
</div>
<br>


</body>
</html>