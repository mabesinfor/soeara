@extends('layouts.app')

@section('title', 'Bagikan Petisi')

@section('content')
    {{-- Start Judul --}}
    <div class="flex items-center justify-center p-6">
        <h1 class="text-2xl text-center font-bold">Unsoed Darurat Pelecehan Seksual! Bentuk Tim Investigasi Independent!</h1>
    </div>
    {{-- End Judul --}}

    {{-- Start Bagikan --}}
    <div class="p-4 sm:p-8">
        <div class="relative z-30 flex flex-col gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full md:w-1/2 lg:w-1/3 mx-auto rounded-xl">
            <div class="w-full h-full rounded-lg bg-[#121212] flex flex-col justify-between p-4">
                <p class="font-bold text-center mb-4">Bagikan petisi ke berbagai platform</p>
                <div class="w-full px-4 sm:px-8">
                    <div class="mt-4 flex justify-center">
                        <button class="px-4 sm:px-8 py-2 bg-transparent border-2 border-[#646464] text-white rounded-xl hover:bg-[#303030] flex items-center justify-center w-full">
                            <img src="{{ url('link.svg') }}" class="mr-2">
                            Salin Tautan
                        </button>
                    </div>
                    <div class="w-full mt-4 flex flex-col sm:flex-row justify-between">
                        <div class="flex flex-col gap-4">
                            <button class="px-4 sm:px-8 py-2 bg-transparent border-2 border-[#646464] text-white rounded-xl hover:bg-[#303030] flex items-center justify-center w-full">
                                <img src="{{ url('twitter.svg') }}" class="mr-2">
                                Twitter
                            </button>
                            <button class="px-4 sm:px-8 py-2 bg-transparent border-2 border-[#646464] text-white rounded-xl hover:bg-[#303030] flex items-center justify-center w-full">
                                <img src="{{ url('facebook.svg') }}" class="mr-2">
                                Facebook
                            </button>
                        </div>
                        <div class="flex flex-col gap-4 mt-4 sm:mt-0">
                            <button class="px-4 sm:px-8 py-2 bg-transparent border-2 border-[#646464] text-white rounded-xl hover:bg-[#303030] flex items-center justify-center w-full">
                                <img src="{{ url('email-share.svg') }}" class="mr-2">
                                Email
                            </button>
                            <button class="px-4 sm:px-8 py-2 bg-transparent border-2 border-[#646464] text-white rounded-xl hover:bg-[#303030] flex items-center justify-center w-full">
                                <img src="{{ url('whatsapp.svg') }}" class="mr-2">
                                WhatsApp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Bagikan --}}

    <div class="text-center md:text-right mb-4 md:p-4 md:pr-48">
        <a href="/home" class="text-white underline">Kembali ke Beranda</a>
    </div>
@endsection