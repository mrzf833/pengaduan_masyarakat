        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>
    
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
    
            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('adminOrPetugas.dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('adminOrPetugas.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>
    
            <!-- Divider -->
            <hr class="sidebar-divider">
    
            @if (auth()->user()->roles->role === 'admin')
                <!-- Heading -->
                <div class="sidebar-heading">
                    Admin
                    </div>
            
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item {{ request()->routeIs('user.index') || request()->routeIs('user.masyarakat.create') || request()->routeIs('user.masyarakat.show') || request()->routeIs('user.petugas.create') || request()->routeIs('user.petugas.show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fas fa-user"></i>
                        <span>Users</span></a>
                    </li>
        
                        <!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item {{ request()->is('generate-laporan*') ? 'active' : ''}}">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <i class="fas fa-desktop"></i>
                            <span>Generate Laporan</span>
                            </a>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Menu</h6>
                                <a class="collapse-item {{ request()->routeIs('generateLaporan.all') ? 'active' : ''}}" href="{{ route('generateLaporan.all') }}">All</a>
                                <a class="collapse-item {{ request()->routeIs('generateLaporan.tolak') ? 'active' : ''}}" href="{{ route('generateLaporan.tolak') }}">Di Tolak</a>
                                <a class="collapse-item {{ request()->routeIs('generateLaporan.proses') ? 'active' : ''}}" href="{{ route('generateLaporan.proses') }}">Di Proses</a>
                                <a class="collapse-item {{ request()->routeIs('generateLaporan.terima') ? 'active' : ''}}" href="{{ route('generateLaporan.terima') }}">Di Terima</a>
                            </div>
                            </div>
                        </li>
            
                    <!-- Divider -->
                    <hr class="sidebar-divider">
            @endif
    
            <!-- Heading -->
            <div class="sidebar-heading">
            Menu
            </div>
    
            <!-- Nav Item - Charts -->
            <li class="nav-item {{ request()->routeIs('adminOrPetugas.tanggapan.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('adminOrPetugas.tanggapan.index') }}">
                <i class="fas fa-book-open"></i>
                <span>Memberi Tanggapan</span></a>
            </li>
    
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
    
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
    
        </ul>
        <!-- End of Sidebar -->