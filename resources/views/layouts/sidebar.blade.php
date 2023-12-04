<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{ asset('logo_ppdb.png') }}" alt="PPDB Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ env('app_name') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('avatar.webp') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-header">DATA SISWA</li>
        <li class="nav-item">
          <a href="{{ route('siswa.index') }}" class="nav-link {{ $title == 'Calon Siswa' ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Calon Siswa</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('siswa.terverifikasi') }}" class="nav-link {{ $title == 'Siswa Terverifikasi' ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-check"></i>
            <p>Siswa Terverifikasi</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('siswa.diterima') }}" class="nav-link {{ $title == 'Siswa Diterima' ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-plus"></i>
            <p>Siswa Diterima</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('siswa.ditolak') }}" class="nav-link {{ $title == 'Siswa Ditolak' ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-times"></i>
            <p>Siswa Ditolak</p>
          </a>
        </li>

        <li class="nav-header">SETTING</li>
        <li class="nav-item">
          <a href="{{ route('setting.ppdb') }}" class="nav-link {{ $title == 'Setting PPDB' ? 'active' : '' }}">
            <i class="nav-icon fas fa-cogs"></i>
            <p>PPDB</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>