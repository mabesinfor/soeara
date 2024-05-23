@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="relative mx-auto py-8 md:text-center pl-2 md:pl-0">
        {{-- hero --}}
        <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover lg:object-contain size-full z-10 -mt-[100rem] md:-mt-[64rem] opacity-50 lg:opacity-100">
        <h1 class="relative z-20 text-4xl md:text-5xl font-bold mt-14">Terkam Bersama, Bangkit Bersama</h1>
        <h1 class="relative z-20 text-4xl md:text-5xl font-bold mt-4 bg-clip-text text-transparent bg-gradient-to-r from-white via-[#C82323] to-white">Suara Mahasiswa, Harapan Universitas</h1>
        <p class= "relative z-20 opacity-80 my-10 hidden md:block">Bergabunglah dengan kami di platform ini untuk menguatkan suara mahasiswa Universitas Jenderal Soedirman.<br>Bersama, kita bangkit untuk membentuk masa depan yang lebih baik.</p>
        <p class= "relative z-20 opacity-80 my-10 md:hidden">Bergabunglah dengan kami di platform ini untuk menguatkan suara mahasiswa Universitas Jenderal Soedirman. Bersama, kita bangkit untuk membentuk masa depan yang lebih baik.</p>
        <a href="buat-petisi" class="relative z-20 bg-[#121212] py-3 px-6 font-bold rounded-[10px] shadow-[#C82323_0px_0px_40px] hover:bg-[#C82323] transition ease-in-out duration-500">Mulai membuat petisi</a>
        {{-- end hero --}}
        {{-- petisi card --}}
        <div class="absolute z-30 md:w-full md:px-4 lg:px-64 mt-14 flex gap-4 items-center">
            <div class="cursor-pointer scale-x-[-1] hidden md:flex hover:scale-110 hover:scale-x-[-1]">
                <img src="{{ url('play.svg') }}" alt="arrow-left">
            </div>
            <div class="flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212]">
                    <img src="{{ url('img1.png') }}" class="object-cover size-full rounded-xl">
                    <h1 class="absolute top-7 bg-[#C82323] py-1 px-2 rounded-lg uppercase italic font-bold ml-4">Lagi Trending!</h1>
                </div>
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212]">
                    <div class="p-5 flex flex-col gap-4 items-start text-left">
                        <div class="flex justify-between w-full">
                            <small class="opacity-50">Ekonomi | Politik | Sosial</small>
                            <small class="opacity-50">24/04/2024</small>
                        </div>
                        <div class="flex items-center gap-4">
                            <img src="{{ url('pic1.svg') }}">
                            <small>Muhammad Ali Prasetyo</small>
                        </div>
                        <div class="flex flex-col gap-2">
                            <b>Desak Unsoed Tolak Kenaikan UKT!</b>
                            <small class="opacity-80">Kenaikan Harga UKT sangat tidak sesuai dengan pelayanan yang diberikan oleh kampus dan justru merugikan mahasiswa karena menambah biaya perkuliahan</small>
                            <a href=""><small class="underline text-[#C82323] hover:text-[#dc4d4d] font-semibold">Baca Selanjutnya</small></a>
                        </div>
                        <div class="w-full flex justify-end"><a href="" class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">Berikan Dukungan!</a></div>
                    </div>
                    <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                        <div class="flex gap-2 items-center cursor-pointer hover:bg-black/30 p-3 rounded-lg">
                            <img src="{{ url('like.svg') }}">
                            <small>Suka</small>
                        </div>
                        <div class="flex gap-2 items-center">
                            <img src="{{ url('support.svg') }}">
                            <small class="text-[#C82323] mr-3">5071 Pendukung</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cursor-pointer hidden md:flex hover:scale-110">
                <img src="{{ url('play.svg') }}" alt="arrow-right">
            </div>
        </div>
        {{-- end petisi card --}}
        {{-- stats card --}}
        <div class="relative h-[75rem] sm:h-[85rem] md:h-[32rem] lg:h-[30rem] w-full bg-[#1e1e1e] mt-40 z-20"></div>
        <div id="stats" class="relative z-20 -mt-[34rem] md:-mt-40 flex flex-col md:flex-row justify-center items-center gap-10 lg:gap-20">
            <div class="p-3 bg-[#303030]/50 ring-1 ring-[#646464] rounded-xl">
                <div class="py-3 pl-4 pr-5 bg-[#121212] size-full rounded-lg flex flex-col justify-center items-center gap-3">
                    <h1 class="count italic text-6xl font-bold text-[#C82323]" data-target="13">1</h1>
                    <span>Fakultas</span>
                </div>
            </div>
            <div class="p-3 bg-[#303030]/50 ring-1 ring-[#646464] rounded-xl">
                <div class="py-3 pl-4 pr-5 bg-[#121212] size-full rounded-lg flex flex-col justify-center items-center gap-3">
                    <div class="flex"><h1 class="count italic text-6xl font-bold text-[#C82323]" data-target="23570">1</h1><h1 class="italic text-6xl font-bold text-[#C82323]">+</h1></div>
                    <span>Mahasiswa</span>
                </div>
            </div>
            <div class="p-3 bg-[#303030]/50 ring-1 ring-[#646464] rounded-xl">
                <div class="py-3 pl-4 pr-5 bg-[#121212] size-full rounded-lg flex flex-col justify-center items-center gap-3">
                    <h1 class="count italic text-6xl font-bold text-[#C82323]" data-target="3">1</h1>
                    <span>Suara!</span>
                </div>
            </div>
        </div>
        {{-- end stats card --}}
        {{-- other petisi card --}}
        <img src="{{ url('clip2.svg') }}" class="absolute inset-0 object-contain size-full z-10 -mt-28 sm:mt-72 md:mt-96 lg:mt-[20rem] lg:pl-[54px]">
        <div class="text-left md:px-10 lg:px-40 py-20 flex flex-col gap-10">
            <h1 class="relative z-20 text-2xl font-bold my-10">Beri dukungan untuk perubahan!</h1>
            @foreach ($petisi as $petisi)
            <div class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212]">
                    <img src="{{ asset($petisi->image) }}" class="object-cover size-full rounded-xl" alt="{{ $petisi->title }}">
                </div>
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212] flex flex-col justify-between">
                    <div class="p-5 flex flex-col gap-4 items-start text-left">
                        <div class="flex justify-between w-full">
                            <small class="opacity-50">Kategori</small>
                            <small class="opacity-50">{{ $petisi->created_at->format('d/m/Y') }}</small>
                        </div>
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('pic2.svg') }}">
                            <small>{{ $petisi->user->name }}</small>
                        </div>
                        <div class="flex flex-col gap-2">
                            <b>{{ $petisi->title }}</b>
                            <small class="opacity-80">{{ Str::limit($petisi->desc, 100) }}</small>
                            <a href="{{ route('petisi.show', $petisi->slug) }}">
                                <small class="underline text-[#C82323] hover:text-[#dc4d4d] font-semibold">Baca Selanjutnya</small>
                            </a>
                        </div>
                        <div class="w-full flex justify-end">
                            <a href="{{ route('petisi.show', $petisi->slug) }}" class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">Berikan Dukungan!</a>
                        </div>
                    </div>
                    <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                        <div class="flex gap-2 items-center cursor-pointer hover:bg-black/30 p-3 rounded-lg">
                            <img src="{{ asset('like.svg') }}">
                            <small>Suka</small>
                        </div>
                        <div class="flex gap-2 items-center">
                            <img src="{{ asset('support.svg') }}">
                            <small class="text-[#C82323] mr-3">5071 Pendukung</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
            <div class="w-full flex justify-center">
                <div class="relative z-30 flex p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-fit rounded-xl">
                    <div class="w-full rounded-lg bg-[#121212] py-3 px-6 md:px-40">
                        Telusuri lebih banyak petisi <a href="petisi" class="hover:underline text-[#C82323] hover:text-[#dc4d4d] font-semibold">disini</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end other petisi card --}}
    </div>
@endsection

@section('javascripts')
<script type="text/javascript">
// counter on scroll
var count = document.getElementsByClassName("count");
var inc = [];
var targets = [];

function initializeTargets() {
    for (let i = 0; i < count.length; i++) {
        targets[i] = parseInt(count[i].getAttribute("data-target"));
    }
}

function updateCount(timestamp) {
    var elapsed = timestamp - startTime;
    var progress = Math.min(elapsed / duration, 1);

    for (let i = 0; i < count.length; i++) {
        var value = Math.floor(progress * targets[i]);
        count[i].innerHTML = value;
    }

    if (progress < 1) {
        window.requestAnimationFrame(updateCount);
    }
}

var startTime,
    duration = 3000; // 3 detik

var stats = document.getElementById("stats");
window.onscroll = function () {
    var topElement = stats.offsetTop;
    var bottomElement = stats.offsetTop + stats.clientHeight;
    var topScreen = window.pageYOffset;
    var bottomScreen = window.pageYOffset + window.innerHeight;

    if (bottomScreen > topElement && topScreen < bottomElement) {
        initializeTargets();
        startTime = performance.now();
        window.requestAnimationFrame(updateCount);
    }
};
</script>
@endsection