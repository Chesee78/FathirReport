<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Game Management</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" type="image/jpg" href="{{ asset('images/FR.jpg?v=1') }}">
  <link rel="shortcut icon" href="{{ asset('images/FR.jpg') }}" type="image/jpg">
</head>
<body>

<div class="navbar">
  <div class="logo">
  <a href="/login" style="display:flex;align-items:center;gap:8px;text-decoration:none;">
    <img src="{{ asset('images/Kuwel.png') }}" alt="Logo" style="height:40px;width:40px;border-radius:8px;">
    <strong>Fathir Report</strong>
  </a>
  </div>
  <a href="/">Home</a>
  <a href="/game">Game</a>
  <a href="/genre">Genre</a>
  <a href="/update">Update</a>
</div>

@yield('content')

</body>
</html>