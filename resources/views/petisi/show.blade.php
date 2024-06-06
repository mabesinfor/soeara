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

@section('title', $petisi->title)

@section('content')
    {{-- Start Judul --}}
    <div class="flex items-center justify-center p-6">
        <h1 class="text-2xl text-center font-bold">{{ $petisi->title }}</h1>
    </div>
    {{-- End Judul --}}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- Start Konten Petisi --}}
        <div class="bg-transparent p-4 col-span-2 md:ml-20">
            <div class="relative z-30 flex flex-col gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl md:ml-20">
                <div class="w-full rounded-lg bg-[#121212]">
                    <img src="{{ asset('storage/' . $petisi->image) }}" class="object-cover size-full rounded-xl">
                </div>
                <div class="w-full rounded-lg bg-[#121212] flex flex-col justify-between">
                    <div class="p-5 flex flex-col gap-4 items-start text-left">
                        <div class="flex justify-between w-full">
                            <small class="opacity-50">{{ $petisi->categories->pluck('name')->implode(' | ') }}</small>
                            <small class="opacity-50">{{ $petisi->created_at->format('d/m/Y') }}</small>
                        </div>
                        <a href="/profil/{{ $petisi->user->slug }}" class="flex items-center gap-4">
                            <img src="{{ url('pic3.svg') }}">
                            <small>{{ $petisi->user->name }}</small>
                        </a>
                        <div class="flex flex-col gap-2">
                            <b>{{ $petisi->title }}</b>
                            <p class="opacity-80 text-justify">{!! $petisi->desc !!}</p>
                        </div>
                    </div>
                    <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                        <div class="{{ Auth::check() && $petisi->likes->where('pivot.petition_id', $petisi->id)->where('pivot.user_id', Auth::user()->id)->isNotEmpty() ? 'text-[#C82323]' : '' }} hover:bg-black/30">
                            @if (Auth::check() && $petisi->likes->where('pivot.petition_id', $petisi->id)->where('pivot.user_id', Auth::user()->id)->isNotEmpty())
                                <!-- Form untuk 'unlike' -->
                                <form action="{{ route('petitions.unlike', $petisi) }}" method="post" class="flex gap-2 items-center cursor-pointer hover:bg-black/30 p-3 rounded-lg text-[#C82323]">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full h-full flex items-center gap-2">
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="text-[#C82323]">
                                            <path d="M11.7861 4.28543L7.60742 3.96399L8.22352 1.56926C8.38424 0.856732 8.20262 0.447699 7.62162 0.267425L6.69239 0.00357569C6.6704 -0.00225284 6.64712 -0.000929677 6.62593 0.00735371C6.60474 0.0156371 6.58674 0.0304506 6.57453 0.0496487L3.11904 5.46967C3.09988 5.50084 3.07305 5.52658 3.04112 5.54445C3.00919 5.56231 2.97322 5.5717 2.93663 5.57173H0V11.1428H3.15038C3.28859 11.1428 3.42589 11.165 3.55701 11.2087L5.60083 11.8899C5.81935 11.9628 6.04818 12 6.27853 12H11.0447C11.5536 12 11.8885 11.6378 11.9884 11.1385L12.8576 7.32786V5.3569C12.8576 4.76598 12.3755 4.339 11.7861 4.28543Z"/>
                                        </svg>
                                        <small>{{ $petisi->likes->count() }} Suka</small>
                                    </button>
                                </form>
                            @else
                                <!-- Form untuk 'like' -->
                                <form action="{{ route('petitions.like', $petisi) }}" method="post" class="flex gap-2 items-center cursor-pointer hover:bg-black/30 p-3 rounded-lg">
                                    @csrf
                                    <button type="submit" class="w-full h-full flex items-center gap-2">
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.7861 4.28543L7.60742 3.96399L8.22352 1.56926C8.38424 0.856732 8.20262 0.447699 7.62162 0.267425L6.69239 0.00357569C6.6704 -0.00225284 6.64712 -0.000929677 6.62593 0.00735371C6.60474 0.0156371 6.58674 0.0304506 6.57453 0.0496487L3.11904 5.46967C3.09988 5.50084 3.07305 5.52658 3.04112 5.54445C3.00919 5.56231 2.97322 5.5717 2.93663 5.57173H0V11.1428H3.15038C3.28859 11.1428 3.42589 11.165 3.55701 11.2087L5.60083 11.8899C5.81935 11.9628 6.04818 12 6.27853 12H11.0447C11.5536 12 11.8885 11.6378 11.9884 11.1385L12.8576 7.32786V5.3569C12.8576 4.76598 12.3755 4.339 11.7861 4.28543Z"/>
                                        </svg>
                                        <small>{{ $petisi->likes->count() }} Suka</small>
                                    </button>
                                </form>
                            @endif
                        </div>
                        <div class="flex gap-2 items-center">
                            <img src="{{ url('support.svg') }}">
                            <small class="text-[#C82323] mr-3">{{ $petisi->supporters->count() }} Pendukung</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Konten Petisi --}}

        {{-- Start Dukung Petisi --}}
        <div class="flex flex-col items-center md:items-start bg-transparent p-4 col-span-2 md:ml-20">
            {{-- Start Progress Bar --}}
            <div id="bar" class="w-full">
                <div class="text-center mr-40">
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

            <span id="support" class="w-full mt-2">
                @if (Auth::check())
                    @if ($petisi->supporters()->where('user_id', Auth::user()->id)->where('petition_id', $petisi->id)->exists())                                                                                                  
                        <div class="flex flex-col gap-4 w-full md:w-3/4 mt-5">
                            <div class="w-full p-2 rounded-md bg-transparent border border-gray-600 mt-3">Berkat dukunganmu, petisi ini punya kemungkinan untuk menang! Kita hanya butuh {{ $tujuan - $petisi->supporters->count() }} dukungan lagi untuk tonggak target berikutnya - kamu bisa bantu?</div>
                            <a href="/bagikan/{{ $petisi->slug }}" class="text-center w-full bg-[#C82323] hover:bg-[#dc4d4d] text-white rounded-xl px-4 py-2 font-bold italic">Bagikan Petisi</a>
                        </div>
                    @else
                        <h3 class="text-2xl text-center md:text-start font-bold mb-3 mt-5">Dukung petisi ini</h3>
                        <div class="flex items-center gap-4 mb-4 justify-center md:justify-start">
                            <img src="{{ Auth::user()->avatar ? (filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL) ? Auth::user()->avatar : asset('storage/' . Auth::user()->avatar)) : asset('user.jpg') }}" class="rounded-full size-8">
                            {{ optional(Auth::user())->name ?? 'Visitor' }}
                        </div>
                        <p class="opacity-80 text-center md:text-start">Saya mendukung petisi ini karena ... (tidak wajib)</p>
                        <form id="supportForm" action="javascript:void(0)" method="POST" class="w-full md:w-3/4">
                            @csrf
                            <input name="petition_id" type="hidden" value="{{ $petisi->id }}">
                            <input name="user_id" type="text" value="{{ Auth::user()->id }}" hidden>
                            <textarea name="content" class="w-full p-2 rounded-md bg-transparent border border-gray-600 mt-3"></textarea>
                            <button type="submit" class="w-full mt-2 bg-[#C82323] hover:bg-[#dc4d4d] text-white rounded-xl px-4 py-2 font-bold italic">Dukung Petisi Ini</button>
                        </form>
                    @endif
                @else
                    <h3 class="text-2xl text-center md:text-start font-bold mb-3 mt-5">Dukung petisi ini</h3>
                    <a href="/login" class="mt-2 bg-[#C82323] hover:bg-[#dc4d4d] text-white rounded-xl px-4 py-2 font-bold italic">Masuk untuk mendukung petisi!</a>
                @endif
            </span>
        </div>
        {{-- End Dukung Petisi --}}

        <div class="bg-transparent w-full p-4 col-span-2 md:ml-20">
            <h3 class="text-2xl text-start font-bold mb-7 md:ml-20">{{ $petisi->comments->count() }} Komentar</h3>
            {{-- Start submit komentar --}}
            <div class="flex items-start gap-4 mb-4 md:ml-20">
                @if (Auth::check())
                    <img src="{{ Auth::user()->avatar ? (filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL) ? Auth::user()->avatar : asset('storage/' . Auth::user()->avatar)) : asset('user.jpg') }}" class="rounded-full size-8">
                @endif
                <div class="flex flex-col w-full relative">
                    <form action="/submitkomen" method="post" onsubmit="return checkLogin()">
                        @csrf
                        <input type="hidden" name="petisi_id" value="{{ $petisi->id }}">
                        <textarea name="content" class="w-full mb-20 h-20 pb-10 p-2 rounded-md bg-transparent border border-gray-600" placeholder="Tambahkan komentar ..."></textarea>
                        <button type="submit" class="absolute right-0 bottom-6 bg-[#C82323] hover:bg-[#dc4d4d] text-white rounded-xl px-4 py-2">Kirim Komentar</button>
                    </form>
                </div>
            </div>
            {{-- End submit komentar --}}

            {{-- Separate comments view start --}}
            <div id="comments-container">
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
            {{-- Separate comments view End --}}
        </div>
    </div>
    <div class="w-full md:w-1/2 md:ml-20 flex p-5 mb-20 cursor-pointer" id="show-all-comments">
        <div class="relative z-30 flex p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl md:ml-20">
            <div class="w-full rounded-lg bg-[#121212] py-3 px-6 md:px-50 text-center">
                <p>Lihat lebih banyak komentar</p>
            </div>
        </div>
    </div>

<!-- Modal -->
<div id="comments-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-40 close-modal">
    <div class="bg-[#1e1e1e] w-full md:w-2/3 rounded-lg p-6 max-h-2/3 overflow-scroll overflow-y-auto md:px-12 md:py-4">
        <button class="absolute top-4 right-4 text-white close-modal">&times;</button>
        <div id="comments-container-modal">
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
    </div>
</div>
@endsection

@section('javascripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#show-all-comments').click(function() {
            $('#comments-modal').removeClass('hidden');
            $('#comments-container-modal').load('{{ route('comments.show', ['slug' => $petisi->slug]) }}');
        });

        $('.close-modal').click(function() {
            $('#comments-modal').addClass('hidden');
        });

        $('#comments-container').load(
            '{{ route('comments.index', ['slug' => $petisi->slug]) }}'
        );

        $('#bar').load(
            '{{ route('petisi.bar', ['slug' => $petisi->slug]) }}'
        );

        $('#supportForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('petisi.support') }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if(response.message === 'success') {
                        $('#support').html(`
                            <div class="flex flex-col gap-4 w-full md:w-3/4 mt-5">
                                <div class="w-full p-2 rounded-md bg-transparent border border-gray-600 mt-3">
                                    Berkat dukunganmu, petisi ini punya kemungkinan untuk menang! Kita hanya butuh ` + ({{ $tujuan }} - {{ $supportsCount }} + 1) + ` dukungan lagi untuk tonggak target berikutnya - kamu bisa bantu?
                                </div>
                                <a href="/support" class="text-center w-full bg-[#C82323] hover:bg-[#dc4d4d] text-white rounded-xl px-4 py-2 font-bold italic">Bagikan Petisi</a>
                            </div>
                        `),
                        $('#comments-container').load(
                            '{{ route('comments.index', ['slug' => $petisi->slug]) }}'
                        ),
                        $('#bar').load(
                            '{{ route('petisi.bar', ['slug' => $petisi->slug]) }}'
                        );
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Display any error messages in the console
                }
            });
        });
    });
</script>
@endsection