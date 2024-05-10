@extends('layouts.app')

@section('title', 'Telusuri Petisi')

@section('content')
    <div class="relative mx-auto py-8 pl-2 md:pl-0">
        <img src="{{ url('clip2.svg') }}" class="absolute inset-0 object-cover size-full z-10">
        <div class="relative z-20 flex flex-col items-center gap-4 my-10">
            <div>
                <p>Cari Petisi</p>
                <form action="" class="flex items-center gap-4">
                    <input type="text" name="search" id="search" class="mt-2 border border-white bg-[#121212] rounded-lg py-3 px-4 w-[50rem] placeholder-white/70" placeholder="Stop Kekerasan Pada Hewan di Lingkungan Kampus! Beri Sanksi Pelaku Kekerasan!">
                    <button type="submit" class="h-fit cursor-pointer bg-[#e00a24] rounded-xl mt-[6px] py-3 px-10 font-semibold transition ease-in-out duration-500 hover:bg-[#c94958] flex items-center gap-2">
                        <img src="{{ url('search.svg') }}" class="size-4">
                        Cari Petisi
                    </button>
                </form>
                
            </div>
        </div>
    </div>
@endsection