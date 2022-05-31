<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('template/dist/img/logoz.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">QUEEN Z</span>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a class="nav-link" href="{{route('kamar.index')}}">
                <i class="nav-icon fas fa-male"></i>
                  <span class="menu-title">Data Pengunjung</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('kamar.index')}}">
                <i class="nav-icon fas fa-user-tie"></i>
                  <span class="menu-title">Data Pegawai</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('kamar.index')}}">
              <i class="nav-icon 	fa fa-bed"></i>
                <span class="menu-title">Data Kamar</span>
              </a>
              </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-concierge-bell"></i>
              <p>
                Catering
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('makanan.index')}}" class="nav-link">
                  <i class="nav-icon material-icons">&#xe561;</i>
                  <p>Data Makanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('minuman.index')}}" class="nav-link">
                  <i class="fas fa-coffee nav-icon"></i>
                  <p>Data Minuman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-receipt nav-icon"></i>
                  <p>Data Pesanan</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
              <a class="nav-link" href="{{route('kamar.index')}}">
                  <i class="nav-icon fas fa-book-open"></i>
                    <span class="menu-title">Data Reservasi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('kamar.index')}}">
                  <i class="nav-icon fas fa-money-bill-wave"></i>
                    <span class="menu-title">Data Transaksi</span>
              </a>
            </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>