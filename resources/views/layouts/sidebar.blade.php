<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="{{url('dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
      </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link " href="{{route('faskab.fasdes.index')}}">
        <i class="bi bi-grid"></i>
        <span>Daftar Fasilitator Desa</span>
      </a>
    </li><!-- End Fasdes Nav -->
    <li class="nav-item">
      <a class="nav-link " href="{{route('faskab.poktan.index')}}">
        <i class="bi bi-grid"></i>
        <span>Daftar Kelompok Petani</span>
      </a>
    </li><!-- End Fasdes Nav -->

   


    

    

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

  </ul>