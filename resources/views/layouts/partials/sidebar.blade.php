<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">APP SPP</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">APP</a>
    </div>
    <ul class="sidebar-menu">
      <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{ url("dashboard") }}" class="nav-link"><i class="fas fa-fire"></i>
            <span>Dashboard</span></a>
    </li>
    @if (Auth::user()->level == 'admin' || Auth::user()->level == 'petugas')
        <li class="menu-header">transaksi</li>
        <li class="{{ Request::is('pembayaran-spp') ? 'active' : '' }}">
          <a href="{{ url("pembayaran-spp") }}" class="nav-link"><i class="fas fa-money-check"></i>
              <span>Entri Pembayaran</span></a>
      </li>
        <li class="{{ Request::is('status-pembayaran') ? 'active' : '' }}">
          <a href="{{ url("status-pembayaran") }}" class="nav-link"><i class="fas fa-history"></i>
              <span>Status Pembayaran</span></a>
      </li>
        @endif
        @if (Auth::user()->level == 'admin')
        <li class="menu-header">Master Data</li>
        <li class="{{ Request::is('data-siswa') ? 'active' : '' }}">
            <a href="{{ url("data-siswa") }}" class="nav-link"><i class="fas fa-users"></i>
                <span>Data Siswa</span></a>
        </li>
        <li class="{{ Request::is('data-kelas') ? 'active' : '' }}"><a class="nav-link" href="{{ url("data-kelas") }}"><i class="fas fa-school"></i>
                <span>Data Kelas</span></a></li>
        <li class="{{ Request::is('data-petugas') ? 'active' : '' }}"><a class="nav-link" href="{{ url("data-petugas") }}"><i class="fas fa-user-tie"></i>
                <span>Data Petugas</span></a></li>
        <li class="{{ Request::is('data-spp') ? 'active' : '' }}"><a class="nav-link" href="{{ url("data-spp") }}"><i class="fas fa-money-bill"></i>
                <span>Data Spp</span></a></li>
        @endif
        <li class="nav-item dropdown">     
        </li>
        
        </ul>
</aside>
</div>