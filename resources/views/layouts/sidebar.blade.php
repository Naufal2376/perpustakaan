<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Apperdig</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Peminjaman
    </div> --}}


    @if (auth()->user()->level == 'admin')
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-check"></i>
                <span>Transaksi Peminjaman</span>
            </a>
        </li>

            <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-fw fa-folder"></i>
                <span>Data Master</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('data.user') }}">Data User</a>
                    <a class="collapse-item" href="{{ route('data.buku') }}">Data Buku</a>
                    <a class="collapse-item" href="{{ route('data.kategori') }}">Data Kategori Buku</a>
                    <a class="collapse-item" href="{{ route('data.laporan') }}">Data Laporan</a>
                    <a class="collapse-item" href="">Data Peminjaman</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i>
                <span>Generate Laporan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="">Laporan Buku</a>
                    <a class="collapse-item" href="">Laporan Kategori</a>
                    <a class="collapse-item" href="">Laporan Peminjaman</a>
                </div>
            </div>
        </li>
    @elseif (auth()->user()->level == 'petugas')
        <div class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-check"></i>
                <span>Transaksi Peminjaman</span>
            </a>
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-fw fa-folder"></i>
                <span>Data Epic</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('data.user') }}">Data User</a>
                    <a class="collapse-item" href="{{ route('data.buku') }}">Data Buku</a>
                    <a class="collapse-item" href="{{ route('data.kategori') }}">Data Kategori Buku</a>
                    <a class="collapse-item" href="{{ route('data.laporan') }}">Data Laporan</a>
                    <a class="collapse-item" href="">Data Peminjaman</a>
                </div>
            </div>
        </li>
    @elseif (auth()->user()->level == 'user')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-fw fa-folder"></i>
                <span>Data Mytic</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('data.user') }}">Data User</a>
                    <a class="collapse-item" href="{{ route('data.buku') }}">Data Buku</a>
                    <a class="collapse-item" href="{{ route('data.kategori') }}">Data Kategori Buku</a>
                    <a class="collapse-item" href="{{ route('data.laporan') }}">Data Laporan</a>
                    <a class="collapse-item" href="">Data Peminjaman</a>
                </div>
            </div>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
            <span>Logout</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
