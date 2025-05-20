<!-- sidebar-menu.blade.php -->
<div class="sidebar-menu">
    <ul class="menu">

        <li class="sidebar-title">User Menu</li>

        <li class="sidebar-item {{ request()->is('user/dashboard') ? 'active' : '' }}">
            <a href="{{ url('/user/dashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- Signups --}}
        <li
            class="sidebar-item has-sub {{ request()->is('daeeAdmin/new-signup-table') || request()->is('daeeAdmin/direct-signup-table') || request()->is('view-new-signup-daee') || request()->is('daeeAdmin/approved-signup-table') || request()->is('daeeAdmin/signup-status-table') || request()->is('daeeAdmin/approved-signups-report') || request()->is('view-approved-signup-daee') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Functions</span>
            </a>

            <ul class="submenu ">
                <li
                    class="submenu-item {{ request()->is('daeeAdmin/new-signup-table') || request()->is('view-new-signup-daee') ? 'active' : '' }}">
                    <a href="/daeeAdmin/new-signup-table" class="submenu-link">Option1</a>
                </li>

                <li
                    class="submenu-item {{ request()->is('daeeAdmin/direct-signup-table') || request()->is('direct-signup-table') ? 'active' : '' }}">
                    <a href="/daeeAdmin/direct-signup-table" class="submenu-link">Option2</a>
                </li>
            </ul>
        </li>


    </ul>
</div>
