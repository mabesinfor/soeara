@if ($petitions->isNotEmpty())
    @foreach ($petitions as $petition)
    <div class="relative z-30 flex flex-col md:flex-row gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full rounded-xl">
        <div class="w-full md:w-1/2 rounded-lg bg-[#121212]">
            <img src="{{ asset('storage/' . $petition->petitions->image) }}" class="object-cover size-full rounded-xl" alt="{{ $petition->petitions->title }}">
        </div>
        <div class="w-full md:w-1/2 rounded-lg bg-[#121212] flex flex-col justify-between">
            <div class="p-5 flex flex-col gap-4 items-start text-left">
                <div class="flex justify-between w-full">
                    <small class="opacity-50">
                        @if ($petition->petitions->categories->isNotEmpty())
                            <p>
                                {{ $petition->petitions->categories->pluck('name')->implode(' | ') }}
                            </p>
                        @else
                            Tidak ada kategori
                        @endif
                    </small>
                    <small class="opacity-50">{{ $petition->petitions->created_at->format('d/m/Y') }}</small>
                </div>
                <a target="_blank" href="{{ route('profil.show', ['slug' => $petition->petitions->user->slug]) }}" class="flex items-center gap-4">
                    <img class="size-8 rounded-full" src="{{ $petition->petitions->user->avatar ? (filter_var($petition->petitions->user->avatar, FILTER_VALIDATE_URL) ? $petition->petitions->user->avatar : asset('storage/' . $petition->petitions->user->avatar)) : asset('user.jpg') }}">
                    <small>{{ $petition->petitions->user->name }}</small>
                </a>
                <div class="flex flex-col gap-2">
                    <b>{{ $petition->petitions->title }}</b>
                    <small class="opacity-80">{{ Str::limit($petition->petitions->desc, 100) }}</small>
                    <a href="{{ route('petisi.show', ['slug' => $petition->petitions->slug]) }}">
                        <small class="underline text-[#C82323] hover:text-[#dc4d4d] font-semibold">Baca Selanjutnya</small>
                    </a>
                </div>
                <div class="w-full flex justify-end">
                    <a href="{{ route('petisi.show', ['slug' => $petition->petitions->slug]) }}" class="italic font-bold bg-[#C82323] hover:bg-[#dc4d4d] py-2 px-4 rounded-lg">Berikan Dukungan!</a>
                </div>
            </div>
            <div class="w-full bg-[#1e1e1e] p-3 rounded-b-lg flex justify-between items-center">
                <div class="flex gap-2 items-center cursor-pointer hover:bg-black/30 p-3 rounded-lg">
                    <img src="{{ asset('like.svg') }}">
                    <small>Suka</small>
                </div>
                <div class="flex gap-2 items-center">
                    <img src="{{ asset('support.svg') }}">
                    <small class="text-[#C82323] mr-3">5071 Pendukung</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <p class="font-black">Tidak ada petisi</p>
@endif
