@extends('layouts.app')

@section('title', 'Telusuri Petisi')

@section('content')
    <div class="relative py-8 pl-2 mx-auto md:pl-0">
        <img src="{{ url('clip2.svg') }}" class="absolute inset-0 z-10 object-cover size-full">
        <div class="relative z-20 flex flex-col items-center gap-10 my-10 md:mx-40">
            <div class="w-full">
                <p>Cari Petisi</p>
                <form action="" class="flex items-center w-full gap-4">
                    <input type="text" name="search" id="search"
                        class="mt-2 border border-white bg-[#121212] rounded-lg py-3 px-4 w-4/5 placeholder-white/70"
                        placeholder="Stop Kekerasan Pada Hewan di Lingkungan Kampus! Beri Sanksi Pelaku Kekerasan!">
                    <div class="h-fit w-1/5 bg-[#e00a24] rounded-xl mt-[6px] transition ease-in-out duration-500 hover:bg-[#c94958]">
                        <button type="submit"
                        class="flex items-center justify-center w-full gap-2 py-4 font-semibold">
                        <img src="{{ url('search.svg') }}" class="size-4">
                        <span class="hidden md:flex">Cari Petisi</span>
                    </button>
                    </div>
                </form>
            </div>
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
                        <div class="flex gap-2 items-center cursor-pointer hover:bg-black/30 p-3 rounded-lg {{ Auth::check() && $petisi->likes->where('pivot.petition_id', $petisi->id)->where('pivot.user_id', Auth::user()->id)->isNotEmpty() ? 'bg-black/30 text-[#C82323]' : '' }}">
                            <img src="{{ asset('like.svg') }}">
                            <small>{{ $petisi->likes->count() }} Suka</small>
                        </div>
                        <div class="flex gap-2 items-center">
                            <img src="{{ asset('support.svg') }}">
                            <small class="text-[#C82323] mr-3">{{ $petisi->supporters->count() }} Pendukung</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="flex justify-center w-full">
                <div class="relative z-30 flex p-2 bg-[#303030]/50 ring-1 ring-[#646464] rounded-xl gap-2 text-[#C82323] font-bold">
                    <button class="rounded-lg bg-[#121212] hover:bg-[#2f2f2f] p-3">
                        <img src="{{ url('play.svg') }}" class="size-3 scale-x-[-1]">
                    </button>
                    <button class="rounded-lg bg-[#C82323] hover:bg-[#be4141] px-3 text-[#121212]">1</button>
                    <button class="rounded-lg bg-[#121212] hover:bg-[#2f2f2f] px-3">2</button>
                    <button class="rounded-lg bg-[#121212] hover:bg-[#2f2f2f] px-3">3</button>
                    <button class="rounded-lg bg-[#121212] hover:bg-[#2f2f2f] px-3">
                        <img src="{{ url('play.svg') }}" class="size-3">
                    </button>
                </div>
            </div>
            <div class="flex justify-center w-full">
                <div class="relative z-30 flex p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-fit rounded-xl">
                    <div class="w-full rounded-lg bg-[#121212] py-3 px-6 md:px-40 text-center">
                        Tidak menemukan petisi yang Anda cari? <a href="buat-petisi" class="hover:underline text-[#C82323] hover:text-[#dc4d4d] font-semibold">Buat petisi Anda sendiri!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
