@extends('layouts.user-template')

@push('css')
<!-- BS Stepper -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/bs-stepper/css/bs-stepper.min.css') }}">
@endpush

@section('content')
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><small>{{ $title }}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Pendaftaran Siswa Baru</a></li>
          <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Formulir Pendaftaran</h3>
          </div>
          <div class="card-body">
            <div class="bs-stepper">
              <div class="bs-stepper-header" role="tablist">
                <div class="step" data-target="#data-siswa">
                  <a href="{{ route('form-siswa') }}" class="step-trigger" role="tab" aria-controls="data-siswa" id="data-siswa-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Data Siswa</span>
                  </a>
                </div>
                <div class="line"></div>
                <div class="step active" data-target="#data-orangtua">
                  <button type="button" class="step-trigger" role="tab" aria-controls="data-orangtua" id="data-orangtua-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Data Orang Tua</span>
                  </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#data-asalsekolah">
                  <a href="{{ route('form-asalsekolah') }}" class="step-trigger" role="tab" aria-controls="data-asalsekolah" id="data-orangtua-trigger">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Data Asal Sekolah</span>
                  </a>
                </div>
              </div>
            </div>
            <form action="" method="post">
              @csrf
              <div id="data-orangtua" class="content" role="tabpanel" aria-labelledby="data-orangtua-trigger">
                <div class="form-group">
                  <label for="nama">Nama Lengkap <small>(Orang tua/wali)</small>*</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $orangTua['nama'] ?? '' }}" placeholder="Masukkan Nama Lengkap">
                  @error('nama')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="pekerjaan">Pekerjaan*</label>
                  <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ $orangTua['pekerjaan'] ?? '' }}" placeholder="Masukkan Pekerjaan">
                  @error('pekerjaan')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat*</label>
                  <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="3">{{ $orangTua['alamat'] ?? '' }}</textarea>
                  @error('alamat')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="no_telp">Nomor Telepon</label>
                  <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ $orangTua['no_telp'] ?? '' }}" placeholder="Masukkan Nomor Telepon">
                  @error('no_telp')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <a href="{{ route('form-siswa') }}" class="btn btn-secondary">Sebelumnya</a>
                <button type="submit" class="btn btn-primary">Selanjutnya</button>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection
