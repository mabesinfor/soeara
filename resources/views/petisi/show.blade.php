@extends('layouts.app')

@section('title', $petisi->title)

@section('content')
    {{-- Start Judul --}}
    <div class="flex items-center justify-center p-6">
        <h1 class="text-2xl text-center font-bold">{{ $petisi->title }}</h1>
    </div>
    {{-- End Judul --}}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- Start Konten Petisi --}}
        <div class="bg-transparent p-4 col-span-2 md:ml-20">
            <div class="relative z-30 flex flex-col gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl md:ml-20">
                <div class="w-full rounded-lg bg-[#121212]">
                    <img src="{{ asset('storage/' . $petisi->image) }}" class="object-cover size-full rounded-xl">
                </div>
                <div class="w-full rounded-lg bg-[#121212] flex flex-col justify-between">
                    <div class="p-5 flex flex-col gap-4 items-start text-left">
                        <div class="flex justify-between w-full">
                            <small class="opacity-50">{{ $petisi->categories->pluck('name')->implode(' | ') }}</small>
                            <small class="opacity-50">{{ $petisi->created_at->format('d/m/Y') }}</small>
                        </div>
                        <a href="/profil/{{ $petisi->user->slug }}" class="flex items-center gap-4">
                            <img src="{{ url('pic3.svg') }}">
                            <small>{{ $petisi->user->name }}</small>
                        </a>
                        <div class="flex flex-col gap-2">
                            <b>{{ $petisi->title }}</b>
                            <p class="opacity-80 text-justify">{{ $petisi->desc }}</p>
                        </div>
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
        </div>
        {{-- End Konten Petisi --}}

        {{-- Start Dukung Petisi --}}
        <div class="flex flex-col items-center md:items-start bg-transparent p-4 col-span-2 md:ml-20">
            {{-- Start Progress Bar --}}
            <div class="border border-[#C82323] rounded-xl w-full md:w-3/4">
                <div class="w-full h-2 rounded-full">
                    <div class="h-full bg-[#C82323] rounded-full" style="width: 50%;"></div>
                </div>
            </div>
            <div class="bg-transparent flex justify-between items-center w-full md:w-3/4 mt-2">
                <div>
                    <h3 class="text-xl text-center md:text-start font-bold text-[#C82323]">5.701</h3>
                    <p class="text-center md:text-start text-[#C82323]">Pendukung</p>
                </div>
                <div>
                    <h3 class="text-xl text-center md:text-right font-bold">10.000</h3>
                    <p class="text-center md:text-right">Tujuan Berikutnya</p>
                </div>
            </div>
            {{-- End Progress Bar --}}

            <h3 class="text-2xl text-center md:text-start font-bold mb-3 mt-5">Dukung petisi ini</h3>
            <div class="flex items-center gap-4 mb-4 justify-center md:justify-start">
                <img src="{{ optional(Auth::user())->avatar ? (filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL) ? Auth::user()->avatar : asset('storage/' . Auth::user()->avatar)) : asset('user.jpg') ?? url('user.jpg') }}" class="rounded-full size-8">
                {{ optional(Auth::user())->name ?? 'Visitor' }}
            </div>
            <p class="opacity-80 text-center md:text-start">Saya mendukung petisi ini karena ... (tidak wajib)</p>
            <form action="/supported" method="post" class="w-full md:w-3/4">
                <textarea class="w-full p-2 rounded-md bg-transparent border border-gray-600 mt-3"></textarea>
                <button type="submit" class="w-full mt-2 bg-[#C82323] hover:bg-[#dc4d4d] text-white rounded-xl px-4 py-2 font-bold italic">Dukung Petisi Ini</button>
            </form>
        </div>
        {{-- End Dukung Petisi --}}

        <div class="bg-transparent w-full p-4 col-span-2 md:ml-20">
            <h3 class="text-2xl text-start font-bold mb-7 md:ml-20">24 Komentar</h3>
            {{-- Start submit komentar --}}
            <div class="flex items-start gap-4 mb-4 md:ml-20">
                <img src="{{ optional(Auth::user())->avatar ?? url('user.jpg') }}" class="rounded-full size-8">
                <div class="flex flex-col w-full relative">
                    <form action="/submitkomen" method="post" onsubmit="return checkLogin()">
                        @csrf
                        <input type="hidden" name="petisi_id" value="{{ $petisi->id }}">
                        <textarea name="content" class="w-full mb-20 h-20 pb-10 p-2 rounded-md bg-transparent border border-gray-600" placeholder="Tambahkan komentar ..."></textarea>
                        <button type="submit" class="absolute right-0 bottom-6 bg-[#C82323] hover:bg-[#dc4d4d] text-white rounded-xl px-4 py-2">Kirim Komentar</button>
                    </form>
                </div>
            </div>
            {{-- End submit komentar --}}

            {{-- Start Komentar --}}
            @foreach($comments as $comment)
                <div class="flex items-start gap-4 mb-4 md:ml-20 mt-5">
                    <img src="{{ $comment->user && $comment->user->avatar ? url($comment->user->avatar) : url('user.jpg') }}" class="rounded-full size-8">
                    <div class="flex flex-col w-full">
                        <div class="flex justify-between">
                            <div class="flex gap-2">
                                <p class="font-bold">{{ $comment->user->name }}</p>
                                <p class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                            <button onclick="deleteFunction()">
                                <img src="{{ url('delete.svg') }}">
                            </button>
                        </div>
                        <p class="mt-5">{{ $comment->content }}</p>
                        <div class="inline-flex gap-2 items-center cursor-pointer mt-2">
                            <button id="likeButton" onclick="toggleLike()">
                                <img id="likeImage" src="{{ url('like.svg') }}" class="text-black">
                            </button>
                            <small>{{ $comment->likes_count }} Suka</small>
                        </div>
                    </div>
                </div>
                <hr class="md:ml-20">
            @endforeach
            {{-- End Komentar --}}
        </div>
    </div>
    <div class="w-full md:w-1/2 md:ml-20 flex p-5 mb-20">
        <div class="relative z-30 flex p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl md:ml-20">
            <div class="w-full rounded-lg bg-[#121212] py-3 px-6 md:px-50 text-center">
                <a href="#">Lihat lebih banyak komentar</a>
            </div>
        </div>
    </div>

    <script>
        function checkLogin() {
            @if(Auth::guest())
                window.location.href = "/login";
                return false;
            @endif
            return true;
        }
    </script>
@endsection