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
            @foreach ($petisis as $petisi)
            <div class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212]">
                    <img src="{{ $petisi->image ? asset('storage/' . $petisi->image) : 'https://source.unsplash.com/1200x400?' . urlencode($petisi->title) }}" class="object-cover size-full rounded-xl" alt="{{ $petisi->title }}">
                </div>
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212] flex flex-col justify-between">
                    <div class="p-5 flex flex-col gap-4 items-start text-left">
                        <div class="flex justify-between w-full">
                            <small class="opacity-50">{{ $petisi->categories->pluck('name')->implode(' | ') }}</small>
                            <small class="opacity-50">{{ $petisi->created_at->format('d/m/Y') }}</small>
                        </div>
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('pic2.svg') }}">
                            <small>{{ $petisi->user->name }}</small>
                        </div>
                        <div class="flex flex-col gap-2">
                            <b>{{ $petisi->title }}</b>
                            <small class="opacity-80">{!! Str::limit($petisi->desc, 100) !!}</small>
                            <a href="{{ route('petisi.show', $petisi->slug) }}">
                                <small class="underline text-[#C82323] hover:text-[#dc4d4d] font-semibold">Baca Selanjutnya</small>
                            </a>
                        </div>
                        <div class="w-full flex justify-end">
                            <a href="{{ route('petisi.show', $petisi->slug) }}" class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">Berikan Dukungan!</a>
                        </div>
                    </div>
                    <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                        {{-- <div class="flex gap-2 items-center p-3 rounded-lg {{ Auth::check() && $petisi->likes->where('pivot.petition_id', $petisi->id)->where('pivot.user_id', Auth::user()->id)->isNotEmpty() ? 'text-[#C82323]' : '' }}">
                            @if (Auth::check() && $petisi->likes->where('pivot.petition_id', $petisi->id)->where('pivot.user_id', Auth::user()->id)->isNotEmpty())
                                <svg width="13" height="12" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="text-[#C82323]">
                                    <path d="M11.7861 4.28543L7.60742 3.96399L8.22352 1.56926C8.38424 0.856732 8.20262 0.447699 7.62162 0.267425L6.69239 0.00357569C6.6704 -0.00225284 6.64712 -0.000929677 6.62593 0.00735371C6.60474 0.0156371 6.58674 0.0304506 6.57453 0.0496487L3.11904 5.46967C3.09988 5.50084 3.07305 5.52658 3.04112 5.54445C3.00919 5.56231 2.97322 5.5717 2.93663 5.57173H0V11.1428H3.15038C3.28859 11.1428 3.42589 11.165 3.55701 11.2087L5.60083 11.8899C5.81935 11.9628 6.04818 12 6.27853 12H11.0447C11.5536 12 11.8885 11.6378 11.9884 11.1385L12.8576 7.32786V5.3569C12.8576 4.76598 12.3755 4.339 11.7861 4.28543Z"/>
                                </svg>
                            @else
                                <svg width="13" height="12" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.7861 4.28543L7.60742 3.96399L8.22352 1.56926C8.38424 0.856732 8.20262 0.447699 7.62162 0.267425L6.69239 0.00357569C6.6704 -0.00225284 6.64712 -0.000929677 6.62593 0.00735371C6.60474 0.0156371 6.58674 0.0304506 6.57453 0.0496487L3.11904 5.46967C3.09988 5.50084 3.07305 5.52658 3.04112 5.54445C3.00919 5.56231 2.97322 5.5717 2.93663 5.57173H0V11.1428H3.15038C3.28859 11.1428 3.42589 11.165 3.55701 11.2087L5.60083 11.8899C5.81935 11.9628 6.04818 12 6.27853 12H11.0447C11.5536 12 11.8885 11.6378 11.9884 11.1385L12.8576 7.32786V5.3569C12.8576 4.76598 12.3755 4.339 11.7861 4.28543Z"/>
                                </svg>
                            @endif
                            <small>{{ $petisi->likes->count() }} Suka</small>
                        </div> --}}
                        <div x-data="petitionLikeData({{ $petisi->id }}, @js(Auth::check() && $petisi->likes->where('pivot.petition_id', $petisi->id)->where('pivot.user_id', Auth::user()->id)->isNotEmpty()), @js($petisi->likes->count()))" :class="{ 'text-[#C82323]': liked }" class="flex gap-2 items-center p-3 rounded-lg hover:bg-black/30">
                            <form x-on:submit.prevent="submitForm">
                                @csrf
                                <button type="submit" class="w-full h-full flex items-center gap-2" :disabled="loading">
                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg" :class="{ 'text-[#C82323]': liked }">
                                        <path d="M11.7861 4.28543L7.60742 3.96399L8.22352 1.56926C8.38424 0.856732 8.20262 0.447699 7.62162 0.267425L6.69239 0.00357569C6.6704 -0.00225284 6.64712 -0.000929677 6.62593 0.00735371C6.60474 0.0156371 6.58674 0.0304506 6.57453 0.0496487L3.11904 5.46967C3.09988 5.50084 3.07305 5.52658 3.04112 5.54445C3.00919 5.56231 2.97322 5.5717 2.93663 5.57173H0V11.1428H3.15038C3.28859 11.1428 3.42589 11.165 3.55701 11.2087L5.60083 11.8899C5.81935 11.9628 6.04818 12 6.27853 12H11.0447C11.5536 12 11.8885 11.6378 11.9884 11.1385L12.8576 7.32786V5.3569C12.8576 4.76598 12.3755 4.339 11.7861 4.28543Z"/>
                                    </svg>
                                    <small x-text="likesCountText"></small>
                                    <div x-show="loading" class="ml-2">
                                        <svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </div>
                                </button>
                            </form>
                        </div>
                        <div class="flex gap-2 items-center">
                            <img src="{{ asset('support.svg') }}">
                            <small class="text-[#C82323] mr-3">{{ $petisi->supporters->count() }} Pendukung</small>
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
function petitionLikeData(petitionId, initiallyLiked, initialLikesCount) {
    return {
        liked: initiallyLiked,
        likesCount: initialLikesCount,
        loading: false,
        auth: @js(Auth::check()),

        get likesCountText() {
            return this.likesCount === 0 ? '0 Suka' : `${this.likesCount} Suka`;
        },

        async submitForm() {
            if (!this.auth) {
                window.location.href = '/login';
                return;
            }
            this.loading = true;
            const url = this.liked ? `/petitions/${petitionId}/unlike` : `/petitions/${petitionId}/like`;
            const method = this.liked ? 'DELETE' : 'POST';

            try {
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                });

                const data = await response.json();
                if (response.ok) {
                    this.liked = !this.liked;
                    this.likesCount = data.likesCount;
                } else {
                    console.error('An error occurred:', data.message);
                }
            } catch (error) {
                console.error('An error occurred:', error);
            } finally {
                this.loading = false;
            }
        },
    }
}

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