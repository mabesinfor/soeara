<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Soeara - Soedirman Berbicara</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased font-sans bg-[#121212] lg:bg-contain sm:bg-cover bg-no-repeat" style="background-image: url('{{ url('clip.svg') }}');">
    <div class="min-h-screen text-white">
        @include('dashboard.layouts.nav')
        <main>
            @if (session('error'))
            <div class="sm:ml-64 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            @endif
            @if (session('success'))
            <div class="sm:ml-64 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
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
