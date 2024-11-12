<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color: rgb(18, 18, 19);">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm sticky-top">
            <div class="container">
                <x-app-text-logo />
                @if(Session::get('is_phone'))
                    <x-menu.toggle-menu-btn />
                @endif
                <x-menu.main-menu /> 
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <x-footer.phone-footer />
    </div>
    @livewireScripts
</body>
</html>
