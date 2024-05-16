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
            <div
                class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212]">
                    <img src="{{ url('img2.png') }}" class="object-cover size-full rounded-xl">
                </div>
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212] flex flex-col justify-between">
                    <div class="flex flex-col items-start gap-4 p-5 text-left">
                        <div class="flex justify-between w-full">
                            <small class="opacity-50">Sosial</small>
                            <small class="opacity-50">02/12/2023</small>
                        </div>
                        <div class="flex items-center gap-4">
                            <img src="{{ url('pic2.svg') }}">
                            <small>Putri Aisyah Qomariyah</small>
                        </div>
                        <div class="flex flex-col gap-2">
                            <b>Stop Komdis Marah-Marah Pada Masa Ospek Jurusan! </b>
                            <small class="opacity-80">Pemangku kepentingan harus segera menghentikan praktik marah-marah
                                yang sering terjadi selama masa orientasi studi di berbagai jurusan. Perilaku tersebut tidak
                                hanya tidak mendidik ...</small>
                            <a href=""><small
                                    class="underline text-[#C82323] hover:text-[#dc4d4d] font-semibold">Baca
                                    Selanjutnya</small></a>
                        </div>
                        <div class="flex justify-end w-full"><a href=""
                                class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">Berikan
                                Dukungan!</a></div>
                    </div>
                    <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                        <div class="flex items-center gap-2 p-3 rounded-lg cursor-pointer hover:bg-black/30">
                            <img src="{{ url('like.svg') }}">
                            <small>Suka</small>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{ url('support.svg') }}">
                            <small class="text-[#C82323] mr-3">5071 Pendukung</small>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212]">
                    <img src="{{ url('img3.png') }}" class="object-cover size-full rounded-xl">
                </div>
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212] flex flex-col justify-between">
                    <div class="flex flex-col items-start gap-4 p-5 text-left">
                        <div class="flex justify-between w-full">
                            <small class="opacity-50">Sosial | Lingkungan</small>
                            <small class="opacity-50">24/02/2022</small>
                        </div>
                        <div class="flex items-center gap-4">
                            <img src="{{ url('pic3.svg') }}">
                            <small>Maulana Rizqy Ridho</small>
                        </div>
                        <div class="flex flex-col gap-2">
                            <b>Unsoed Darurat Pelecehan Seksual! Bentuk Tim Investigasi Independent!</b>
                            <small class="opacity-80">Dalam menghadapi situasi darurat pelecehan seksual di lingkungan
                                Unsoed, penting untuk segera membentuk tim investigasi independen yang bertugas untuk
                                menyelidiki kasus-kasus ...</small>
                            <a href=""><small
                                    class="underline text-[#C82323] hover:text-[#dc4d4d] font-semibold">Baca
                                    Selanjutnya</small></a>
                        </div>
                        <div class="flex justify-end w-full"><a href=""
                                class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">Berikan
                                Dukungan!</a></div>
                    </div>
                    <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                        <div class="flex items-center gap-2 p-3 rounded-lg cursor-pointer hover:bg-black/30">
                            <img src="{{ url('like.svg') }}">
                            <small>Suka</small>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{ url('support.svg') }}">
                            <small class="text-[#C82323] mr-3">5071 Pendukung</small>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212]">
                    <img src="{{ url('img4.png') }}" class="object-cover size-full rounded-xl">
                </div>
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212] flex flex-col justify-between">
                    <div class="flex flex-col items-start gap-4 p-5 text-left">
                        <div class="flex justify-between w-full">
                            <small class="opacity-50">Transportasi dan Infrastruktur</small>
                            <small class="opacity-50">13/03/2024</small>
                        </div>
                        <div class="flex items-center gap-4">
                            <img src="{{ url('pic4.svg') }}">
                            <small>Raden Mas Said</small>
                        </div>
                        <div class="flex flex-col gap-2">
                            <b>Benahi Aspal Jalan dan Parkiran di Fakultas Teknik Unsoed!</b>
                            <small class="opacity-80">Kami, mahasiswa akademik Fakultas Teknik Universitas Jenderal
                                Soedirman (Unsoed), dengan ini menyuarakan keprihatinan kami terhadap kondisi infrastruktur
                                yang memprihatinkan ...</small>
                            <a href=""><small
                                    class="underline text-[#C82323] hover:text-[#dc4d4d] font-semibold">Baca
                                    Selanjutnya</small></a>
                        </div>
                        <div class="flex justify-end w-full"><a href=""
                                class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">Berikan
                                Dukungan!</a></div>
                    </div>
                    <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                        <div class="flex items-center gap-2 p-3 rounded-lg cursor-pointer hover:bg-black/30">
                            <img src="{{ url('like.svg') }}">
                            <small>Suka</small>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{ url('support.svg') }}">
                            <small class="text-[#C82323] mr-3">5071 Pendukung</small>
                        </div>
                    </div>
                </div>
            </div>
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
