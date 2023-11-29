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
                <div class="step" data-target="#data-orangtua">
                  <a href="{{ route('form-orangtua') }}" class="step-trigger" role="tab" aria-controls="data-orangtua" id="data-orangtua-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Data Orang Tua</span>
                  </a>
                </div>
                <div class="line"></div>
                <div class="step active" data-target="#data-asalsekolah">
                  <button type="button" class="step-trigger" role="tab" aria-controls="data-asalsekolah" id="data-orangtua-trigger">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Data Asal Sekolah</span>
                  </button>
                </div>
              </div>
            </div>
            <form action="" method="post">
              @csrf
              <div id="data-asalsekolah" class="content" role="tabpanel" aria-labelledby="data-asalsekolah-trigger">
                <div class="form-group">
                  <label for="nama_sekolah">Nama Sekolah*</label>
                  <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" value="{{ $asalSekolah['nama_sekolah'] ?? '' }}" placeholder="Masukkan Nama Sekolah">
                  @error('nama_sekolah')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tahun_lulus">Tahun Lulus*</label>
                  <input type="text" class="form-control @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus" name="tahun_lulus" value="{{ $asalSekolah['tahun_lulus'] ?? '' }}" placeholder="Masukkan Tahun Lulus">
                  @error('tahun_lulus')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="no_ijazah">Nomor Ijazah</label>
                  <input type="text" class="form-control @error('no_ijazah') is-invalid @enderror" id="no_ijazah" name="no_ijazah" value="{{ $asalSekolah['no_ijazah'] ?? '' }}" placeholder="Masukkan Nomor Ijazah">
                  @error('no_ijazah')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="nilai">Nilai Rata-rata</label>
                  <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai" name="nilai" value="{{ $asalSekolah['nilai'] ?? '' }}" placeholder="Masukkan Nilai Rata-rata">
                  @error('nilai')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <a href="{{ route('form-orangtua') }}" class="btn btn-secondary">Sebelumnya</a>
                <button type="submit" class="btn btn-primary">Daftar</button>
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
