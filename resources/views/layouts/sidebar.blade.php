<aside class="left-sidebar" data-sidebarbg="skin6">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar" data-sidebarbg="skin6">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
          <ul id="sidebarnav">
              <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/dashboard"
                      aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                          class="hide-menu">Dashboard</span></a></li>

              <li class="nav-small-cap"><span class="hide-menu">Components</span></li>
              <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                      aria-expanded="false"><i class="fas fa-utensils"></i><span
                          class="hide-menu">Catering </span></a>
                  <ul aria-expanded="false" class="collapse  first-level base-level-line">
                      <li class="sidebar-item"><a href="{{route('makanan.index')}}" class="sidebar-link"><span
                                  class="hide-menu"> Menu Makanan
                              </span></a>
                      </li>
                      <li class="sidebar-item"><a href="{{route('minuman.index')}}" class="sidebar-link"><span
                                  class="hide-menu"> Menu Minuman
                              </span></a>
                      </li>
                      <li class="sidebar-item"><a href="{{route('pesanan.index')}}" class="sidebar-link"><span
                                  class="hide-menu"> Data Pesanan
                              </span></a>
                      </li>
                  </ul>
              </li>
              <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('kamar.index')}}"
                      aria-expanded="false"><i class="fas fa-bed"></i><span
                          class="hide-menu">Data Kamar </span></a>
              </li>
              @if (auth()->user()->level=="admin")
              <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('pegawai.index')}}"
                  aria-expanded="false"><i class=" fab fa-black-tie"></i><span
                      class="hide-menu">Data Pegawai</span></a>
              </li>
              @endif
              <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('pengunjung.index')}}"
                      aria-expanded="false"><i class=" fas fa-users"></i><span
                          class="hide-menu">Data Pengunjung</span></a>
              </li>
              <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('reservasi.index')}}"
                   aria-expanded="false"><i class=" far fa-file-alt"></i><span
                      class="hide-menu">Data Reservasi</span></a>
              </li>
              @if (auth()->user()->level=="admin")
              <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('transaksi.index')}}"
                  aria-expanded="false"><i class="far fa-money-bill-alt"></i><span
                      class="hide-menu">Data Transaksi</span></a>
              </li>
              @endif
              <li class="nav-small-cap"><span class="hide-menu">Account</span></li>
              <li class="sidebar-item"> <a class="sidebar-link sidebar-link " href="{{route('logout')}}"
                      aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                          class="hide-menu">Logout</span></a>
              </li>
          </ul>
      </nav>
      <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>