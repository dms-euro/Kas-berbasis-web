<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo w-100 d-flex justify-content-center">
              <img src="{{ asset('assets/images/logo/RagilKuning.png') }}" alt="Ragilkuning" style="max-width: 120px; height: auto;">
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item {{ ($active ?? '') == 'dashboard' ? 'active' : '' }}">
                <a href="/dashboard" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub ">
                <a href="#" class='sidebar-link'>
                    <i class='iconly-boldWallet'></i>
                    <span>Keuangan</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item {{ $active == 'kas' ? 'active' : '' }} ">
                        <a href="{{ route('kas.index') }}" class="sidebar-link">
                            <i class="iconly-boldSwap"></i>
                            <span>Rekap Kas</span>
                        </a>
                    </li>
                    <li class="submenu-item {{ $active == 'transaksi' ? 'active' : '' }}  ">
                        <a href="{{ route('keuangan.index') }}" class="sidebar-link">
                            <i class="iconly-boldActivity"></i>
                            <span>Transaksi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item {{ ($active ?? '') == 'user' ? 'active' : '' }} ">
                <a href="{{ route('login.create') }}" class='sidebar-link'>
                    <i class="bi bi-people-fill"></i>
                    <span>Anggota</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="{{ route('login.logout') }}" class='sidebar-link'>
                    <i class="bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
