@extends('layouts.app')

@section('title', 'Mulai Buat Petisi')

@section('content')
    <div class="relative mx-auto py-8 pl-2 md:pl-0">
        <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover size-full z-10">
        <div class="relative z-20 flex flex-col items-start justify-center gap-4 my-10 bg-transparent">
            <div class="text-center md:text-start md:pl-60 w-full bg-transparent">
                <p class="font-bold text-2xl md:text-4xl mb-3">Masukan foto yang menggambarkan masalah kamu</p>
                <p class="text-sm">Ukuran foto minimal 1200 x 675 piksel akan terlihat bagus di semua layar</p>
                <p class="font-bold mt-3 mb-3">Foto petisi</p>
                <div class="relative z-30 flex flex-col gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full md:w-3/4 rounded-xl">
                    <div class="w-full h-48 rounded-lg bg-[#121212] flex items-center justify-center">
                        <form action="/upload" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="photo" class="ml-5 outline outline-[#e00a24] rounded-md p-3 inline-block cursor-pointer">
                                <img src="{{ url('image.svg') }}" alt="Upload Gambar" class="inline-block mr-2">
                                <span class="font-bold text-[#e00a24] text-md">Tambahkan Foto</span>
                                <input type="file" id="photo" name="photo" accept="image/" class="hidden">
                            </label>
                        </form>
                    </div>
                </div>
                <div class="flex gap-10 items-center justify-center md:justify-end mt-10 md:mr-60">
                    <a href="/buat-petisi/judul" class="text-sm text-white underline">Kembali</a>
                    <a href="/buat-petisi/konfirmasi" class="text-sm text-white bg-[#e00a24] hover:bg-[#c94958] py-2 px-4 rounded">Lanjutkan</a>
                </div>
            </div>
        </div>
    </div>
@endsection