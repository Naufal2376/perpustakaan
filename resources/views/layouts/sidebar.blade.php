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


        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('transaksi.peminjaman') }}">
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
                    <a class="collapse-item" href="{{ route('data.ulasan') }}">Data Ulasan</a>
                    <a class="collapse-item" href="{{ route('data.peminjaman') }}">Data Peminjaman</a>
                    <a class="collapse-item" href="{{ route('data.koleksi') }}">Data Koleksi</a>
                </div>
            </div>
        </li>

        @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i>
                <span>Generate Laporan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('laporan.buku') }}">Laporan Buku</a>
                    <a class="collapse-item" href="{{ route('laporan.kategori') }}">Laporan Kategori</a>
                    <a class="collapse-item" href="{{ route('laporan.peminjaman') }}">Laporan Peminjaman</a>
                    <a class="collapse-item" href="{{ route('laporan.user') }}">Laporan User</a>
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
