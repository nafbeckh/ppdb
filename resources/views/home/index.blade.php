@extends('layouts.user-template')

@section('content')
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><small>{{ $title }}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <h5 class="card-title mb-3 p-1 text-center text-dark">
              <span class="h6 text-dark">Periode Pendaftaran PPDB</span>
            </h5>

            <p class="card-text">
              <span class="">1. </span> Pendaftaran dibuka:
              <span class="badge badge-secondary font-italic">{{ $ppdb->tgl_buka }}</span>
            </p>

            <p class="card-text">
              <span class="">2. </span> Pendaftaran ditutup:
              <span class="badge badge-secondary font-italic">{{ $ppdb->tgl_tutup }}</span>
            </p>

            <p class="card-text">
              <span class="">3. </span> Pengumuman PPDB:
              <span class="badge badge-secondary font-italic">{{ $ppdb->tgl_pengumuman }}</span>
            </p>
            <a href="{{ route('form-siswa') }}" class="btn btn-primary">Daftar Sekarang</a>
          </div>
        </div><!-- /.card -->
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection