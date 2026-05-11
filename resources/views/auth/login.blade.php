<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
@vite(['resources/css/app.css'])
<link rel="icon" type="image/jpg" href="{{ asset('images/FR.jpg?v=1') }}">
<link rel="shortcut icon" href="{{ asset('images/FR.jpg') }}" type="image/jpg">
</head>
<body>
<div class="auth">
  <div class="box">
    <div class="left">
      <h2>Login</h2>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        @if($errors->any())
          <div style="color:#ef4444;margin-top:16px;">
            {{ $errors->first() }}
          </div>
        @endif

        <div class="links">
          Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>
      </form>
    </div>
    <div class="right">
      <div class="logo"><img src="{{ asset('images/FR.jpg') }}" alt="FR Logo"></div>
      <br>
      <p>Selamat datang di<br><b>Fathir Report</b></p>
    </div>
  </div>
</div>

</body>
</html>
