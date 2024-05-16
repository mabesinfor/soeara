@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <section id="profil" class="relative flex py-20 lg:px-40 px-8 justify-center items-center gap-12">
        <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover size-full z-10">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="h-80 rounded-full hidden md:block">
        <div class="">
            <div class="md:text-6xl text-5xl font-bold mb-2">{{ $user->name }}</div>
            <div class="text-sm md:text-base mb-3">Saya adalah seorang mahasiswa semester 4 Jurusan Ilmu Komunikasi</div>
            <div class="flex text-[#A8A8A8] text-sm gap-4 mb-8">
                <a class="flex justify-center items-center gap-2 hover:text-[#C82323]" href="">                    
                    <svg class="size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                    </svg>                      
                    <p>Pemalang, Jawa Tengah</p>
                </a>
                <div class="">|</div>
                <a class="flex justify-center items-center gap-2 hover:text-[#C82323]" href="">
                    <svg class="size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z" clip-rule="evenodd"/>
                    </svg>                       
                    <p>@dzakoneee</p>
                </a>
            </div>
            <a href="/profil/{{ $user->slug }}/edit" class="py-2 px-4 bg-[#C82323] rounded-lg font-bold">Edit profil</a>
        </div>
    </section>
    <section id="survei">
        <div class="w-full h-20 bg-[#1e1e1e] lg:px-40 px-8 flex items-center">
            <a href="/profil/{{ $user->slug }}" class="hover:border-b-4 hover:border-[#C82323] {{ $title == 'reg' ? 'border-[#C82323] border-b-4' : '' }} px-8 self-end pb-6">Petisi saya</a>
            <a href="/profil/{{ $user->slug }}?petisi=done" class="hover:border-b-4 hover:border-[#C82323] {{ $title == 'done' ? 'border-[#C82323] border-b-4' : '' }} px-8 self-end pb-6">Petisi yang saya dukung</a>
        </div>
        <div class="relative z-20 flex flex-col items-center gap-10 my-10 md:mx-40">
            <div class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
                <div class="relative w-full md:w-1/2 rounded-lg bg-[#121212]">
                    <div class="absolute flex gap-2 items-center top-4 left-4 rounded-xl px-4 py-2 bg-[#ffffff] text-black font-bold italic">
                        <svg class="size-5 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                          </svg>                          
                        PENDING!
                    </div>
                    <img src="{{ url('img2.png') }}" class="object-cover size-full rounded-xl">
                </div>
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212] flex flex-col justify-between">
                    <div class="p-5 flex flex-col gap-4 items-start text-left">
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
                        <div class="w-full flex justify-end"><a href=""
                                class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">Berikan
                                Dukungan!</a></div>
                    </div>
                    <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                        <div class="flex gap-2 items-center cursor-pointer hover:bg-black/30 p-3 rounded-lg">
                            <img src="{{ url('like.svg') }}">
                            <small>Suka</small>
                        </div>
                        <div class="flex gap-2 items-center">
                            <img src="{{ url('support.svg') }}">
                            <small class="text-[#C82323] mr-3">5071 Pendukung</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
                <div class="relative w-full md:w-1/2 rounded-lg bg-[#121212]">
                    <div class="absolute flex gap-2 items-center top-4 left-4 rounded-xl px-4 py-2 bg-[#C82323] font-bold italic">
                        <svg class="size-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>                                                 
                        MENANG!
                    </div>
                    <img src="{{ url('img3.png') }}" class="object-cover size-full rounded-xl">
                </div>
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212] flex flex-col justify-between">
                    <div class="p-5 flex flex-col gap-4 items-start text-left">
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
                        <div class="w-full flex justify-end"><a href=""
                                class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">Berikan
                                Dukungan!</a></div>
                    </div>
                    <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                        <div class="flex gap-2 items-center cursor-pointer hover:bg-black/30 p-3 rounded-lg">
                            <img src="{{ url('like.svg') }}">
                            <small>Suka</small>
                        </div>
                        <div class="flex gap-2 items-center">
                            <img src="{{ url('support.svg') }}">
                            <small class="text-[#C82323] mr-3">5071 Pendukung</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
                <div class="relative w-full md:w-1/2 rounded-lg bg-[#121212]">
                    <div class="absolute flex gap-2 items-center top-4 left-4 rounded-xl px-4 py-2 bg-black font-bold italic">
                        <svg class="size-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                        </svg>                                                                          
                        TUTUP!
                    </div>
                    <img src="{{ url('img4.png') }}" class="object-cover size-full rounded-xl">
                </div>
                <div class="w-full md:w-1/2 rounded-lg bg-[#121212] flex flex-col justify-between">
                    <div class="p-5 flex flex-col gap-4 items-start text-left">
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
                        <div class="w-full flex justify-end"><a href=""
                                class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">Berikan
                                Dukungan!</a></div>
                    </div>
                    <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                        <div class="flex gap-2 items-center cursor-pointer hover:bg-black/30 p-3 rounded-lg">
                            <img src="{{ url('like.svg') }}">
                            <small>Suka</small>
                        </div>
                        <div class="flex gap-2 items-center">
                            <img src="{{ url('support.svg') }}">
                            <small class="text-[#C82323] mr-3">5071 Pendukung</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection