<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('*dashboard*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-laptop-code"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('banners.index') }}" class="nav-link {{ Request::is('*banners*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-images"></i>
        <p>Banner</p>
    </a>
</li>
<li class="nav-item {{ Request::is('*projects*', '*categories*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('*projects*', '*categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>
            Project
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('categories.index') }}"
                class="nav-link {{ Request::is('*categories*') ? 'active' : '' }}">
                <i class="nav-icon fab fa-ioxhost"></i>
                <p>Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('projects.index') }}"
                class="nav-link {{ Request::is('*projects*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>Project</p>
            </a>
        </li>
    </ul>
</li>
