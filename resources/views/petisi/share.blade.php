@extends('layouts.app')

@section('title', 'Bagikan Petisi')

@section('content')
    {{-- Start Judul --}}
    <div class="flex items-center justify-center p-6">
        <h1 class="text-2xl text-center font-bold">{{ $petisi->title }}</h1>
    </div>
    {{-- End Judul --}}

    {{-- Start Bagikan --}}
    <div class="p-4 sm:p-8">
        <div class="relative z-30 flex flex-col gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full md:w-1/2 lg:w-1/3 mx-auto rounded-xl">
            <div class="w-full h-full rounded-lg bg-[#121212] flex flex-col justify-between p-4">
                <p class="font-bold text-center mb-4">Bagikan petisi ke berbagai platform</p>
                <div class="w-full px-4 sm:px-8">
                    <div class="mt-4 flex justify-center">
                        <button id="copy-link" class="px-4 sm:px-8 py-2 bg-transparent border-2 border-[#646464] text-white rounded-xl hover:bg-[#303030] flex items-center justify-center w-full">
                            <img src="{{ url('link.svg') }}" class="mr-2">
                            Salin Tautan
                        </button>
                    </div>
                    <div class="w-full mt-4 flex flex-col sm:flex-row justify-between">
                        <div class="flex flex-col gap-4">
                            <button id="share-twitter" class="px-4 sm:px-8 py-2 bg-transparent border-2 border-[#646464] text-white rounded-xl hover:bg-[#303030] flex items-center justify-center w-full">
                                <img src="{{ url('twitter.svg') }}" class="mr-2">
                                Twitter
                            </button>
                            <button id="share-facebook" class="px-4 sm:px-8 py-2 bg-transparent border-2 border-[#646464] text-white rounded-xl hover:bg-[#303030] flex items-center justify-center w-full">
                                <img src="{{ url('facebook.svg') }}" class="mr-2">
                                Facebook
                            </button>
                        </div>
                        <div class="flex flex-col gap-4 mt-4 sm:mt-0">
                            <button id="share-email" class="px-4 sm:px-8 py-2 bg-transparent border-2 border-[#646464] text-white rounded-xl hover:bg-[#303030] flex items-center justify-center w-full">
                                <img src="{{ url('email-share.svg') }}" class="mr-2">
                                Email
                            </button>
                            <button id="share-whatsapp" class="px-4 sm:px-8 py-2 bg-transparent border-2 border-[#646464] text-white rounded-xl hover:bg-[#303030] flex items-center justify-center w-full">
                                <img src="{{ url('whatsapp.svg') }}" class="mr-2">
                                WhatsApp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Bagikan --}}

    <div class="text-center md:text-right mb-4 md:p-4 md:pr-48">
        <a href="/petisi/{{ $petisi->slug }}" class="text-white underline">Kembali ke Petisi</a>
    </div>
@endsection

@section('javascripts')
<script type="text/javascript">
    function logShare(platform) {
        fetch('{{ route('petisi.logShare') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                petition_id: '{{ $petisi->id }}',
                platform: platform
            })
        }).then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
    }

    document.getElementById('copy-link').addEventListener('click', function() {
        navigator.clipboard.writeText("{{ url('/petisi/' . $petisi->slug) }}").then(function() {
            alert('Link telah berhasil disalin');
            logShare('link');
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    });

    document.getElementById('share-twitter').addEventListener('click', function() {
        window.open('https://twitter.com/intent/tweet?url={{ urlencode(url('/petisi/' . $petisi->slug)) }}', '_blank');
        logShare('twitter');
    });

    document.getElementById('share-facebook').addEventListener('click', function() {
        window.open('https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/petisi/' . $petisi->slug)) }}', '_blank');
        logShare('facebook');
    });

    document.getElementById('share-email').addEventListener('click', function() {
        window.location.href = 'mailto:?subject={{ urlencode($petisi->title) }}&body={{ urlencode(url('/petisi/' . $petisi->slug)) }}';
        logShare('email');
    });

    document.getElementById('share-whatsapp').addEventListener('click', function() {
        window.open('https://api.whatsapp.com/send?text={{ urlencode(url('/petisi/' . $petisi->slug)) }}', '_blank');
        logShare('whatsapp');
    });
</script>
@endsection