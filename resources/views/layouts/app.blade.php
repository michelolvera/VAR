<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <div id="app">
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo center">VAR</a>
                    <ul id="nav-mobile" class="left">
                        <li><a id="btn_sidenav" href="#"><i class="material-icons">menu</i></a></li>
                    </ul>
                    <!-- Inicio de sesion en caso de requerirse en navbar
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        @guest
                        <li><a href="{{ route('login') }}">Iniciar sesion</a></li>
                        @if (Route::has('register'))
                        <li><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                        @endif
                        @else
                        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_user">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                        <ul id="dropdown_user" class="dropdown-content">
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesion</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endguest
                    </ul>-->
                </div>
            </nav>
        </div>
        <ul class="sidenav" id="menu-side">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="{{ asset('svg/403.svg') }}"
                        alt="">
                    </div>
                    <a href="#">
                        <i class="material-icons medium">account_circle</i>
                    </a>
                    @guest
                    <a href="{{ route('login') }}">
                        <span class="name white-text">Iniciar sesión</span>
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        <span class="email white-text">Registrarse</span>
                    </a>
                    @endif
                    @else
                    <a href="#">
                        <span class="name white-text">{{ Auth::user()->name }}</span>
                    </a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="white-text">Cerrar sesion</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                </div>
            </li>
            <li>
                <a href="{{ route('home') }}">
                    <i class="material-icons">home</i>
                    Inicio
                </a>
            </li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="subheader">Categorías</a></li>
            <div id="categories"></div>
            <li>
                <div class="divider"></div>
            </li>
            <li>
                <a href="">
                    <i class="material-icons">email</i>
                    Contacto
                </a>
            </li>
            @if (Auth::check())
                @if (Auth::user()->admin)
                    @include('admin')
                @endif
            @endif
        </ul>
        <main class="container" style="padding: 1em;">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="{{ asset('js/principal.js') }}"></script>
    @yield('extraimports')
</body>
</html>
