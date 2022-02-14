<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel With Adminlte Authentication</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- ==============Styles ============== -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- ============== Pages Based Css ============== -->
        @yield('css')
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div id="app" class="">
            <nav class="navbar navbar-expand-md navbar-light bg-white">
                <a class="navbar-brand font-weight-bold" href="/">Laravel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                  </ul>
                  <ul class="navbar-nav my-2 my-lg-0">
                    @if (Auth::user())
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                  </ul>
                </div>
            </nav>
              {{-- pages Content  --}}
              @yield('content')
              {{-- Footer  --}}
        </div>
        <!-- ============== JS ============== -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('js')
    </body>
</html>
