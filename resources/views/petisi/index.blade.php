@extends('layouts.app')

@section('title', 'Telusuri Petisi')

@section('content')
    <div class="relative py-8 pl-2 mx-auto md:pl-0">
        <img src="{{ url('clip2.svg') }}" class="absolute inset-0 z-10 object-cover size-full">
        <div class="relative z-20 flex flex-col items-center gap-10 my-10 md:mx-40">
            <div class="w-full">
                <p>Cari Petisi</p>
                <form action="{{ route('petisi.search') }}" method="GET" class="flex items-center w-full gap-4">
                    <input type="text" name="search" id="search"
                        class="mt-2 border border-white bg-[#121212] rounded-lg py-3 px-4 w-4/5 placeholder-white/70"
                        placeholder="Cari judul atau pembuat petisi...">
                    <select name="category" id="category"
                        class="mt-2 border border-white bg-[#121212] rounded-lg py-3 px-4 w-1/5 placeholder-white/70">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="h-fit w-1/5 bg-[#e00a24] rounded-xl mt-[6px] transition ease-in-out duration-500 hover:bg-[#c94958]">
                        <button type="submit"
                        class="flex items-center justify-center w-full gap-2 py-4 font-semibold">
                        <img src="{{ url('search.svg') }}" class="size-4">
                        <span class="hidden md:flex">Cari Petisi</span>
                    </button>
                    </div>
                </form>
            </div>
            @if($petisis->isEmpty())
                <p>Maaf, hasil pencarian tidak ditemukan.</p>
            @else
                @foreach ($petisis as $petisi)
                <div class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
                    <div class="w-full md:w-1/2 rounded-lg bg-[#121212]">
                        <img src="{{ $petisi->image ? asset('storage/' . $petisi->image) : 'https://source.unsplash.com/1200x400?' . urlencode($petisi->title) }}" class="object-cover size-full rounded-xl" alt="{{ $petisi->title }}">
                    </div>
                    <div class="w-full md:w-1/2 rounded-lg bg-[#121212] flex flex-col justify-between">
                        <div class="p-5 flex flex-col gap-4 items-start text-left">
                            <div class="flex justify-between w-full">
                                <small class="opacity-50">{{ $petisi->categories->pluck('name')->implode(' | ') }}</small>
                                <small class="opacity-50">{{ $petisi->created_at->format('d/m/Y') }}</small>
                            </div>
                            <div class="flex items-center gap-4">
                                <img src="{{ $petisi->user->avatar ? (filter_var($petisi->user->avatar, FILTER_VALIDATE_URL) ? $petisi->user->avatar : asset('storage/' . $petisi->user->avatar)) : asset('user.jpg') }}" class="size-8 rounded-full">
                                <small>{{ $petisi->user->name }}</small>
                            </div>
                            <div class="flex flex-col gap-2">
                                <b>{{ $petisi->title }}</b>
                                <small class="opacity-80">{!! Str::limit($petisi->desc, 100) !!}</small>
                                <a href="{{ route('petisi.show', $petisi->slug) }}">
                                    <small class="underline text-[#C82323] hover:text-[#dc4d4d] font-semibold">Baca Selanjutnya</small>
                                </a>
                            </div>
                            <div class="w-full flex justify-end">
                                <a href="{{ route('petisi.show', $petisi->slug) }}" class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">Berikan Dukungan!</a>
                            </div>
                        </div>
                        <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                            <div x-data="petitionLikeData({{ $petisi->id }}, @js(Auth::check() && $petisi->likes->where('pivot.petition_id', $petisi->id)->where('pivot.user_id', Auth::user()->id)->isNotEmpty()), @js($petisi->likes->count()))" :class="{ 'text-[#C82323]': liked }" class="flex gap-2 items-center p-3 rounded-lg hover:bg-black/30">
                                <form x-on:submit.prevent="submitForm">
                                    @csrf
                                    <button type="submit" class="w-full h-full flex items-center gap-2" :disabled="loading">
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg" :class="{ 'text-[#C82323]': liked }">
                                            <path d="M11.7861 4.28543L7.60742 3.96399L8.22352 1.56926C8.38424 0.856732 8.20262 0.447699 7.62162 0.267425L6.69239 0.00357569C6.6704 -0.00225284 6.64712 -0.000929677 6.62593 0.00735371C6.60474 0.0156371 6.58674 0.0304506 6.57453 0.0496487L3.11904 5.46967C3.09988 5.50084 3.07305 5.52658 3.04112 5.54445C3.00919 5.56231 2.97322 5.5717 2.93663 5.57173H0V11.1428H3.15038C3.28859 11.1428 3.42589 11.165 3.55701 11.2087L5.60083 11.8899C5.81935 11.9628 6.04818 12 6.27853 12H11.0447C11.5536 12 11.8885 11.6378 11.9884 11.1385L12.8576 7.32786V5.3569C12.8576 4.76598 12.3755 4.339 11.7861 4.28543Z"/>
                                        </svg>
                                        <small x-text="likesCountText"></small>
                                        <div x-show="loading" class="ml-2">
                                            <svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                        </div>
                                    </button>
                                </form>
                            </div>
                            <div class="flex gap-2 items-center">
                                <img src="{{ asset('support.svg') }}">
                                <small class="text-[#C82323] mr-3">{{ $petisi->supporters->count() }} Pendukung</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            @if(!$petisis->isEmpty())
                <div class="flex justify-center w-full">
                    <div class="relative z-30 flex p-2 bg-[#303030]/50 ring-1 ring-[#646464] rounded-xl gap-2 text-[#C82323] font-bold">
                        <!-- Link ke halaman sebelumnya -->
                        @if (!$petisis->onFirstPage())
                            <a href="{{ $petisis->previousPageUrl() }}" class="rounded-lg bg-[#121212] hover:bg-[#2f2f2f] p-3 flex items-center">
                                <img src="{{ url('play.svg') }}" class="size-3 scale-x-[-1]">
                            </a>
                        @endif
            
                        <!-- Link ke setiap halaman -->
                        @foreach (range(1, $petisis->lastPage()) as $page)
                            @if ($page == $petisis->currentPage())
                                <button class="rounded-lg bg-[#C82323] hover:bg-[#be4141] p-3 text-[#121212] flex items-center">{{ $page }}</button>
                            @else
                                <a href="{{ $petisis->url($page) }}" class="rounded-lg bg-[#121212] hover:bg-[#2f2f2f] p-3 flex items-center">{{ $page }}</a>
                            @endif
                        @endforeach
            
                        <!-- Link ke halaman berikutnya -->
                        @if ($petisis->hasMorePages())
                            <a href="{{ $petisis->nextPageUrl() }}" class="rounded-lg bg-[#121212] hover:bg-[#2f2f2f] p-3 flex items-center">
                                <img src="{{ url('play.svg') }}" class="size-3">
                            </a>
                        @endif
                    </div>
                </div>
            @endif
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

@section('javascripts')
<script type="text/javascript">
    function petitionLikeData(petitionId, initiallyLiked, initialLikesCount) {
        return {
            liked: initiallyLiked,
            likesCount: initialLikesCount,
            loading: false,
            auth: @js(Auth::check()),
    
            get likesCountText() {
                return this.likesCount === 0 ? '0 Suka' : `${this.likesCount} Suka`;
            },
    
            async submitForm() {
                if (!this.auth) {
                    window.location.href = '/login';
                    return;
                }
                this.loading = true;
                const url = this.liked ? `/petitions/${petitionId}/unlike` : `/petitions/${petitionId}/like`;
                const method = this.liked ? 'DELETE' : 'POST';
    
                try {
                    const response = await fetch(url, {
                        method: method,
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    });
    
                    const data = await response.json();
                    if (response.ok) {
                        this.liked = !this.liked;
                        this.likesCount = data.likesCount;
                    } else {
                        console.error('An error occurred:', data.message);
                    }
                } catch (error) {
                    console.error('An error occurred:', error);
                } finally {
                    this.loading = false;
                }
            },
        }
    }
</script>
@endsection
