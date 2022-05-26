<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('*dashboard*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('banners.index') }}" class="nav-link {{ Request::is('*banners*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-images"></i>
        <p>Banner</p>
    </a>
</li>
