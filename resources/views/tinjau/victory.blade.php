@extends('layouts.app')

@section('title', 'Dashboard Petisi')

@section('content')
    <div class="md:pl-60 p-8 w-5/6 pl-12">

        {{-- Start Kemenangan --}}
        <div class="flex items-center mb-2">
            <img src="{{ url('victory.svg') }}" alt="Victory" class="mr-2">
            <div class="text-[#C82323] font-bold text-sm">KEMENANGAN!</div>
        </div>
        {{-- End Kemenangan --}}

        {{-- Start Judul --}}
        <h1 class="font-bold text-3xl">Unsoed Darurat Pelecehan Seksual! Bentuk Tim Investigasi Independent!</h1>
        {{-- End Judul --}}

        <hr class="mt-10">

        {{-- Start Tinjau Petisi --}}
        <p class="mt-8 font-bold text-2xl mb-3">Tinjauan petisi Anda</p>
        <div class="bg-[#1E1E1E] flex flex-col md:flex-row gap-4 p-6 rounded-xl">
            {{-- Start Progress Bar --}}
            <div class="w-full md:w-3/4 p-4 ml-4">
                <div class="border border-[#C82323] rounded-xl w-full">
                    <div class="w-full h-2 rounded-full">
                        <div class="h-full bg-[#C82323] rounded-full" style="width: 100%;"></div>
                    </div>
                </div>
                <div class="bg-transparent flex justify-between items-center w-full mt-2">
                    <div>
                        <h3 class="text-xl text-center md:text-start font-bold text-[#C82323]">500</h3>
                        <p class="text-center md:text-start text-[#C82323]">Pendukung</p>
                    </div>
                    <div>
                        <h3 class="text-xl text-center md:text-right font-bold">500</h3>
                        <p class="text-center md:text-right">Tujuan Berikutnya</p>
                    </div>
                </div>
            </div>
            {{-- End Progress Bar --}}

            {{-- Start Like n Share Button --}}
            <div>
                <div class="flex items-center p-4 gap-2">
                    <img src="{{ url('like.svg') }}" alt="likeIcon">
                    <span>172 Suka</span>
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
            <div class="w-full ml-4">
                <div class="flex items-start gap-4 mb-4 mt-5">
                    <img src="{{ url('pic6.svg') }}" class="self-start">
                    <div class="flex flex-col w-full">
                        <div class="flex justify-between">
                            <div class="flex gap-2">
                                <p class="font-bold">Alisia Hendrawan</p>
                                <p class="text-gray-500">13 menit yang lalu</p>
                            </div>
                            <button onclick="deleteFunction()">
                                <img src="{{ url('delete.svg') }}">
                            </button>
                        </div>
                        <p class="mt-5">Saya menandatangani ini karena saya ingin adanya keadilan bagi korban pelecehan seksual</p>
                        <div class="inline-flex gap-2 items-center cursor-pointer mt-2">
                            <button id="likeButton" onclick="toggleLike()">
                                <img id="likeImage" src="{{ url('like.svg') }}" class="text-black">
                            </button>
                            <small>12 Suka</small>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="flex items-start gap-4 mb-4  mt-5">
                    <img src="{{ url('pic7.svg') }}" class="self-start">
                    <div class="flex flex-col w-full">
                        <div class="flex justify-between">
                            <div class="flex gap-2">
                                <p class="font-bold">David Indra Ibrahim</p>
                                <p class="text-gray-500">2 jam yang lalu</p>
                            </div>
                            <button onclick="deleteFunction()">
                                <img src="{{ url('delete.svg') }}">
                            </button>
                        </div>
                        <p class="mt-5">Tindakan pelecahan tidak bisa di toleransi, karena memurunkan harkat dan martabat manusia. Kita harus menghormari dan respect kepada lawan jenis, dalam islam diwajibkan untuk menundukkan pandangan agar terhindar dari zina dan pelecehan. Sekian.</p>
                        <div class="inline-flex gap-2 items-center cursor-pointer mt-2">
                            <button id="likeButton" onclick="toggleLike()">
                                <img id="likeImage" src="{{ url('like.svg') }}" class="text-black">
                            </button>
                            <small>8 Suka</small>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="flex items-start gap-4 mb-4  mt-5">
                    <img src="{{ url('pic8.svg') }}" class="self-start">
                    <div class="flex flex-col w-full">
                        <div class="flex justify-between">
                            <div class="flex gap-2">
                                <p class="font-bold">Siti Aisyah</p>
                                <p class="text-gray-500">2 jam yang lalu</p>
                            </div>
                            <button onclick="deleteFunction()">
                                <img src="{{ url('delete.svg') }}">
                            </button>
                        </div>
                        <p class="mt-5">Karena pelecehan seksual adalah sebuah kasus serius. Jika satu kasus bisa terungkap dan pelakunya mendapat konsekuensi yang maksimal sampai dgn pemecatan dari institusinya, maka akan bisa mengungkap kasus-kasus serupa di institusi tersebut. Dunia pendidikan tidak hanya mengedepankan kompetensi intelektual semata-mata, namun harus juga menguatamakan nilai dan moral dalam proses berkegiatan di kampus. Saya prihatin dengan hal ini, karena saya adalah seorang guru. Jangan sampai profesi pendidik ternoda oleh perbuatan oknum-oknumnya yang mengabaikan amanah moralnya.</p>
                        <div class="inline-flex gap-2 items-center cursor-pointer mt-2">
                            <button id="likeButton" onclick="toggleLike()">
                                <img id="likeImage" src="{{ url('like.svg') }}" class="text-black">
                            </button>
                            <small>2 Suka</small>
                        </div>
                    </div>
                </div>
                <hr>
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
            <div class="w-full mt-4 ml-20">
                <div class="flex items-center justify-start gap-4 mb-8">
                    <img src="{{ url('pic6.svg') }}">
                    <p class="font-bold">Alisia Hendrawan</p>
                    <p class="text-gray-500">13 menit yang lalu</p>
                </div>
                <div class="flex items-center justify-start gap-4 mb-8">
                    <img src="{{ url('pic7.svg') }}">
                    <p class="font-bold">David Indra Ibrahim</p>
                    <p class="text-gray-500">2 jam yang lalu</p>
                </div>
                <div class="flex items-center justify-start gap-4 mb-8">
                    <img src="{{ url('pic10.svg') }}">
                    <p class="font-bold">Kumarr Gopal Ahmad</p>
                    <p class="text-gray-500">2 jam yang lalu</p>
                </div>
                <div class="flex items-center justify-start gap-4 mb-8">
                    <img src="{{ url('pic9.svg') }}">
                    <p class="font-bold">Abi Tohirin</p>
                    <p class="text-gray-500">3 jam yang lalu</p>
                </div>
                <div class="flex items-center justify-start gap-4 mb-8">
                    <img src="{{ url('pic8.svg') }}">
                    <p class="font-bold">Siti Aisyah</p>
                    <p class="text-gray-500">3 jam yang lalu</p>
                </div>
                <div class="flex items-center justify-start gap-4 mb-8">
                    <img src="{{ url('pic11.svg') }}">
                    <p class="font-bold">Himeno Suigetsu</p>
                    <p class="text-gray-500">3 jam yang lalu</p>
                </div>
                <div class="flex items-center justify-start gap-4 mb-8">
                    <img src="{{ url('pic12.svg') }}">
                    <p class="font-bold">Vincent Aditya Junaedi</p>
                    <p class="text-gray-500">3 jam yang lalu</p>
                </div>
                <div class="flex items-center justify-start gap-4 mb-8">
                    <img src="{{ url('pic13.svg') }}">
                    <p class="font-bold">Wisnu Adi</p>
                    <p class="text-gray-500">5 jam yang lalu</p>
                </div>
                <div class="flex items-center justify-start gap-4 mb-8">
                    <img src="{{ url('pic14.svg') }}">
                    <p class="font-bold">Yuni Auralie</p>
                    <p class="text-gray-500">5 jam yang lalu</p>
                </div>
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