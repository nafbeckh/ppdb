@extends('layouts.template')

@push('css')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

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

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data {{ $title }}</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form method="POST" action="" id="formDeleteBatch">
          <table id="tableData" class="table table-sm table-hover table-bordered">
            <thead>
              <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No. Telp</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</section>
<!-- /.content -->
@endsection

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<script>
  $(document).ready(function() {
    var table = $('#tableData').DataTable({
      processing: true,
      serverSide: true,
      rowId: 'id',
      ajax: "{{ route('siswa.diterima') }}",
      lengthChange: false,
      'stateSave': false,
      "oLanguage": {
        "oPaginate": {
          "sPrevious": '<i class="fas fa-arrow-alt-circle-left"></i>',
          "sNext": '<i class="fas fa-arrow-alt-circle-right"></i>'
        },
        "sInfo": "Showing page _PAGE_ of _PAGES_",
        "sSearch": '<i class="fas fa-search"></i>',
        "sSearchPlaceholder": "Search...",
        "sLengthMenu": "Results :  _MENU_",
      },
      "lengthMenu": [
        [10, 50, 100, 1000],
        ['10 rows', '50 rows', '100 rows', '1000 rows']
      ],
      "pageLength": 10,
      "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
      autoWidth: false,
      order: [
        [0, "asc"]
      ],
      'select': {
        'style': 'multi'
      },
      columns: [
        {
          data: 'nisn'
        },
        {
          data: 'nama',
        },
        {
          data: 'tempat_lahir',
        },
        {
          data: 'tgl_lahir',
        },
        {
          data: 'jenis_kelamin',
        },
        {
          data: 'alamat',
        },
        {
          data: 'no_telp',
        }
      ],
      "buttons": [{
        className: 'btn btn-sm btn-primary',
        extend: "pageLength",
        attr: {
          'data-toggle': 'tooltip',
          'title': 'Page Length'
        }
      }],
      "stripeClasses": [],
      initComplete: function() {
        $('#tableData').DataTable().buttons().container().appendTo('#tableData_wrapper .col-md-6:eq(0)');
      }
    });
  });
</script>
@endpush