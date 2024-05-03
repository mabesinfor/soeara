<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | Soeara - Soedirman Berbicara</title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased font-sans">
        <div class="min-h-screen bg-[#121212] text-white">
            @include('layouts.nav')
            <main>
                
                @yield('content')
            </main>
            @include('layouts.footer')
        </div>
    </body>
</html>