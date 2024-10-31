<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pacific Enterprise</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

        @vite('resources/css/app.css')
        @yield('styles')
    </head>
    <body class="mx-auto mt-10 bg-color">
        @include('components.mobile-sidebar')
        @yield('content')

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        @vite('resources/js/app.js')

    </body>
</html>
