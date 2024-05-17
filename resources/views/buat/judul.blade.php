@extends('layouts.app')

@section('title', 'Mulai Buat Petisi')

@section('content')
    <div class="relative mx-auto py-8 pl-2 md:pl-0">
        <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover size-full z-10">
        <div class="relative z-20 flex flex-col items-start justify-center gap-4 my-10 bg-transparent">
            <div class="text-center md:text-start md:pl-60 w-full bg-transparent">
                <p class="font-bold text-2xl md:text-4xl mb-8">Tuliskan apa yang ingin Anda sampaikan</p>
                <form action="" method="post">
                    @csrf
                    <div class="mt-8">
                        <div class="flex justify-between items-center">
                            <label for="judul" class="block text-md font-bold mb-2 ml-20 md:ml-0">Judul petisi</label>
                            <span class="text-sm text-white md:mr-80 mr-20">67/90</span>
                        </div>
                        <input type="text" id="judul" name="judul" class="bg-black w-3/4 px-3 py-2 border rounded-md" placeholder="Masukkan judul petisi Anda ...">
                    </div>
                    <div class="mt-8">
                        <div class="flex justify-between items-center">
                            <label for="deskripsi" class="block text-md font-bold mb-2 ml-20 md:ml-0">Deskripsi petisi</label>
                            <span class="text-sm text-white md:mr-80 mr-20">373/1000</span>
                        </div>
                        <textarea id="deskripsi" name="deskripsi" class="bg-black w-3/4 px-3 py-2 border border-[#e00a24] rounded-md" placeholder="Masukkan deskripsi petisi Anda ..." rows="6"></textarea>
                    </div>
                </form>
                <div class="flex gap-10 items-center justify-center md:justify-end mt-10 md:mr-60">
                    <a href="/buat-petisi" class="text-sm text-white underline">Kembali</a>
                    <a href="/buat-petisi/foto" class="text-sm text-white bg-[#e00a24] hover:bg-[#c94958] py-2 px-4 rounded">Lanjutkan</a>
                </div>
            </div>
        </div>
    </div>
@endsection