<nav class="relative py-6 px-6 lg:px-48 flex justify-between items-center bg-[#1e1e1e] z-50">
    <a class="text-3xl font-bold leading-none" href="/">
        <img src="{{ url('Logo.svg') }}" alt="logo">
    </a>
    <div class="lg:hidden">
        @auth
        <div class="relative z-30">
            <div class="navbar-burger flex items-center gap-2 cursor-pointer">
                <img src="{{ Auth::user()->avatar }}" alt="Profile Picture" class="w-8 h-8 rounded-full">
            </div>
        </div>
        @else
        <button class="navbar-burger flex items-center text-[#e00a24] p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
        @endauth
    </div>
    <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:items-center lg:w-auto lg:space-x-6">
        <li>
            <a href="buat-petisi" class="transition ease-in-out duration-500 hover:bg-black/30 py-4 px-6 rounded-md">Mulai Petisi</a>
        </li>
        <li>
            <a href="petisi" class="transition ease-in-out duration-500 hover:bg-black/30 py-4 px-6 rounded-md">Telusuri Petisi</a>
        </li>
        <li>
            <a href="tentang-kami" class="transition ease-in-out duration-500 hover:bg-black/30 py-4 px-6 rounded-md">Tentang Kami</a>
        </li>
    </ul>
    @auth
        <div class="hidden lg:block relative z-30">
            <div class="flex items-center gap-2 cursor-pointer" id="profile-dropdown">
                <img src="{{ Auth::user()->avatar }}" alt="Profile Picture" class="w-8 h-8 rounded-full">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            </div>
            <div class="absolute right-0 mt-2 w-fit bg-[#292929] rounded-md shadow-lg hidden" id="profile-dropdown-menu">
                <div class="py-2">
                    <span class="block px-4 py-2 text-sm">Masuk sebagai:</span>
                    <span class="block px-4 py-2 text-sm opacity-70">{{ Auth::user()->name }} ({{ Auth::user()->email }})</span>
                    <a href="/profil/{{ Auth::user()->slug }}" class="block px-4 py-2 text-sm text-white hover:bg-black/30"">Profil</a>
                    @can('admin', Auth::user())
                        <a href="/admin" class="block px-4 py-2 text-sm text-white hover:bg-black/30"">Dashboard</a>
                    @endcan
                    <a href="/logout" class="block px-4 py-2 text-sm text-[#e00a24] hover:bg-black/30">Keluar</a>
                </div>
            </div>
        </div>
    @else
        <a class="hidden lg:inline-block border-2 border-[#e00a24] rounded-xl py-[9px] px-[22px] font-semibold text-[17px] transition ease-in-out duration-500 hover:bg-[#e00a24]" href="/login">Masuk</a>
    @endauth
</nav>

<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-[#1e1e1e] border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none" href="#">
                <img src="{{ url('Logo.svg') }}" alt="logo">
            </a>
            <button class="navbar-close">
                <svg class="h-6 w-6 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold hover:bg-black/30 rounded" href="buat-petisi">Mulai Petisi</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold hover:bg-black/30 rounded" href="telusuri-petisi">Telusuri Petisi</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold hover:bg-black/30 rounded" href="tentang">Tentang Kami</a>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <div class="pt-6">
                @auth
                <p class="text-gray-400">Masuk sebagai:</p>
                <p>{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->email }}</p>
                <a class="mt-3 block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold border-2 border-white rounded-xl text-[#e00a24] hover:bg-white" href="/profil/{{ Auth::user()->slug }}">Profil</a>  
                @can('admin', Auth::user())
                <a class="mt-3 block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold border-2 border-white rounded-xl text-[#e00a24] hover:bg-white" href="/admin">Dashboard</a>  
                @endcan
                <a class="mt-3 block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold border-2 border-[#e00a24] rounded-xl hover:bg-[#e00a24]" href="/logout">Keluar</a>
                @else
                <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold border-2 border-[#e00a24] rounded-xl hover:bg-[#e00a24]" href="/login">Masuk</a>
                @endauth
            </div>
            <p class="my-4 text-xs text-center">Copyright © 2024</p>
        </div>
    </nav>
</div>
