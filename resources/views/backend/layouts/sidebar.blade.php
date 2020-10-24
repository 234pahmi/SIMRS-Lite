    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <h4 class="text-center">SIMRS Lite</h4>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->email }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('dashboard') }}" class="d-block">{{ Auth::user()->email }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- Dashboard --}}
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                        </a>
                    </li>
                    @if (Auth::user()->role == 'Admin')
                        <li class="nav-item">
                            <a href="{{ route('pasien.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Pasien
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('today') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                List Pendaftaran hari ini
                            </p>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Dokter')
                        <li class="nav-item">
                            <a href="{{ route('registration') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>
                                Pendaftaran Pasien
                            </p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
                            <i class="nav-icon fas fa-sign-out-alt "></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </nav>
            <!-- /.sidebar-menu -->
        </div>
    </aside>
    <!-- Sidebar user panel (optional) -->

