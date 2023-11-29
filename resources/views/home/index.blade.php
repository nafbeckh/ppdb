@extends('layouts.user-template')

@section('content')
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><small>Data Siswa</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pengumuman</li>
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
            <!-- Kuota Sekolah -->
            <h5 class="card-title mb-3 p-1 text-center text-dark">
              <span class="h6 text-dark">Kuota Sekolah</span>
            </h5>
            <p class="card-text">
              <span class="">1. </span> Pengumuman kuota sekolah :
              <span class="badge badge-secondary font-italic">28 Desember 2023</span>
            </p>
            <p class="card-text">
              <span class="">2. </span> Penutupan Masa Sanggah kuota sekolah :
              <span class="badge badge-secondary font-italic">17 Januari 2023</span>
            </p>

            <!-- Pembuatan Akun PDBD -->
            <h5 class="card-title mb-3 mt-3 p-1 text-center text-dark">
              <span class="h6 text-dark">Pembuatan Akun PDBD</span>
            </h5>
            <p class="card-text">
              <span class="">1. </span> Registrasi Akun SNPMB siswa :
              <span class="badge badge-secondary font-italic">09 Januari 2023</span><strong> - </strong>
              <span class="badge badge-secondary font-italic">15 Februari 2023</span>
            </p>

            <!-- Pengumuman Penerimaan PPDB -->
            <h5 class="card-title mb-3 mt-3 p-1 text-center text-dark">
              <span class="h6 text-dark">Pengumuman Penerimaan PPDB</span>
            </h5>
            <p class="card-text">
              <span class="">1. </span> Pengumuman Penerimaan PPDB :
              <span class="badge badge-secondary font-italic">09 Januari 2023</span>
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