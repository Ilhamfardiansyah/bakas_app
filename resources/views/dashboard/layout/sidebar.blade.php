    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Warehouse Bakas</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('storage/' . auth()->user()->file) }}" class="rounded" alt="#">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->username }}</a>
                </div>
            </div>

            {{-- search --}}
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
 with font-awesome or any other icon font library -->


                    <li class="nav-header">MENU</li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                            <i class="nav-icon fas fa-solid fa-chart-line"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-box"></i>
                            <p>
                                Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/dashboard/posts"
                                    class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}">
                                    <i class="far fa-solid fa-boxes-stacked"></i>
                                    <p>Inventory</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/posts/create"
                                    class="nav-link {{ Request::is('dashboard/posts/create') ? 'active' : '' }}">
                                    <i class="far fa-solid fa-cart-arrow-down"></i>
                                    <p>Tambah Item Baru</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/edit/index" class="nav-link {{ Request::is('dashboard/edit/index') ? 'active' : '' }}">
                                    <i class="fa-solid fa-box-open"></i>
                                    <p>Update Stok</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashnoard/barcode" class="nav-link {{ Request::is('dashboard/barcode') ? 'active' : '' }}">
                                    <i class="fa-solid fa-print"></i>
                                    <p>Cetak Barcode</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/retur" class="nav-link">
                                    <i class="fa-solid fa-truck-ramp-box"></i>
                                    <p>Retur Barang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-truck"></i>
                            <p>
                                Suplaier
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/dashboard/suplaier/create"
                                    class="nav-link {{ Request::is('dashboard/suplaier/create') ? 'active' : '' }}">
                                    <i class="far fa-solid fa-calendar-plus"></i>
                                    <p>Input suplaier baru</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Input Rak</li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/rak') ? 'active' : '' }}" href="/dashboard/rak">
                            <i class="nav-icon fas fa-solid fa-pallet"></i>
                            <p>
                                Input Data Rak
                            </p>
                        </a>
                    </li> 
                    <li class="nav-header">Stok Opname</li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Pilih Rak
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <form action="/dashboard/posts" method="GET">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rak 1</p>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">MISCELLANEOUS</li>
                    <li class="nav-item">
                        <a href="iframe.html" class="nav-link">
                            <i class="nav-icon fas fa-ellipsis-h"></i>
                            <p>Tabbed IFrame Plugin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="nav-link border-0"><i class="bi bi-door-closed-fill"></i>
                                <p>Log Out</p>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
