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
          <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $title }}</a></li>
          <li class="breadcrumb-item active">Data Siswa</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
  <div class="container">
    @if($siswa->status == 'Pending')
    <div class="callout callout-danger" style="z-index: 1; top: 0; position: sticky;">
      <h5>Status anda belum resmi terdaftar</h5>
      Lakukan pembayaran biaya pendaftaran
      <a href="#" class="text-primary" id="pay-button" style="text-decoration: none;">di sini</a>.
    </div>

    @push('js')
    <!-- Midtrans -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <script>
      $('#pay-button').click(function() {
        $.post("{{ route('bayar') }}", {
            _token: '{{ csrf_token() }}'
          },
          function(data, status) {
            snap.pay(data.snapToken, {
              onSuccess: function(result) {
                location.reload();
              },

              onPending: function(result) {
                location.reload();
              },

              onError: function(result) {
                location.reload();
              }

            });
            return false;
          });
      })
    </script>
    @endpush
    @endif

    @isset($diterima)
      @if($diterima)
      <div class="callout callout-success" style="z-index: 1; top: 0; position: sticky;">
        <h5>Pengumuman Penerimaan Peserta Didik Baru</h5>
        Selamat, anda telah dinyatakan di terima di sekolah {{ $ppdb->nama_sekolah }}.
      </div>
      @else
      <div class="callout callout-danger" style="z-index: 1; top: 0; position: sticky;">
        <h5>Pengumuman Penerimaan Peserta Didik Baru</h5>
        Mohon maaf, anda dinyatakan tidak diterima di sekolah {{ $ppdb->nama_sekolah }}<Br>
        Tetap semangat dan pantang menyerah.
      </div>
      @endif
    @endisset

    <div class="row">
      <div class="col-lg">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Data Siswa</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-9">
                <div class="row mb-4">
                  <div class="col-sm-3">
                    <p class="mb-0">NISN</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">: {{ $siswa->nisn }}</p>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-sm-3">
                    <p class="mb-0">Nama Lengkap</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">: {{ $siswa->nama }}</p>
                  </div>
                </div>
                
                <div class="row mb-4">
                  <div class="col-sm-3">
                    <p class="mb-0">Tempat, Tanggal Lahir</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">: {{ $siswa->tempat_lahir . ', ' . $siswa->tgl_lahir }}</p>
                  </div>
                </div>
                
                <div class="row mb-4">
                  <div class="col-sm-3">
                    <p class="mb-0">Jenis Kelamin</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">: {{ $siswa->jenis_kelamin }}</p>
                  </div>
                </div>
                
                <div class="row mb-4">
                  <div class="col-sm-3">
                    <p class="mb-0">Alamat</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">: {{ $siswa->alamat }}</p>
                  </div>
                </div>
                
                <div class="row mb-4">
                  <div class="col-sm-3">
                    <p class="mb-0">No. Telepon</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">: {{ $siswa->no_telp }}</p>
                  </div>
                </div>
                
              </div>
              <div class="col-sm">
                <img class="img-pasfoto" src="{{ $siswa->pasfoto != null ? asset('pasfoto') . '/' . $siswa->pasfoto : '' }}" alt="">
              </div>
            </div>
          </div>
        </div><!-- /.card -->

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Data Orang Tua</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-sm-3">
                <p class="mb-0">Nama Lengkap</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">: {{ $siswa->orang_tua->nama }}</p>
              </div>
            </div>
            
            <div class="row mb-4">
              <div class="col-sm-3">
                <p class="mb-0">Pekerjaan</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">: {{ $siswa->orang_tua->pekerjaan }}</p>
              </div>
            </div>
            
            <div class="row mb-4">
              <div class="col-sm-3">
                <p class="mb-0">Alamat</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">: {{ $siswa->orang_tua->alamat }}</p>
              </div>
            </div>
            
            <div class="row mb-4">
              <div class="col-sm-3">
                <p class="mb-0">No. Telepon</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">: {{ $siswa->orang_tua->no_telp }}</p>
              </div>
            </div>
            
          </div>
        </div><!-- /.card -->

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Data Asal Sekolah</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-sm-3">
                <p class="mb-0">Nama Sekolah</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">: {{ $siswa->asal_sekolah->nama_sekolah }}</p>
              </div>
            </div>
            
            <div class="row mb-4">
              <div class="col-sm-3">
                <p class="mb-0">Tahun Lulus</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">: {{ $siswa->asal_sekolah->tahun_lulus }}</p>
              </div>
            </div>
            
            <div class="row mb-4">
              <div class="col-sm-3">
                <p class="mb-0">No. Ijazah</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">: {{ $siswa->asal_sekolah->no_ijazah }}</p>
              </div>
            </div>
            
          </div>
        </div><!-- /.card -->
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection