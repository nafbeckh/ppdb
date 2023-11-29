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
                <div class="step active" data-target="#data-siswa">
                  <button type="button" class="step-trigger" role="tab" aria-controls="data-siswa" id="data-siswa-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Data Siswa</span>
                  </button>
                </div>
                <div class="line"></div>
                <div class="step">
                  <button type="button" class="step-trigger" role="tab">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Data Orang Tua</span>
                  </button>
                </div>
                <div class="line"></div>
                <div class="step">
                  <button type="button" class="step-trigger" role="tab">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Data Asal Sekolah</span>
                  </button>
                </div>
              </div>
            </div>
            <hr>
            <form action="" method="post">
              @csrf
              <div id="data-siswa" class="content" role="tabpanel" aria-labelledby="data-siswa-trigger">
                <div class="form-group">
                  <label for="nisn">NISN*</label>
                  <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ $siswa['nisn'] ?? '' }}" placeholder="Masukkan NISN">
                  @error('nisn')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="nama">Nama Lengkap*</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $siswa['nama'] ?? '' }}" placeholder="Masukkan Nama Lengkap">
                  @error('nama')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir*</label>
                  <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ $siswa['tempat_lahir'] ?? '' }}" placeholder="Masukkan Tempat Lahir">
                  @error('tempat_lahir')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tgl_lahir">Tanggal Lahir*</label>
                  <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ $siswa['tgl_lahir'] ?? '' }}">
                  @error('tgl_lahir')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin*</label>
                  <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                    <option value="">-- Pilih -- </option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  @error('jenis_kelamin')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat*</label>
                  <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="3">{{ $siswa['alamat'] ?? '' }}</textarea>
                  @error('alamat')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="no_telp">Nomor Telepon</label>
                  <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ $siswa['no_telp'] ?? '' }}" placeholder="Masukkan Nomor Telepon">
                  @error('no_telp')
                  <span id="username-error" class="error invalid-feedback">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary" onclick="stepper.next()">Selanjutnya</button>
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

<div class="modal fade" id="modal-default" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Panduan Pendaftaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
          <li>Calon peserta didik baru menyiapkan <strong>BERKAS PERSYARATAN~</strong></li>
        </ul>
        <ul>
          <li>Mempersiapkan kelengkapan berkas sesuai dengan ketentuan</li>
        </ul>
        <ul>
          <li>Mempersiapkan kelengkapan berkas sesuai dengan ketentuan</li>
        </ul>
        <ul>
          <li>Calon Siswa datang ke sekolah tujuan untuk melakukan <strong>VERIVIKASI PENDAFTARAN</strong> dengan membawa Tanda Bukti Pengajuan Pendaftaran dan kelengkapan Berkas.</li>
        </ul>
        <ul>
          <li>Calon Siswa Menyiapkan Dokumen <strong>Kartu Keluarga (KK), KTP Orang Tua/Wali, dan Foto 3x4</strong></li>
        </ul>
        <ul>
          <li>Calon Siswa melihat <strong>PENGUMUMAN HASIL AKHIR</strong></li>
        </ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
      </div>
    </div>
  </div>
</div>

@endsection
@push('js')
<script>
  $('#modal-default').modal('show');
  $('#jenis_kelamin').val(`{{ $siswa['jenis_kelamin'] ?? '' }}`)
</script>
@endpush