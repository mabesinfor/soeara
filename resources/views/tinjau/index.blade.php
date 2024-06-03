@php
    $supportsCount = $petisi->supporters->count();
    if ($supportsCount < 5) {
        $tujuan = 5;
    } elseif ($supportsCount >= 5 && $supportsCount < 100) {
        $tujuan = 100;
    } elseif ($supportsCount >= 100 && $supportsCount < 1000) {
        $tujuan = 1000;
    } else {
        $tujuan = 10000;
    }
@endphp

@extends('layouts.app')

@section('title', 'Dashboard Petisi')

@section('content')
    <div class="md:pl-60 p-8 w-5/6 pl-12">
        {{-- Start Judul --}}
        <h1 class="font-bold text-3xl">{{ $petisi->title }}</h1>
        {{-- End Judul --}}

        {{-- Start Button --}}
        <div class="flex flex-col sm:flex-row gap-4 mt-8">
            <a id="edit"
                class="bg-transparent border border-[#ffff] text-[#fff] py-2 px-4 rounded-xl flex items-center gap-2 cursor-pointer">
                <img src="{{ url('edit.svg') }}" alt="editIcon" class="w-4 h-4">
                Edit
            </a>
            <a id="visit"
                href="{{ route('petisi.show', ['slug' => $petisi->slug]) }}"
                target="_blank"
                class="bg-transparent border border-[#ffff] text-[#fff] py-2 px-4 rounded-xl flex items-center gap-2 cursor-pointer">
                <img src="{{ url('visit.svg') }}" alt="editIcon" class="w-4 h-4">
                Kunjungi petisi
            </a>
            <a id="delete"
                class="bg-transparent border border-[#e00a24] text-[#e00a24] py-2 px-4 rounded-xl flex items-center gap-2 cursor-pointer">
                <img src="{{ url('delete.svg') }}" alt="editIcon" class="w-4 h-4">
                Hapus petisi
            </a>
            <a id="closed"
                class="bg-transparent border border-[#e00a24] text-[#e00a24] py-2 px-4 rounded-xl flex items-center gap-2 cursor-pointer">
                <img src="{{ url('closed.svg') }}" alt="editIcon" class="w-4 h-4">
                Tutup petisi
            </a>
            <a id="victory"
                class="bg-[#e00a24] border border-[#e00a24] text-[#fff] py-2 px-4 rounded-xl flex items-center gap-2 cursor-pointer">
                Nyatakan kemenangan!
            </a>
        </div>
        {{-- End Button --}}

        <hr class="mt-10">

        {{-- Start Tinjau Petisi --}}
        <p class="mt-8 font-bold text-2xl mb-3">Tinjauan petisi Anda</p>
        <div class="bg-[#1E1E1E] flex flex-col md:flex-row gap-4 p-6 rounded-xl">
            {{-- Start Progress Bar --}}
            <div id="bar" class="w-full md:w-3/4 p-4 ml-4">
                <div class="text-center">
                    <l-zoomies
                        size="40"
                        stroke="5"
                        stroke-length="0.25"
                        bg-opacity="0.1"
                        speed="0.8" 
                        color="red" 
                    >
                    </l-zoomies>
                </div>
            </div>
            {{-- End Progress Bar --}}

            {{-- Start Like n Share Button --}}
            <div>
                <div class="flex items-center p-4 gap-2">
                    <img src="{{ url('like.svg') }}" alt="likeIcon">
                    <span>{{ $petisi->likes->count() }} Suka</span>
                </div>
                <div class="flex items-center p-4 gap-2">
                    <img src="{{ url('share.svg') }}" alt="shareIcon">
                    <span>34 Pembagian Petisi</span>
                </div>
            </div>
            {{-- End Like n Share Button --}}
        </div>
        {{-- End Tinjau Petisi --}}

        {{-- Start Tanggapan n Pendukung --}}
        <div class="bg-[#1E1E1E] flex p-6 rounded-xl mt-12">
            <div class="font-bold text-xl w-full">
                Tanggapan mahasiswa
            </div>
            <div class="font-bold text-xl w-full ml-20 pl-4" id="supporterDiv">
                Pendukung petisi Anda
            </div>
        </div>
        {{-- End Tanggapan n Pendukung --}}

        <div class="flex flex-col md:flex-row">
            {{-- Start Tanggapan --}}
            <div class="w-full ml-4" id="comments-container">
                <span class="flex justify-center my-4 md:ml-20">
                    <l-ring-2
                        size="40"
                        stroke="5"
                        stroke-length="0.25"
                        bg-opacity="0.1"
                        speed="0.8" 
                        color="red" 
                    >
                    </l-ring-2>
                </span>
            </div>
            {{-- End Tanggapan --}}

            {{-- Start muncul ketika resolusi layar mobile --}}
            <div class="bg-[#1E1E1E] flex p-6 rounded-xl mt-12" id="mobileDiv">
                <div class="font-bold text-xl w-full">
                    Pendukung petisi Anda
                </div>
            </div>
            {{-- End muncul ketika resolusi layar mobile --}}

            {{-- Start Pendukung --}}
            <div class="w-full mt-4 ml-20" id="supporters-container">
                <l-ring-2
                    size="40"
                    stroke="5"
                    stroke-length="0.25"
                    bg-opacity="0.1"
                    speed="0.8" 
                    color="red" 
                >
                </l-ring-2>
            </div>
            {{-- End Pendukung --}}
        </div>
    </div>

    <script>
        window.addEventListener('resize', checkSize);
        window.addEventListener('DOMContentLoaded', checkSize);
        
        function checkSize() {
            const supporterDiv = document.getElementById('supporterDiv');
            if (window.innerWidth <= 768) {
                if (supporterDiv) {
                    supporterDiv.style.display = 'none';
                }
            } else {
                if (supporterDiv) {
                    supporterDiv.style.display = 'block';
                }
            }
            const mobileDiv = document.getElementById('mobileDiv');
            if (window.innerWidth <= 768) {
                if (mobileDiv) {
                    mobileDiv.style.display = 'block';
                }
            } else {
                if (mobileDiv) {
                    mobileDiv.style.display = 'none';
                }
            }
        }
    </script>
@endsection

@section('javascripts')
<script type="text/javascript">
$(document).ready(function () {
    $('#bar').load(
        '{{ route('petisi.bar', ['slug' => $petisi->slug]) }}'
    );

    $('#comments-container').load(
        '{{ route('tinjau.comments.index', ['slug' => $petisi->slug]) }}'
    );

    $('#supporters-container').load(
        '{{ route('tinjau.supporters.index', ['slug' => $petisi->slug]) }}'
    );
});
</script>
@endsection