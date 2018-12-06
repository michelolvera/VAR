<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ArticulosReligiosos\App_config::first()->store_name }}</title>
</head>
<body>
    <div id="app">
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper {{ ArticulosReligiosos\App_config::first()->nav_materialize_color }}">
                    <a href="#" class="brand-logo">{{ ArticulosReligiosos\App_config::first()->store_name }}</a>
                    <ul id="nav-mobile" class="left">
                        <li><a id="btn_sidenav" href="#"><i class="material-icons">menu</i></a></li>
                    </ul>
                    <ul id="nav-mobile" class="right">
                        @foreach (ArticulosReligiosos\Categorie::select('name', 'icon', 'css_color','slug')->orderBy('name')->get() as $categorie)
                        <li class="hide-on-med-and-down"><a href="/product/bycategorie/{{$categorie->slug}}">{{$categorie->name}}<i class="material-icons right" style="color: {{$categorie->css_color}};">{{$categorie->icon}}</i></a></li>
                        @endforeach
                        <li><a id="btn_shopping" href="#"><i class="material-icons left">shopping_basket</i><span id="cantidad_articulos" class="new badge" data-badge-caption="art.">0</span></a></li>
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
        <ul class="sidenav" id="menu-side" style="height: 100%;">
            <li>
                <div class="user-view">
                    <div class="background" style="background: {{ ArticulosReligiosos\App_config::first()->side_background }}">
                    </div>
                    <a href="#">
                        <i class="material-icons medium" style="color: #FFFFFF;">account_circle</i>
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
                    <a href="../user/{{ Auth::user()->slug }}/edit">
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
                <a href="/product">
                    <i class="material-icons">shop</i>
                    Productos
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
        <div id="modal_shopping" class="modal bottom-sheet">
            <div class="modal-content">
                <h3 style="color: #1c9fb3; font-weight: 300;">Carrito de compras</h3>
                <div id="productlist">

                </div>
            </div>
            <div class="modal-footer">
                @if (Auth::check())
                <div id="paypal-button"></div>
                @else
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Para comprar, inicia sesion</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="{{ asset('js/principal.js') }}"></script>
    @if (Auth::check())
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="{{ asset('js/paypal.js') }}"></script>
    @endif

    <script src="{{ asset('js/js.cookie-2.2.0.min.js') }}"></script>
    @yield('extraimports')
</body>
</html>
