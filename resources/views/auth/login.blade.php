@extends('layouts.auth')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>PPDB</b></a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login untuk mendaftarkan peserta didik</p>
      <hr>
      <form action="{{ route('auth') }}" method="post">
        @csrf

        @error('message')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @enderror

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('username')
            <span id="username-error" class="error invalid-feedback">
              {{ $message }}
            </span>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <span id="password-error" class="error invalid-feedback">
              {{ $message }}
            </span>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
      </form>
      <hr>
      Belum punya akun? <a href="{{ route('register') }}" class="text-center">Registrasi di sini</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection