<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
@vite(['resources/css/app.css'])
<link rel="icon" type="image/jpg" href="{{ asset('images/FR.jpg?v=1') }}">
<link rel="shortcut icon" href="{{ asset('images/FR.jpg') }}" type="image/jpg">
</head>
<body>
<div class="auth">
  <div class="box">
    <div class="left">
      <h2>Register</h2>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Nama Lengkap" required value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
        <input type="text" name="nik" placeholder="NIK" required value="{{ old('nik') }}">
        <select name="role" required>
          <option value="">Pilih Role</option>
          <option value="masyarakat">Masyarakat</option>
        </select>
        <div class="password-group">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <span class="toggle-password" onclick="togglePassword('password')">👁️</span>
        </div>
        <div class="password-group">
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
          <span class="toggle-password" onclick="togglePassword('password_confirmation')">👁️</span>
        </div>
        <button type="submit">Register</button>
        
        @if($errors->any())
          <div class="error">
            @foreach($errors->all() as $error)
              {{ $error }}<br>
            @endforeach
          </div>
        @endif

        <div class="links">
          Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </div>
      </form>
    </div>
    <div class="right">
      <div class="logo"><img src="{{ asset('images/FR.jpg') }}" alt="FR Logo"></div>
      <br>
      <p>Buat Akun<br><b>Fathir Report</b></p>
    </div>
  </div>
</div>

<script>
function togglePassword(fieldId) {
  const field = document.getElementById(fieldId);
  if (field.type === 'password') {
    field.type = 'text';
  } else {
    field.type = 'password';
  }
}
</script>

</body>
</html>