<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
      <div class="sidebar-brand-icon">
        <i class="fas fa-book"></i>
      </div>
      <div class="sidebar-brand-text ml-2">Inventaris SMK</div>
    </a>
  
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
  
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
  
    @canany(['isAdmin', 'isOperator'])
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
      Users
    </div>
  
    <!-- Nav Item - User Management -->
    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-users"></i>
        <span>User Management</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">User Berdasarkan Role</h6>
          <a class="collapse-item" href="{{ route('petugas.index') }}">Petugas</a>
          <a class="collapse-item" href="{{ route('pegawai.index') }}">Pegawai</a>
        </div>
      </div>
    </li>
    @endcanany
    
    {{-- @canany(['isAdmin', 'isOperator']) --}}
    <!-- Divider -->
    <hr class="sidebar-divider">
  
    <!-- Heading -->
    <div class="sidebar-heading">
      Pengelolaan Data Logistik
    </div>
  
    <!-- Nav Item - Logistik -->
    <li class="nav-item">
      <a class="nav-link pb-0" href="{{ route('jenis.index') }}">
        <i class="fas fa-fw fa-drafting-compass"></i>
        <span>Jenis Inventaris</span>
      </a>
      <a class="nav-link pb-0" href="{{ route('ruang.index') }}">
        <i class="fas fa-fw fa-building"></i>
        <span>Ruang</span>
      </a>
      <a class="nav-link pb-3" href="{{ route('invent.index') }}">
        <i class="fas fa-fw fa-gem"></i>
        <span>Inventaris</span>
      </a>
    </li>
    {{-- @endcanany --}}

    <!-- Divider -->
    <hr class="sidebar-divider">
  
    <!-- Heading -->
    <div class="sidebar-heading">
      Peminjaman @can('isAdmin') & Laporan @endcan
    </div>
  
    <!-- Nav Item - Peminjaman -->
    <li class="nav-item">
      <a class="nav-link pb-3" href="{{ route('peminjaman.index') }}">
        <i class="fas fa-fw fa-box-open"></i>
        <span>Peminjaman</span>
      </a>
    </li>
    
    @can('isAdmin')
    <!-- Nav Item - Peminjaman -->
    <li class="nav-item">
      <a class="nav-link pt-0" href="{{ route('laporan.index') }}">
        <i class="fas fa-fw fa-list-alt"></i>
        <span>Laporan</span>
      </a>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
      Logout
    </div>
  
    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span>
      </a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
  
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  
  </ul>