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
        {{-- Start Kemenangan --}}
        @if ($petisi->status == 'win')
        <div class="flex items-center mb-2">
            <img src="{{ url('victory.svg') }}" alt="Victory" class="mr-2">
            <div class="text-[#C82323] font-bold text-sm">KEMENANGAN!</div>
        </div>
        @endif
        {{-- End Kemenangan --}}

        {{-- Start Judul --}}
        <h1 class="font-bold text-3xl">{{ $petisi->title }}</h1>
        {{-- End Judul --}}

        {{-- Start Button --}}
        <div x-data="petitionActionsData({{ $petisi->id }}, '{{ $petisi->user->slug }}')" class="flex flex-col sm:flex-row gap-4 mt-8 {{ $petisi->status == 'win' ? 'hidden' : '' }}">
            <a id="visit" href="{{ route('petisi.show', ['slug' => $petisi->slug]) }}" target="_blank" class="bg-transparent border border-[#ffff] text-[#fff] py-2 px-4 rounded-xl flex items-center gap-2 cursor-pointer">
                <svg class="size-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                </svg>                  
                Kunjungi petisi
            </a>
            <!-- Tombol Hapus Petisi -->
            <a @click="showModal = true; action = 'delete'; message = 'Apakah Anda yakin ingin menghapus petisi ini?'" class="bg-transparent border border-[#e00a24] text-[#e00a24] py-2 px-4 rounded-xl flex items-center gap-2 cursor-pointer">
                <svg class="size-4 text-[#C82323]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                </svg>                  
                Hapus petisi
            </a>
        
            @if ($petisi->status == 'pending' || $petisi->status == 'published')
            <!-- Tombol Tutup Petisi -->
            <a @click="showModal = true; action = 'close'; message = 'Apakah Anda yakin ingin menutup petisi ini?'" class="bg-transparent border border-[#e00a24] text-[#e00a24] py-2 px-4 rounded-xl flex items-center gap-2 cursor-pointer">
                <svg class="size-4 text-[#C82323]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                </svg> 
                Tutup petisi
            </a>
            @endif

            @if ($petisi->status == 'close')
            <!-- Tombol Tutup Petisi -->
            <a @click="showModal = true; action = 'open'; message = 'Apakah Anda yakin ingin membuka kembali petisi ini?'" class="bg-transparent border border-[#e00a24] text-[#e00a24] py-2 px-4 rounded-xl flex items-center gap-2 cursor-pointer"> 
                <svg class="size-4 text-[#C82323]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M15 7a2 2 0 1 1 4 0v4a1 1 0 1 0 2 0V7a4 4 0 0 0-8 0v3H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V7Zm-5 6a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                </svg>                                  
                Buka petisi
            </a>
            @endif
        
            <!-- Tombol Nyatakan Kemenangan -->
            <a @click="showModal = true; action = 'victory'; message = 'Apakah Anda yakin ingin menyatakan kemenangan untuk petisi ini?'" class="bg-[#e00a24] border border-[#e00a24] text-white py-2 px-4 rounded-xl flex items-center gap-2 cursor-pointer {{ $petisi->status == 'pending' || $petisi->status == 'close' || $petisi->status == 'reject' ? 'hidden' : '' }}">
                <svg class="size-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 7h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C10.4 2.842 8.949 2 7.5 2A3.5 3.5 0 0 0 4 5.5c.003.52.123 1.033.351 1.5H4a2 2 0 0 0-2 2v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9a2 2 0 0 0-2-2Zm-9.942 0H7.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM13 14h-2v8h2v-8Zm-4 0H4v6a2 2 0 0 0 2 2h3v-8Zm6 0v8h3a2 2 0 0 0 2-2v-6h-5Z"/>
                </svg>                  
                Nyatakan kemenangan!
            </a>
        
            <!-- Modal -->
            <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-[#1e1e1e] p-6 rounded-lg">
                    <h2 class="text-xl font-bold mb-1">Konfirmasi Tindakan</h2>
                    <p x-text="message"></p>
                    <div class="flex gap-4 justify-end mt-8">
                        <button @click="showModal = false" class="py-2 px-4 bg-[#121212] rounded-lg">
                            Tidak
                        </button>
                        <button @click="showModal = false; performAction()" class="py-2 px-4 bg-[#c82323] text-white rounded-lg">
                            Ya, Lanjutkan
                        </button>
                    </div>
                </div>
            </div>
        </div>        
        
        {{-- End Button --}}

        <hr class="mt-10">

        {{-- Start Tinjau Petisi --}}
        <p class="mt-8 font-bold text-2xl mb-3">Tinjauan petisi Anda</p>
        <div class="bg-[#1E1E1E] flex flex-col md:flex-row gap-4 p-6 rounded-xl">
            {{-- Start Progress Bar --}}
            <div id="bar" class="w-full md:w-3/4 p-4 md:ml-4 ml-0">
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
                    <svg class="size-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M15.03 9.684h3.965c.322 0 .64.08.925.232.286.153.532.374.717.645a2.109 2.109 0 0 1 .242 1.883l-2.36 7.201c-.288.814-.48 1.355-1.884 1.355-2.072 0-4.276-.677-6.157-1.256-.472-.145-.924-.284-1.348-.404h-.115V9.478a25.485 25.485 0 0 0 4.238-5.514 1.8 1.8 0 0 1 .901-.83 1.74 1.74 0 0 1 1.21-.048c.396.13.736.397.96.757.225.36.32.788.269 1.211l-1.562 4.63ZM4.177 10H7v8a2 2 0 1 1-4 0v-6.823C3 10.527 3.527 10 4.176 10Z" clip-rule="evenodd"/>
                    </svg>                      
                    <span>{{ $petisi->likes->count() }} Suka</span>
                </div>
                <div class="flex items-center p-4 gap-2">
                    <svg class="size-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.5 3a3.5 3.5 0 0 0-3.456 4.06L8.143 9.704a3.5 3.5 0 1 0-.01 4.6l5.91 2.65a3.5 3.5 0 1 0 .863-1.805l-5.94-2.662a3.53 3.53 0 0 0 .002-.961l5.948-2.667A3.5 3.5 0 1 0 17.5 3Z"/>
                    </svg>                      
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
function petitionActionsData(petitionId, userSlug) {
    return {
        showModal: false,
        action: '',
        message: '',
        performAction() {
            switch (this.action) {
                case 'delete':
                    this.deletePetition(petitionId, userSlug);
                    break;
                case 'close':
                    this.closePetition(petitionId);
                    break;
                case 'open':
                    this.openPetition(petitionId);
                    break;
                case 'victory':
                    this.declareVictory(petitionId);
                    break;
            }
        },
        deletePetition(petitionId, userSlug) {
            $.ajax({
                url: `/petitions/delete/${petitionId}`, 
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: 'DELETE'
                },
                success: function(response) {
                    window.location.href = `/profil/${userSlug}`;
                },
                error: function(error) {
                    alert('Error deleting petition');
                }
            });
        },
        closePetition(petitionId) {
            $.ajax({
                url: `/petitions/close/${petitionId}`, 
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    alert('Error closing petition');
                }
            });
        },
        openPetition(petitionId) {
            $.ajax({
                url: `/petitions/open/${petitionId}`, 
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    alert('Error closing petition');
                }
            });
        },
        declareVictory(petitionId) {
            $.ajax({
                url: `/petitions/win/${petitionId}`, 
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    alert('Error closing petition');
                }
            });
        }
    }
}

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