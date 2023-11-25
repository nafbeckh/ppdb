@extends('layouts.auth')

@section('content')
<div class="page-wrapper">
  <div class="page-content--bge5">
    <div class="container">
      <div class="login-wrap">
        <div class="login-content">
          <div class="login-logo">
            <h2>PPDB</h2>
            Silahkan daftar akun terlebih dahulu
          </div>
          <div class="login-form">
            <form action="" method="post">
              @csrf
              <div class="form-group">
                <label for="name">Nama</label>
                <input class="au-input au-input--full @error('name') is-invalid @enderror" type="name" name="name" id="name" placeholder="Nama">
                @error('name')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="username">Username</label>
                <input class="au-input au-input--full @error('username') is-invalid @enderror" type="username" name="username" id="username" placeholder="Username">
                @error('username')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input class="au-input au-input--full @error('password') is-invalid @enderror" type="password" name="password" id="password"  placeholder="Password">
                @error('password')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input class="au-input au-input--full @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" id="password_confirmation"  placeholder="Konfirmasi Password">
                @error('password_confirmation')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Registrasi</button>
            </form>
            <div class="register-link">
              <p>
                Sudah punya akun?
                <a href="{{ route('login') }}">Login di sini</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
