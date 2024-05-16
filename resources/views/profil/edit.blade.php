@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <section id="edit-profil" class="px-40 py-20 w-full">
        <form action="" class="flex flex-col justify-center items-center w-full">
            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="size-60 rounded-full">
            <div class="mt-12 flex gap-12 mb-20">
                <button class="py-2 px-4 outline outline-[#c82323] hover:bg-[#c82323] rounded-lg font-bold transition-all">
                    Unggah foto
                </button>
                <button class="underline hover:text-[#c82323] font-bold transition-all">
                    Hapus foto
                </button>
            </div>
            <div class="flex flex-col w-full px-40">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Nama lengkap</div>
                    <div class="text-sm">19/50</div>
                </div>
                <input name="name" type="text" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0" value="{{ $user->name }}" placeholder="Masukan nama anda!" required>
            </div>
            <div class="flex flex-col mt-8 w-full px-40">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Deskripsi diri</div>
                    <div class="text-sm">54/100</div>
                </div>
                <textarea name="bio" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0"></textarea>
            </div>
            <div class="flex flex-col mt-8 w-full px-40">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Provinsi</div>
                </div>
                <select name="province" id="province" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0">
                    <option value="" disabled selected class="bg-[#121212] text-white">Pilih provinsi anda!</option>
                </select>
            </div>
            <div class="flex flex-col mt-8 w-full px-40">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Kota/Kabupaten</div>
                </div>
                <select name="district" id="district" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0">
                    <option value="" disabled selected class="bg-[#121212] text-white">Pilih kota/kabupaten anda!</option>
                </select>
            </div>
            <div class="flex gap-12 mt-8 items-center">
                <button class="py-2 px-4 bg-[#c82323] rounded-lg font-bold">
                    Simpan
                </button>
                <a href="/profil/{{ $user->slug }}" class="underline hover:text-[#c82323] font-bold transition-all">Batalkan</a>
            </div>
        </form>
    </section>
@endsection