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
            <h5 class="card-title">Some title</h5>

            <p class="card-text">
              Some quick example text.
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
