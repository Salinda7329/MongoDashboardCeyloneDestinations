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

        {{-- Signups --}}
        <li
            class="sidebar-item has-sub {{ request()->is('admin/manage_destinations') || request()->is('view-approved-signup-daee') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Desitnations</span>
            </a>

            <ul class="submenu ">
                <li
                    class="submenu-item {{ request()->is('admin/manage_destinations') || request()->is('view-new-signup-daee') ? 'active' : '' }}">
                    <a href="/admin/manage_destinations" class="submenu-link">Manage Destinations</a>
                </li>

                <li
                    class="submenu-item {{ request()->is('daeeAdmin/direct-signup-table') || request()->is('direct-signup-table') ? 'active' : '' }}">
                    <a href="/daeeAdmin/direct-signup-table" class="submenu-link">Option2</a>
                </li>
            </ul>
        </li>


    </ul>
</div>
