<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Profile</title>
        <link href="admin/assets/images/tgb-mini.png" rel="icon" type="image/x-icon" >


        <!-- Fonts -->
        <base href="/public">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="product/css/main.css">
        <link rel="stylesheet" type="text/css" href="product/css/util.css">
        <link rel="stylesheet" type="text/css" href="product/vendor/bootstrap/css/bootstrap.min.css">
        	<link rel="stylesheet" href="home/assets/font_icon/css/pe-icon-7-stroke.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div>
            <!-- Page Heading -->

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
