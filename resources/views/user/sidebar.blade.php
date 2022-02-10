  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('backend/images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Laravel</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!--\\ dashboard // -->
            <x-single-li route="{{ route('dashboard') }}" activeClass="{{ (request()->is('dashboard')) ? 'active' : '' }}" title="Dashboard" />
            <!--\\ Widgets // -->
            <x-single-li route="#" activeClass="" title="Widgets">
                    <span class='right badge badge-danger'>New</span>
            </x-single-li>
            <!--\\ Demo Dropdown // -->
            <x-dropdown-li
                    dropdownActive="
                                {{ (request()->is('demo1')) || (request()->is('demo2')) ? 'menu-is-opening menu-open' : '' }}"
                    title="Demo Pages"
                    dropdownAmount="2">
                    <x-dropdown-li-single route="{{ url('/demo1') }}" activeClass="{{ (request()->is('demo1')) ? 'active' : '' }}" title="Page 1" />
                    <x-dropdown-li-single route="{{ url('/demo2') }}" activeClass="{{ (request()->is('demo2')) ? 'active' : '' }}" title="Page 2" />
            </x-dropdown-li>
            <!--\\ Student Dropdown // -->
            <x-dropdown-li
                    dropdownActive="
                                {{ (request()->is('student*')) ? 'menu-is-opening menu-open' : '' }}"
                    title="Students"
                    dropdownAmount="2">
                    <x-dropdown-li-single route="{{ route('students.index') }}" activeClass="{{ (request()->routeIs('students.index')) || (request()->routeIs('students.search')) ? 'active' : '' }}" title="All Students" />
                    <x-dropdown-li-single route="{{ route('students.create') }}" activeClass="{{ (request()->routeIs('students.create')) ? 'active' : '' }}" title="Add New One" />
            </x-dropdown-li>
            <!--\\ Module Dropdown // -->
            <x-dropdown-li
                    dropdownActive="
                                {{ (request()->is('blogs*')) ? 'menu-is-opening menu-open' : '' }}"
                    title="Modules"
                    dropdownAmount="1">
                    <!--\\ Blog Module Dropdown // -->
                    <x-dropdown-li
                        dropdownActive="
                                    {{ (request()->is('blogs*')) ? 'menu-is-opening menu-open' : '' }}"
                        title="Blogs"
                        dropdownAmount="2">
                        <x-dropdown-li-single route="{{ route('blogs.index') }}" activeClass="{{ (request()->routeIs('blogs.index')) || (request()->routeIs('blogs.search')) ? 'active' : '' }}" title="All Blogs" />
                        <x-dropdown-li-single route="{{ route('blogs.create') }}" activeClass="{{ (request()->routeIs('blogs.create')) ? 'active' : '' }}" title="Add New One" />
                    </x-dropdown-li>
            </x-dropdown-li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
