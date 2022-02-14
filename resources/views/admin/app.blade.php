<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('backend/css/adminlte.css') }}">
  <!-- Pages Based css -->
  @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('backend/images/AdminLTELogo.png') }}" alt="userLogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Dropdown Menu -->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset(Auth::user()->profile_image_url) }}" class="user-image img-circle elevation-2" alt="User Image">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primar">
                        <img src="{{ asset(Auth::user()->profile_image_url) }}" class="img-circle elevation-2" alt="User Image">
                        <p>
                        {{ Auth::user()->name }}
                        </p>
                        <br>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="{{ route('profile.index') }}" class="btn btn-default btn-flat">Profile</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- =============SideBar============= -->
            @include('admin.sidebar')
        <!-- ==================Page Content ===================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
                @yield('pagescontent')
        </div>
        <!-- /.content-wrapper -->
        <!-- =========================Footer ============================= -->
        @include('admin.footer')
