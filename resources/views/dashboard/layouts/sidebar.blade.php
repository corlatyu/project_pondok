<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li class="nav-item">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-school" style="font-size: 24px;"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Al-AKHYAR</div>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::routeIs('admin.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Data Santri -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('santri*', 'cards*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseDataSantri"
            aria-expanded="true" aria-controls="collapseDataSantri">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Santri</span>
        </a>
        <div id="collapseDataSantri" class="collapse" aria-labelledby="headingDataSantri"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item {{ Request::routeIs('santri.index') ? 'active' : '' }}" href="{{ route('santri.index') }}">Data Santri</a>
                <a class="collapse-item {{ Request::routeIs('santri.cards') ? 'active' : '' }}" href="cards.html">Profile Santri</a>
            </div>
        </div>
    </li> --}}

    <!-- Navigasi Sidebar -->
<li class="nav-item">
    <a class="nav-link collapsed {{ Request::is('santri*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseDataSantri"
        aria-expanded="true" aria-controls="collapseDataSantri">
        <i class="fas fa-fw fa-user"></i>
        <span>Data Santri</span>
    </a>
    <div id="collapseDataSantri" class="collapse {{ Request::is('santri*') ? 'show' : '' }}" aria-labelledby="headingDataSantri"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item {{ Request::routeIs('santri.index') ? 'active' : '' }}" href="{{ route('santri.index') }}">Data Santri</a>
            <a class="collapse-item {{ Request::routeIs('santri.profile') ? 'active' : '' }}" href="{{ route('santri.profile', ['id' => 1]) }}">Profile Santri</a>
        </div>
    </div>
</li>


        {{-- <!-- Data Santri -->
        <li class="nav-item {{ Request::routeIs('santri.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('santri.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Santri</span>
            </a>
        </li> --}}

    <!-- Data Guru -->
    <li class="nav-item {{ Request::routeIs('guru.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('guru.index') }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Data Guru</span>
        </a>
    </li>

    <!-- Card Santri -->
  <!-- <li class="nav-item {{ Request::routeIs('santri.card.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('santri.card.index') }}">
            <i class="fas fa-id-card"></i>
            <span>Cetak Card Santri</span>
        </a>
    </li>//

    <!-- Data Lembaga -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('data-lembaga*', 'profile-lembaga*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseDataLembaga"
            aria-expanded="true" aria-controls="collapseDataLembaga">
            <i class="fas fa-fw fa-building"></i>
            <span>Edit Profile</span>
        </a>
        <div id="collapseDataLembaga" class="collapse" aria-labelledby="headingDataLembaga"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item {{ Request::routeIs('data-lembaga') ? 'active' : '' }}" href="buttons.html">Data Lembaga</a>
                <a class="collapse-item {{ Request::routeIs('profile-lembaga') ? 'active' : '' }}" href="cards.html">Profile Lembaga</a>
            </div>
        </div>
    </li> --}}

    <!-- Dispensasi -->
    <li class="nav-item {{ Request::routeIs('dispensasi.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dispensasi.index') }}">
            <i class="fas fa-newspaper"></i>
            <span>Perizinan</span>
        </a>
    </li>

    <!-- Pengumuman -->
    <li class="nav-item {{ Request::routeIs('schedules.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('schedules.index') }}">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Pengumuman</span>
        </a>
    </li>

    <!-- Dokumentasi -->
    <li class="nav-item {{ Request::routeIs('dokumentasi.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dokumentasi.index') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Dokumentasi</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
