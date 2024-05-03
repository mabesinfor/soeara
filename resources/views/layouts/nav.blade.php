<nav class="relative py-6 px-6 lg:px-48 flex justify-between items-center bg-[#1e1e1e] z-20">
    <a class="text-3xl font-bold leading-none" href="#">
        <img src="{{ url('Logo.svg') }}" alt="logo">
    </a>
    <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-[#e00a24] p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul
        class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:items-center lg:w-auto lg:space-x-6">
        <li><a href="buat" class="transition ease-in-out duration-500 hover:bg-black/30 py-4 px-6 rounded-md">Mulai Petisi</a></li>
        <li><a href="petisi" class="transition ease-in-out duration-500 hover:bg-black/30 py-4 px-6 rounded-md">Telusuri Petisi</a></li>
        <li><a href="tentang" class="transition ease-in-out duration-500 hover:bg-black/30 py-4 px-6 rounded-md">Tentang Kami</a></li>
    </ul>
    <a class="hidden lg:inline-block border-2 border-[#e00a24] rounded-xl py-[9px] px-[22px] font-semibold text-[17px] transition ease-in-out duration-500 hover:bg-[#e00a24]"
        href="#">Masuk</a>
</nav>

<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-[#1e1e1e] border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none" href="#">
                <img src="{{ url('Logo.svg') }}" alt="logo">
            </a>
            <button class="navbar-close">
                <svg class="h-6 w-6 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold hover:bg-black/30 rounded"
                        href="#">Mulai Petisi</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold hover:bg-black/30 rounded"
                        href="#">Telusuri Petisi</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold hover:bg-black/30 rounded"
                        href="#">Tentang Kami</a>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <div class="pt-6">
                <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold border-2 border-[#e00a24] rounded-xl"
                    href="#">Masuk</a>
            </div>
            <p class="my-4 text-xs text-center">
                <span>Copyright © 2024</span>
            </p>
        </div>
    </nav>
</div>
