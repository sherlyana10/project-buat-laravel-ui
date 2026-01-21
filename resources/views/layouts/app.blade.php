<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
    body {
        background: #f9fafb;
    }

    .app-wrapper {
        display: flex;
        min-height: 100vh;
    }

    /* SIDEBAR */
    .sidebar {
        width: 220px;
        background: #111827;
        color: #fff;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .sidebar.collapsed {
        width: 60px;
    }

    .sidebar h6 {
        padding: 15px;
        font-size: 14px;
        color: #9ca3af;
        transition: opacity 0.2s;
    }

    .sidebar a {
        display: block;
        padding: 12px 15px;
        color: #e5e7eb;
        text-decoration: none;
        font-size: 14px;
        white-space: nowrap;
        transition: opacity 0.2s;
    }

    /* SEMBUNYIKAN TEKS SAAT COLLAPSE */
    .sidebar.collapsed h6,
    .sidebar.collapsed a {
        opacity: 0;
        pointer-events: none;
    }

    .sidebar a:hover {
        background: #1f2937;
        color: #fff;
    }

    /* MAIN */
    .main {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .topbar {
        background: #ffffff;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #e5e7eb;
    }

    .burger {
        font-size: 22px;
        cursor: pointer;
    }

    .content {
        padding: 20px;
    }
</style>

</head>
<body>
<div id="app">
    <div class="app-wrapper">

                {{-- SIDEBAR --}}
                @auth
                <div id="sidebar" class="sidebar">
                    <h6>MENU</h6>

                    <a href="{{ url('/home') }}">Dashboard</a>

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('teachers.index') }}">Data Guru</a>

                    @elseif(auth()->user()->role === 'user')
                        <a href="{{ route('students.index') }}">Data Saya</a>
                    @endif
                </div>
                @endauth


        {{-- MAIN --}}
        <div class="main">

            {{-- TOPBAR --}}
            <div class="topbar">
                @auth
                    <span class="burger" onclick="toggleSidebar()">☰</span>
                @else
                    <span></span>
                @endauth

                <div>
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Login</a>
                        @endif
                    @else
                        <div class="dropdown d-inline">
                            <a class="dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="content">
                @yield('content')
            </div>

        </div>
    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('collapsed');
    }
</script>
</body>
</html>
