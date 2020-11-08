<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-orange.png') }}" width="30" height="30">
                    <span class="pl-3">
                        Proyecto SENA
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="bottom-bar">
            <nav class="sidebar nav">
                <a class="nav-link active" href="/proyectos">
                    <span class="material-icons">source</span>
                </a>
                <a class="nav-link" href="#">
                    <span class="material-icons">post_add</span>
                </a>
                <a class="nav-link" href="#">
                    <span class="material-icons">format_list_bulleted</span>
                </a>
                <a class="nav-link" href="#">
                    <span class="material-icons">show_chart</span>
                </a>
                <a class="nav-link" href="/usuarios">
                    <span class="material-icons">people</span>
                </a>
            </nav>
        </div>

        <main>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="container-fluid">
                            <div class="row title">
                                <div class="col p-0">
                                    <h2 class="m-0"> @yield('title') </h2>
                                </div>
                                <div class="col-auto button-rounded">
                                    <span class="material-icons">add</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card list">
                            <div class="search-bar mb-3">
                                <input type="text" class="form-control" placeholder="Buscar...">
                                <span class="material-icons">search</span>
                            </div>
                            @yield('list')
                        </div>
                    </div>
        
                    <div class="col-8">
                        <div class="container-fluid">
                            <div class="row title">
                                <div class="col"></div>
                                <div class="col-auto mr-3 button-rounded">
                                    <span class="material-icons">edit</span>
                                </div>
                                <div class="col-auto button-rounded">
                                    <span class="material-icons">delete</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            @yield('form')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
