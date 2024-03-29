 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistem Pakar</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li @class(['nav-item', 'active' => request()->is('dashboard*')])>
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Gejala -->
    <li @class(['nav-item', 'active' => request()->is('gejala*')])>
        <a class="nav-link" href="{{ route('gejala.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Gejala</span></a>
    </li>

    <!-- Nav Item - Penyakit -->
    <li @class(['nav-item', 'active' => request()->is('penyakit*')])>
        <a class="nav-link" href="{{ route('penyakit.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Penyakit</span></a>
    </li>

    <!-- Nav Item - User -->
    <li @class(['nav-item', 'active' => request()->is('user*')])>
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>User</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>