<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fath Comp</title>
        <link rel="icon" type="image/svg+xml" href="{{ asset('gambar/forge-icon.svg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @include('sweetalert::alert')
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="flex justify-center items-center min-h-screen bg-yellow-100 lg:px-20">
            {{ $slot }}
        </div>
    </body>
</html>
