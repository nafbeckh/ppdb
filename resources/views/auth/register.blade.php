@extends('layouts.auth')


@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>PPDB</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Silahkan registrasi akun terlebih dahulu</p>
      <hr>
      <form action="" method="post">
        @csrf

        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Lengkap">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('name')
            <span id="name-error" class="error invalid-feedback">
              {{ $message }}
            </span>
            @enderror
          </div>
        </div>

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

        <div class="form-group">
          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Konfirmasi Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password_confirmation')
            <span id="password_confirmation-error" class="error invalid-feedback">
              {{ $message }}
            </span>
            @enderror
          </div>
        </div>
        
        <div class="row">
          <div class="col-8"></div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>
      <hr>
      Sudah punya akun? <a href="{{ route('login') }}" class="text-center">Login di sini</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection
