@if ($petitions->isNotEmpty())
    @foreach ($petitions as $petition)
    <div class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
        <div class="top-8 left-8 absolute px-4 py-2 rounded font-bold italic bg-white text-black">{{ Str::upper($petition->status) }}!!</div>
        <div class="w-full md:w-1/2 rounded-lg bg-[#121212]">
            <img src="{{ $petition->image ? asset('storage/' . $petition->image) : 'https://source.unsplash.com/1200x400?' . urlencode($petition->title) }}" class="object-cover size-full rounded-xl" alt="{{ $petition->title }}">
        </div>
        <div class="w-full md:w-1/2 rounded-lg bg-[#121212] flex flex-col justify-between">
            <div class="p-5 flex flex-col gap-4 items-start text-left">
                <div class="flex justify-between w-full">
                    <small class="opacity-50">
                        @if ($petition->categories->isNotEmpty())
                            <p>
                                {{ $petition->categories->pluck('name')->implode(' | ') }}
                            </p>
                        @else
                            Tidak ada kategori
                        @endif
                    </small>
                    <small class="opacity-50">{{ $petition->created_at->format('d/m/Y') }}</small>
                </div>
                <a target="_blank" href="{{ route('profil.show', ['slug' => $petition->user->slug]) }}" class="flex items-center gap-4">
                    <img class="size-8 rounded-full" src="{{ $petition->user->avatar ? (filter_var($petition->user->avatar, FILTER_VALIDATE_URL) ? $petition->user->avatar : asset('storage/' . $petition->user->avatar)) : asset('user.jpg') }}">
                    <small>{{ $petition->user->name }}</small>
                </a>
                <div class="flex flex-col gap-2">
                    <b>{{ $petition->title }}</b>
                    <small class="opacity-80">{!! Str::limit($petition->desc, 100) !!}</small>
                    <a href="{{ Auth::check() ? ($petition->user_id == Auth::user()->id ? route('tinjau.show', ['slug' => $petition->slug]) : route('petisi.show', ['slug' => $petition->slug])) : route('petisi.show', ['slug' => $petition->slug]) }}">
                        <small class="underline text-[#C82323] hover:text-[#dc4d4d] font-semibold">Baca Selanjutnya</small>
                    </a>
                </div>
                <div class="w-full flex justify-end">
                    <a href="{{ Auth::check() ? ($petition->user_id == Auth::user()->id ? route('tinjau.show', ['slug' => $petition->slug]) : route('petisi.show', ['slug' => $petition->slug])) : route('petisi.show', ['slug' => $petition->slug]) }}" class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">{{ Auth::check() ? ($petition->user_id == Auth::user()->id ? 'Tinjau petisi Anda!' : 'Berikan Dukungan!') : 'Berikan Dukungan!' }}</a>
                </div>
            </div>
            <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                <div x-data="petitionLikeData({{ $petition->id }}, @js(Auth::check() && $petition->likes->where('pivot.petition_id', $petition->id)->where('pivot.user_id', Auth::user()->id)->isNotEmpty()), @js($petition->likes->count()))" :class="{ 'text-[#C82323]': liked }" class="flex gap-2 items-center p-3 rounded-lg hover:bg-black/30">
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
                    <small class="text-[#C82323] mr-3">{{ $petition->supporters->count() }} Pendukung</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <p class="font-black">Tidak ada petisi</p>
@endif


