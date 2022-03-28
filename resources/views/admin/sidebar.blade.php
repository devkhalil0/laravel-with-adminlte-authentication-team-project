  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('backend/images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Laravel - Admin</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!--\\ dashboard // -->
            <x-single-li route="{{ route('admin.dashboard') }}" activeClass="{{ (request()->routeIs('admin.dashboard')) ? 'active' : '' }}" title="Dashboard" />
            <x-single-li route="{{ route('admin.database.index') }}" activeClass="{{ (request()->routeIs('admin.dashboard')) ? 'active' : '' }}" title="Database-backup" />
            <!--\\ Widgets // -->
            <x-single-li route="#" activeClass="" title="Widgets">
                    <span class='right badge badge-danger'>New</span>
            </x-single-li>
            <!--\\ User & Role Dropdown // -->
            <x-dropdown-li
                    dropdownActive="
                            {{ (request()->routeIs('admin.users*')) || (request()->routeIs('admin.roles*')) ? 'menu-is-opening menu-open' : '' }}"
                    title="User & Role"
                    dropdownAmount="2">
                    <x-dropdown-li-single route="{{ route('admin.users.index') }}" activeClass="{{ (request()->routeIs('admin.users.index')) ? 'active' : '' }}" title="All Users" />
                    <x-dropdown-li-single route="{{ route('admin.roles.index') }}" activeClass="{{ (request()->routeIs('admin.roles.index')) ? 'active' : '' }}" title="All Roles" />
            </x-dropdown-li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
