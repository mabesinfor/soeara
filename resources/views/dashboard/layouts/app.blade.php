<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Soeara - Soedirman Berbicara</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased font-sans bg-[#121212]">
    <div class="min-h-screen text-white">
        @include('dashboard.layouts.nav')
        <main>
            @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            @endif
            @include('dashboard.layouts.sidebar')
            @yield('content')
        </main>
    </div>
</body>
@vite('resources/js/dashboard/app.js');
@vite('resources/js/app.js');

</html>
