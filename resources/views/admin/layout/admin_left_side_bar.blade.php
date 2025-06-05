<!-- sidebar-menu.blade.php -->
<div class="sidebar-menu">
    <ul class="menu">

        <li class="sidebar-title">Admin Menu</li>

        <li class="sidebar-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ url('/admin/dashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- Users --}}
        <li
            class="sidebar-item has-sub {{ request()->is('admin/manage_users') || request()->is('view-approved-signup-daee') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Users</span>
            </a>

            <ul class="submenu ">
                <li
                    class="submenu-item {{ request()->is('admin/manage_users') || request()->is('view-new-') ? 'active' : '' }}">
                    <a href="/admin/manage_users" class="submenu-link">Manage Users</a>
                </li>
            </ul>
        </li>

        {{-- Destinations --}}
        <li
            class="sidebar-item has-sub {{ request()->is('admin/manage_destinations') || request()->is('view-approved-signup-daee') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Desitnations</span>
            </a>

            <ul class="submenu ">
                <li
                    class="submenu-item {{ request()->is('admin/manage_destinations') || request()->is('view-new-') ? 'active' : '' }}">
                    <a href="/admin/manage_destinations" class="submenu-link">Manage Destinations</a>
                </li>
            </ul>
        </li>

        {{-- Galleries --}}
        <li
            class="sidebar-item has-sub {{ request()->is('admin/manage_galleries') || request()->is('admin.manage_galleries') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Galleries</span>
            </a>

            <ul class="submenu ">
                <li
                    class="submenu-item {{ request()->is('admin/manage_galleries') || request()->is('view-new-') ? 'active' : '' }}">
                    <a href="/admin/manage_galleries" class="submenu-link">Manage Galleries</a>
                </li>
            </ul>
        </li>


    </ul>
</div>
