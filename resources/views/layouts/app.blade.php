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

        <div id="header-image">
            <a href="{{ route('home') }}">
                <img src="img/header/castle.jpg" title="Triad Weyrs header image"/>
            </a>
        </div>

        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Triad Weyrs') }}
                </a>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
