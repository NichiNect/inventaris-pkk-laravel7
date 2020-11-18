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
      <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">User Berdasarkan Role</h6>
          <a class="collapse-item" href="{{ route('petugas.index') }}">Petugas</a>
          <a class="collapse-item" href="{{ route('pegawai.index') }}">Pegawai</a>
        </div>
      </div>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider">
  
    <!-- Heading -->
    <div class="sidebar-heading">
      Products
    </div>
  
    <!-- Nav Item - Products -->
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-tshirt"></i>
        <span>Products JerseCommerce</span>
      </a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider">
  
    <!-- Heading -->
    <div class="sidebar-heading">
      Pesanan
    </div>
  
    <!-- Nav Item - Products -->
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-cart-plus"></i>
        <span>Permintaan Pesanan</span>
      </a>
    </li>
  
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