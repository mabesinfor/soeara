@if ($petitions->isNotEmpty())
    @foreach ($petitions as $petition)
    <div class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">          
        <div 
            class="flex gap-2 items-center top-8 left-8 absolute px-4 py-2 rounded font-bold italic
                {{ $petition->status == 'pending' ? 'bg-white text-black' : '' }}
                {{ $petition->status == 'win' ? 'bg-[#C82323] text-white' : ($petition->user_id !== Auth::user()->id ? 'hidden' : '') }}
                {{ $petition->status == 'published' ? 'bg-black text-[#C82323]' : '' }}
                {{ $petition->status == 'close' ? 'bg-black text-white' : '' }}
                {{ $petition->status == 'reject' ? 'bg-white text-[#C82323]' : '' }}"
        >
            @if ($petition->status == 'pending')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                </svg>
            @endif
            @if ($petition->status == 'win')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M5.166 2.621v.858c-1.035.148-2.059.33-3.071.543a.75.75 0 0 0-.584.859 6.753 6.753 0 0 0 6.138 5.6 6.73 6.73 0 0 0 2.743 1.346A6.707 6.707 0 0 1 9.279 15H8.54c-1.036 0-1.875.84-1.875 1.875V19.5h-.75a2.25 2.25 0 0 0-2.25 2.25c0 .414.336.75.75.75h15a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-2.25-2.25h-.75v-2.625c0-1.036-.84-1.875-1.875-1.875h-.739a6.706 6.706 0 0 1-1.112-3.173 6.73 6.73 0 0 0 2.743-1.347 6.753 6.753 0 0 0 6.139-5.6.75.75 0 0 0-.585-.858 47.077 47.077 0 0 0-3.07-.543V2.62a.75.75 0 0 0-.658-.744 49.22 49.22 0 0 0-6.093-.377c-2.063 0-4.096.128-6.093.377a.75.75 0 0 0-.657.744Zm0 2.629c0 1.196.312 2.32.857 3.294A5.266 5.266 0 0 1 3.16 5.337a45.6 45.6 0 0 1 2.006-.343v.256Zm13.5 0v-.256c.674.1 1.343.214 2.006.343a5.265 5.265 0 0 1-2.863 3.207 6.72 6.72 0 0 0 .857-3.294Z" clip-rule="evenodd" />
                </svg>
            @endif
            @if ($petition->status == 'published')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                </svg>                         
            @endif
            @if ($petition->status == 'close')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z" clip-rule="evenodd" />
                </svg>                           
            @endif
            @if ($petition->status == 'reject')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                </svg>                                      
            @endif
            {{ Str::upper($petition->status) }}!!
        </div>
        <div class="w-full md:w-1/2 rounded-lg bg-[#121212]">
            <img src="{{ $petition->image ? asset('storage/' . $petition->image) : 'https://api.unsplash.com/search/photos?query=' . urlencode($petition->title) }}" class="object-cover size-full rounded-xl" alt="{{ $petition->title }}">
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

