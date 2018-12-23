<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Triad Weyrs') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicons -->
	<link rel="shortcut icon" href="img/favicon/triad-gold.ico">
	<link rel="icon" sizes="16x16 32x32 64x64" href="img/favicon/triad-gold.ico">
	<link rel="icon" type="image/png" sizes="196x196" href="img/favicon/triad-gold-192.png">
	<link rel="icon" type="image/png" sizes="160x160" href="img/favicon/triad-gold-160.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon/triad-gold-96.png">
	<link rel="icon" type="image/png" sizes="64x64" href="img/favicon/triad-gold-64.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/triad-gold-32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/triad-gold-16.png">
	<link rel="apple-touch-icon" href="img/favicon/triad-gold-57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/triad-gold-114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/triad-gold-72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/triad-gold-144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/triad-gold-60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/triad-gold-120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/triad-gold-76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/triad-gold-152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/triad-gold-180.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="img/favicon/triad-gold-144.png">
	<meta name="msapplication-config" content="img/favicon/browserconfig.xml">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Triad Weyrs') }}
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
