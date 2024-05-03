@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="relative mx-auto py-8 text-center">
        <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-contain size-full z-10 -mt-80">
        <h1 class="relative z-20 text-5xl font-bold mt-14">Terkam Bersama, Bangkit Bersama</h1>
        <h1 class="relative z-20 text-5xl font-bold mt-4 bg-clip-text text-transparent bg-gradient-to-r from-white via-[#C82323] to-white">Suara Mahasiswa, Harapan Universitas</h1>
        <p class= "relative z-20 opacity-80 my-10">Berabunglah dengan kami di platform ini untuk menguatkan suara mahasiswa Universitas Jenderal Soedirman.<br>Bersama, kita bangkit untuk membentuk masa depan yang lebih baik.</p>
        <a href="/" class="relative z-20 bg-[#121212] py-3 px-6 font-bold rounded-[10px] shadow-[#C82323_0px_0px_40px] hover:bg-[#C82323] transition ease-in-out duration-500">Mulai membuat petisi</a>
        <div class="absolute z-30 w-full px-64 mt-14 flex gap-4 items-center">
            <div class="cursor-pointer scale-x-[-1]">
                <img src="{{ url('play.svg') }}" alt="arrow-left">
            </div>
            <div class="flex gap-3 p-3 bg-[#242424] ring-1 ring-[#4a4949] h-96 w-full rounded-xl">
                <div class="w-1/2 rounded-lg bg-[#121212]">
                    <img src="{{ url('img1.png') }}" class="object-cover size-full rounded-xl">
                </div>
                <div class="w-1/2 rounded-lg bg-[#121212]">
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
                            <a href=""><small class="underline text-[#C82323] font-semibold">Baca Selanjutnya</small></a>
                        </div>
                        <div class="w-full flex justify-end"><a href="" class="italic font-bold bg-[#C82323] py-2 px-4 rounded-lg">Berikan Dukungan!</a></div>
                    </div>
                    <div class="w-full bg-[#1e1e1e] p-5 rounded-b-lg flex justify-between items-center">
                        <div class="flex gap-2 items-center">
                            <img src="{{ url('like.svg') }}">
                            <small>Suka</small>
                        </div>
                        <div class="flex gap-2 items-center">
                            <img src="{{ url('support.svg') }}">
                            <small class="text-[#C82323]">5071 Pendukung</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cursor-pointer">
                <img src="{{ url('play.svg') }}" alt="arrow-right">
            </div>
        </div>
        <div class="relative h-[30rem] w-full bg-[#1e1e1e] mt-40 z-20"></div>
    </div>
@endsection