@extends('layouts.app')

@section('title', 'Mulai Buat Petisi')

@section('content')
<div x-data="{ step: 1, judul: '', deskripsi: '', foto: '' }">
    <!-- Progress bar -->
    <div class="h-2 bg-transparent">
        <div x-bind:style="'width: ' + (step * 25) + '%'" class="h-full bg-[#e00a24] transition-all duration-500 ease-in-out"></div>
    </div>
    <!-- End Progress bar -->
    <form action="{{ route('petisi.store') }}" method="POST" id="dataForm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input name="user_id" type="text" value="{{ Auth::user()->id }}" hidden>
        <div class="relative mx-auto py-8 pl-2 md:pl-0" x-show="step === 1" x-data="{
            selected: {},
            maxSelection: 3,
            selectedCount() {
                return Object.values(this.selected).filter(val => val).length;
            }
        }">
            <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover size-full z-10">
            <div class="relative z-20 flex flex-col items-start justify-center gap-4 my-10 bg-transparent">
                <div class="pl-4 pr-4 md:pl-60 md:pr-60">
                    <p class="font-bold text-2xl md:text-4xl">Kategori apa yang sesuai dengan petisimu?</p>
                    <div class="flex flex-wrap items-center gap-4 mt-12">
                        @foreach ($categories as $category)
                        <label class="hover:border-[#e00a24] hover:text-[#e00a24] cursor-pointer bg-transparent border-2 border-[#ffff] py-2 px-4 rounded-xl flex items-center"
                        :class="{ 'border-[#e00a24] text-[#e00a24]': selected['{{ $category->id }}'], 'border-[#ffff]': !selected['{{ $category->id }}'], 'pointer-events-none opacity-50': selectedCount() >= maxSelection && !selected['{{ $category->id }}'] }">
                            <input value="{{ $category->id }}" name="categories[]" type="checkbox" id="{{ $category->id }}" class="hidden" @change="if (selected['{{ $category->id }}']) { selected['{{ $category->id }}'] = false } else if (selectedCount() < maxSelection) { selected['{{ $category->id }}'] = true }" :checked="selected['{{ $category->id }}']">
                            <span>{{ $category->name }}</span>
                        </label>
                        @endforeach
                    </div>
                    <div class="flex flex-col justify-end items-end h-full p-8">
                        <div :class="{ 'text-red-500': selectedCount() >= maxSelection }" class="text-sm text-white" x-text="`${selectedCount()}/${maxSelection}`"></div>
                    </div>
                    <div class="flex gap-10 items-center justify-end mt-4">
                        <a href="/" class="text-sm text-white underline">Batal</a>
                        <button type="button" @click="step = 2" class="text-sm text-white bg-[#e00a24] hover:bg-[#c94958] py-2 px-4 rounded">Lanjutkan</button>
                    </div>
                </div>
            </div>
        </div>     
        
        <div class="relative mx-auto py-8 pl-2 md:pl-0" x-show="step === 2">
            <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover size-full z-10">
            <div class="relative z-20 flex flex-col items-start justify-center gap-4 my-10 bg-transparent">
                <div class="text-center md:text-start md:pl-60 w-full bg-transparent">
                    <p class="font-bold text-2xl md:text-4xl mb-8">Tuliskan apa yang ingin Anda sampaikan</p>
                        <div x-data="{ judulLength: 0 }" class="mt-8">
                            <div class="flex justify-between items-center">
                                <label for="judul" class="block text-md font-bold mb-2 ml-20 md:ml-0">Judul petisi</label>
                                <span x-bind:class="{ 'text-red-500': judulLength >= 90 }" class="text-sm text-white md:mr-80 mr-20" x-text="`${judulLength}/90`"></span>
                            </div>
                            <input name="title" x-on:input="judulLength = $event.target.value.length; judul = $event.target.value" maxlength="90" type="text" id="judul" class="w-3/4 px-3 py-2 bg-black border border-white focus:outline-none focus:border-[#c82323] focus:ring-0 rounded-md" placeholder="Masukkan judul petisi Anda ..." required>
                        </div>
                        <div x-data="{ deskripsiLength: 0 }" class="mt-8">
                            <div class="flex justify-between items-center">
                                <label for="deskripsi" class="block text-md font-bold mb-2 ml-20 md:ml-0">Deskripsi petisi</label>
                                <span x-bind:class="{ 'text-red-500': deskripsiLength >= 1000 }" class="text-sm text-white md:mr-80 mr-20" x-text="`${deskripsiLength}/1000`"></span>
                            </div>
                            <textarea name="desc" x-on:input="deskripsiLength = $event.target.value.length; deskripsi = $event.target.value" maxlength="1000" id="deskripsi" class="bg-black w-3/4 px-3 py-2 border border-white focus:outline-none focus:border-[#c82323] focus:ring-0 rounded-md" placeholder="Masukkan deskripsi petisi Anda ..." rows="6" required></textarea>
                        </div>                    
                    <div class="flex gap-10 items-center justify-center md:justify-end mt-10 md:mr-60">
                        <button type="button"  @click="step = 1" class="text-sm text-white underline">Kembali</button>
                        <button type="button"  @click="step = 3" class="text-sm text-white bg-[#e00a24] hover:bg-[#c94958] py-2 px-4 rounded">Lanjutkan</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative mx-auto py-8 pl-2 md:pl-0" x-show="step === 3" x-data="{ fileName: '' }">
            <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover size-full z-10">
            <div class="relative z-20 flex flex-col items-start justify-center gap-4 my-10 bg-transparent">
                <div class="text-center md:text-start md:pl-60 w-full bg-transparent">
                    <p class="font-bold text-2xl md:text-4xl mb-3">Masukkan foto yang menggambarkan masalah kamu</p>
                    <p class="text-sm">Ukuran foto minimal 1200 x 675 piksel akan terlihat bagus di semua layar</p>
                    <p class="font-bold mt-3 mb-3">Foto petisi</p>
                    <div class="relative z-30 flex flex-col gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full md:w-3/4 rounded-xl">
                        <div class="w-full h-48 rounded-lg bg-[#121212] flex items-center justify-center">
                            <label for="photo" class="ml-5 outline outline-[#e00a24] rounded-md p-3 inline-block cursor-pointer">
                                <img src="{{ url('image.svg') }}" alt="Upload Gambar" class="inline-block mr-2">
                                <span x-text="fileName ? fileName : 'Tambahkan Foto'" class="font-bold text-[#e00a24] text-md"></span>
                                <input type="file" id="photo" name="image" accept="image/" class="hidden" @change="fileName = $event.target.files[0].name; foto = URL.createObjectURL($event.target.files[0])">
                            </label>
                        </div>
                    </div>
                    <div class="flex gap-10 items-center justify-center md:justify-end mt-10 md:mr-60">
                        <button type="button" @click="step = 2" class="text-sm text-white underline">Kembali</button>
                        <button type="button" @click="step = 4" class="text-sm text-white bg-[#e00a24] hover:bg-[#c94958] py-2 px-4 rounded">Lanjutkan</button>
                    </div>
                </div>
            </div>
        </div>       
        
        <div class="relative mx-auto py-8 pl-2 md:pl-0" x-show="step === 4">
            <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover size-full z-10">
            <div class="relative z-20 flex flex-col items-start justify-center gap-4 my-10 bg-transparent">
                <div class="text-center md:text-start md:pl-60 w-full bg-transparent">
                    <p class="font-bold text-2xl md:text-4xl mb-8 w-full md:w-3/4">Petisi Anda sudah siap, klik “Buat Petisi” dan tunggu <em>Admin</em> menyetujui petisi Anda</p>
                    <div class="relative z-30 flex flex-col gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full md:w-3/4 rounded-xl">
                        <div class="w-full rounded-lg bg-[#121212] items-center justify-center p-4">
                            <p class="font-bold text-xl" x-text="judul"></p>
                            <p class="text-sm mb-4 text-justify" x-text="deskripsi"></p>
                            <img :src="foto" alt="Gambar Petisi">
                        </div>
                    </div>
                    <div class="flex gap-10 items-center justify-center md:justify-end mt-10 md:mr-60">
                        <button type="button" @click="step = 3" class="text-sm text-white underline">Kembali</button>
                        <button type="submit" class="text-sm text-white bg-[#e00a24] hover:bg-[#c94958] py-2 px-4 rounded">Buat Petisi</button>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
</div>
@endsection
