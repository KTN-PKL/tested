  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link {{request()->is('dashboard') ? 'collapsed' : ''}}" href="{{url('dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link {{request()->routeIs(['faskab.desa*','faskab.kecamatan*','faskab.lokasi*']) ? 'active' : ''}}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('kecamatan')}}">
            <i class="bi bi-circle"></i><span>Kecamatan</span>
          </a>
        </li>
        <li>
          <a href="{{url('desa')}}">
            <i class="bi bi-circle"></i><span>Desa</span>
          </a>
        </li>
        <li>
          <a href="{{url('lokasi')}}">
            <i class="bi bi-circle"></i><span>Lokasi</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link  {{request()->routeIs(['absensi.harian*','absensi.kegiatan*']) ? 'collapsed' : ''}}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gem"></i><span>Data Absensi</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="icons-bootstrap.html">
            <i class="bi bi-circle"></i><span>Absensi Harian</span>
          </a>
        </li>
        <li>
          <a href="icons-remix.html">
            <i class="bi bi-circle"></i><span>Absensi Kegiatan</span>
          </a>
        </li>
      </ul>
    </li><!-- End Icons Nav -->

  
    <li class="nav-item">
      <a class="nav-link {{request()->routeIs('faskab.fasdes*') ? 'collapsed' : ''}}" href="{{route('faskab.fasdes.index')}}">
        <i class="bi bi-grid"></i>
        <span>Daftar Fasilitator Desa</span>
      </a>
    </li><!-- End Fasdes Nav -->
    <li class="nav-item">
      <a class="nav-link {{request()->routeIs('faskab.poktan*') ? 'collapsed' : ''}}" href="{{route('faskab.poktan.index')}}">
        <i class="bi bi-grid"></i>
        <span>Daftar Kelompok Petani</span>
      </a>
    </li><!-- End Fasdes Nav -->

  

  </ul>