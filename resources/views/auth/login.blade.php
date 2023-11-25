@extends('layouts.auth')

@section('content')
<div class="page-wrapper">
  <div class="page-content--bge5">
    <div class="container">
      <div class="login-wrap">
        <div class="login-content">
          <div class="login-logo">
            <h2>PPDB</h2>
            Login untuk mendaftarkan peserta didik baru
          </div>
          <div class="login-form">
            <form action="{{ route('auth') }}" method="post">
              @csrf

              @error('message')
              <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              @enderror

              @if ($message = Session::get('success'))
              <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              @endif
              
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

              <div class="login-checkbox">
                <label>
                  <input type="checkbox" name="remember">Remember Me
                </label>
                <label>
                  <a href="#">Lupa Password?</a>
                </label>
              </div>
              <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Log in</button>
            </form>
            <div class="register-link">
              <p>
                Belum punya akun?
                <a href="{{ route('register') }}">Registrasi di sini</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
