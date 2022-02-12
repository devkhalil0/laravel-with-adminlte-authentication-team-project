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
            <x-single-li route="{{ route('admin.dashboard') }}" activeClass="{{ (request()->is('admin.dashboard')) ? 'active' : '' }}" title="Dashboard" />
            <!--\\ Widgets // -->
            <x-single-li route="#" activeClass="" title="Widgets">
                    <span class='right badge badge-danger'>New</span>
            </x-single-li>
            <!--\\ Demo Dropdown // -->
            <x-dropdown-li
                    dropdownActive="#"
                    title="Demo Pages"
                    dropdownAmount="2">
                    <x-dropdown-li-single route="#" activeClass="#" title="Page 1" />
                    <x-dropdown-li-single route="#" activeClass="#" title="Page 2" />
            </x-dropdown-li>
            <!--\\ User & Role Dropdown // -->
            <x-dropdown-li
                    dropdownActive="#"
                    title="User & Role"
                    dropdownAmount="2">
                    <x-dropdown-li-single route="{{ route('admin.all.users') }}" activeClass="#" title="All Users" />
                    <x-dropdown-li-single route="#" activeClass="#" title="All Roles" />
            </x-dropdown-li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
