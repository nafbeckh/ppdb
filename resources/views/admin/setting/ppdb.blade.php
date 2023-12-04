@extends('layouts.template')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ $title }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Form {{ $title }}</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <form method="POST" action="{{ route('setting.ppdb.update') }}" id="form" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_sekolah">Nama Sekolah*</label>
                <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control @error('nama_sekolah') is-invalid @enderror" placeholder="Masukkan Nama Sekolah" value="{{ $ppdb->nama_sekolah }}">
                @error('nama_sekolah')
                <span id="nama_sekolah-error" class="error invalid-feedback">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="tgl_buka">Tgl Pendaftaran Dibuka*</label>
                <input type="date" name="tgl_buka" id="tgl_buka" class="form-control @error('tgl_buka') is-invalid @enderror" value="{{ $ppdb->tgl_buka }}">
                @error('tgl_buka')
                <span id="tgl_buka-error" class="error invalid-feedback">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="tgl_tutup">Tgl Pendaftaran Ditutup*</label>
                <input type="date" name="tgl_tutup" id="tgl_tutup" class="form-control @error('tgl_tutup') is-invalid @enderror" value="{{ $ppdb->tgl_tutup }}">
                @error('tgl_tutup')
                <span id="tgl_tutup-error" class="error invalid-feedback">
                  {{ $message }}
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="tgl_pengumuman">Tgl Pengumuman Diterima*</label>
                <input type="date" name="tgl_pengumuman" id="tgl_pengumuman" class="form-control @error('tgl_pengumuman') is-invalid @enderror" value="{{ $ppdb->tgl_pengumuman }}">
                @error('tgl_pengumuman')
                <span id="tgl_pengumuman-error" class="error invalid-feedback">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="logo">Logo*</label>
                <div class="custom-file">
                  <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="logo">
                  <label class="custom-file-label" for="logo">Choose file</label>
                </div>
                @error('logo')
                <span id="logo-error" class="error invalid-feedback">
                  {{ $message }}
                </span>
                @enderror
                <img src="{{ asset($ppdb->logo) }}" alt="Logo Sekolah" width="100px" height="100px">
              </div>           
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </div>
        <!-- /.card-body -->
      </form>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.container-fluid -->
</section>
@endsection

@push('js')
@if(session()->has('success'))
<script>
    Swal.fire(
        'Success',
        "{{ session('success') }}",
        'success'
    )
</script>
@elseif(session()->has('error'))
<script>
    Swal.fire(
        'Failed!',
        "{{ session('error') }}",
        'error'
    )
</script>
@endif
@endpush
