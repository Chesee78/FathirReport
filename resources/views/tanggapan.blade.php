<!DOCTYPE html>
<html>
<head>
    <title>Tanggapan</title>
    <link rel="icon" type="image/jpg" href="{{ asset('images/FR.jpg?v=1') }}">
    <link rel="shortcut icon" href="{{ asset('images/FR.jpg') }}" type="image/jpg">
    @vite(['resources/css/app.css'])
</head>
<body>

<div class="header">
    <div class="logo">
        <a href="/admin/dashboard"><img src="{{ asset('images/FR.jpg') }}" alt="FR Logo"></a></div>
</div>

<h2 style="text-align: center; margin-top: 20px;">
    @if($isPetugas)
        Beri Tanggapan
    @else
        Lihat Tanggapan
    @endif
</h2>

<p><b>Isi Laporan:</b> {{ $pengaduan->isi_laporan }}</p>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if($pengaduan->tanggapan->count() > 0)
    <h3>Tanggapan:</h3>
    @foreach($pengaduan->tanggapan as $tanggap)
    <div style="background: #f8f9fa; padding: 15px; margin: 10px 0; border-radius: 8px; border-left: 4px solid #007bff;">
        <p><strong>Dari:</strong> {{ $tanggap->petugas->name }} ({{ ucfirst($tanggap->petugas->role) }})</p>
        <p><strong>Tanggal:</strong> {{ $tanggap->tgl_tanggapan->format('d/m/Y H:i') }}</p>
        <p><strong>Tanggapan:</strong> {{ $tanggap->tanggapan }}</p>
    </div>
    @endforeach
@else
    <p style="color: #666; font-style: italic;">Belum ada tanggapan.</p>
@endif

@if($isPetugas && $pengaduan->status != 'selesai')
<form action="{{ route('tanggapan.store') }}" method="POST">
    @csrf

    <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">

    <textarea name="tanggapan" placeholder="Tulis tanggapan..." required></textarea>

    <button type="submit">Kirim</button>
</form>
@endif

<button type="button" onclick="history.back()" style="margin-top: 15px; padding: 10px 20px; border: none; background: #6c757d; color: white; border-radius: 5px; cursor: pointer;">
    Kembali
</button>

</body>
</html>