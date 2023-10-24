<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login or Register</title>
        <link href="admin/assets/images/tgb-mini.png" rel="icon" type="image/x-icon" >

        <link rel="stylesheet" type="text/css" href="product/css/main.css">
        <link rel="stylesheet" type="text/css" href="product/css/util.css">
        <link rel="stylesheet" type="text/css" href="product/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="product/fonts/font-awesome-4.7.0/css/font-awesome.min.css">




        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
