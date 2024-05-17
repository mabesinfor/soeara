@extends('layouts.app')

@section('title', 'Mulai Buat Petisi')

@section('content')
    <div class="relative mx-auto py-8 pl-2 md:pl-0">
        <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover size-full z-10">
        <div class="relative z-20 flex flex-col items-start justify-center gap-4 my-10 bg-transparent">
            <div class="pl-4 pr-4 md:pl-60 md:pr-60">
                <p class="font-bold text-2xl md:text-4xl">Kategori apa yang sesuai dengan petisimu?</p>
                <form action="" class="flex flex-wrap items-center gap-4 mt-12">
                    @csrf
                    <button id="kesehatan" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Kesehatan</button>
                    <button id="lingkungan" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Lingkungan</button>
                    <button id="pendidikan" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Pendidikan</button>
                    <button id="HAM" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">HAM</button>
                    <button id="ekonomi" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Ekonomi</button>
                    <button id="politik" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Politik</button>
                    <button id="sosial" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Sosial</button>
                    <button id="teknologi" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Teknologi</button>
                    <button id="privasi" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Privasi</button>
                    <button id="keadilan" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Keadilan</button>
                    <button id="kesejahteraan-hewan" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Kesejahteraan Hewan</button>
                    <button id="seni" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Seni</button>
                    <button id="budaya" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Budaya</button>
                    <button id="transportasi" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Transportasi</button>
                    <button id="infrastruktur" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Infrastruktur</button>
                    <button id="perdamaian" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Perdamaian</button>
                    <button id="konflik" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Konflik</button>
                    <button id="makanan" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Makanan</button>
                    <button id="kebebasan-berpendapat" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Kebebasan Berpendapat</button>
                    <button id="olahraga" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Olahraga</button>
                    <button id="disabilitas" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Disabilitas</button>
                    <button id="minoritas" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Minoritas</button>
                    <button id="lainnya" class="bg-transparent border-2 border-[#ffff] hover:border-[#e00a24] hover:text-[#e00a24] py-2 px-4 rounded-xl">Lainnya</button>
                </form>
                <div class="flex flex-col justify-end items-end h-full p-8">
                    <div class="text-sm text-white">2/3</div>
                </div>
                <div class="flex gap-10 items-center justify-end mt-4">
                    <a href="/" class="text-sm text-white underline">Batal</a>
                    <a href="/buat-petisi/judul" class="text-sm text-white bg-[#e00a24] hover:bg-[#c94958] py-2 px-4 rounded">Lanjutkan</a>
                </div>
            </div>
        </div>
    </div>
@endsection