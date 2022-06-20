 <!-- Sidebar Menu -->
 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-fw fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/profil" class="nav-link">
              <i class="nav-icon fas fa-fw fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
          @if(auth()->user()->role == 'staf')
          <li class="nav-item">
            <a href="/presensi" class="nav-link">
              <i class="nav-icon fas fa-fw fa-share"></i>
              <p>
                Presensi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/ijin" class="nav-link">
              <i class="nav-icon fas fa-fw fa-lock"></i>
              <p>
                Perijinan
              </p>
            </a>
          </li>
          @endif
          @if(auth()->user()->role == 'admin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-fw fa-file"></i>
              <p>
              Rekapitulasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/presensi/laporan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Presensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/perijinan/laporan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Perijinan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/staff/laporan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff Laporan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/riwayat/laporan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Laporan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li><a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-10 text-danger"></i> 
              {{ __('Logout') }}
          </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->