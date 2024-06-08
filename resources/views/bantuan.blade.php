@extends('layouts.app')

@section('title', 'Bantuan')

@section('content')
<div class="relative w-full flex justify-center items-center">
    <img class="w-full object-cover" src="{{ url('tentang-kami-bnw.png') }}" alt="Tentang Kami">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="absolute text-white text-4xl md:text-5xl font-bold">Bantuan</div>
</div>

<div class="relative bg-[#121212] p-4 md:p-8 text-white max-w-screen-lg mx-auto px-4 md:px-8">
    <div class="space-y-8">
        <a href="#" id="pusat-bantuan">
            <h2 class="text-2xl md:text-3xl font-semibold mt-4 md:mt-8 border-b-2 border-[#C82323] pb-2">Pusat Bantuan</h2>
            <p class="mt-2 md:mt-4 text-base md:text-lg text-justify">
                Selamat datang di Pusat Bantuan Soeara. Di sini, Anda dapat menemukan jawaban untuk pertanyaan umum, panduan langkah demi langkah, dan sumber daya lainnya untuk membantu Anda memaksimalkan pengalaman Anda di Soeara. Jika Anda memerlukan bantuan lebih lanjut, jangan ragu untuk menghubungi tim dukungan kami.
            </p>
            <p class="mt-2 md:mt-4 text-base md:text-lg text-justify">
                Pusat Bantuan ini juga menyediakan informasi terkait cara kerja sistem, seperti bagaimana mengumpulkan minimal 500 pendukung untuk setiap petisi agar dapat diajukan kepada pihak berwenang untuk ditindaklanjuti. Selain itu, kami juga menjelaskan bagaimana sistem ini dapat meningkatkan efisiensi dan efektivitas dalam penyampaian aspirasi mahasiswa.
            </p>
        </a>

        <a href="#panduan" id="panduan">
            <h2 class="text-2xl md:text-3xl font-semibold mt-4 md:mt-8 border-b-2 border-[#C82323] pb-2">Panduan</h2>
            <p class="mt-2 md:mt-4 text-base md:text-lg text-justify">
                Bagian Panduan menyediakan tutorial mendetail tentang berbagai fitur dan layanan yang kami tawarkan di Soeara. Mulai dari cara membuat akun hingga tips untuk menjaga keamanan informasi pribadi Anda, kami memiliki semua yang Anda butuhkan untuk mulai menggunakan Soeara dengan efisien.
            </p>
            <p class="mt-2 md:mt-4 text-base md:text-lg text-justify">
                Fitur utama dalam panduan ini meliputi cara membuat petisi baru, mendukung petisi, melihat daftar petisi yang sedang berlangsung, mengirim komentar pada petisi, membagikan petisi, mengunjungi petisi, menghapus petisi, menutup atau membuka petisi, menyatakan kemenangan petisi, dan menyukai petisi atau komentar.
            </p>
        </a>

        <a href="#privasi" id="privasi">
            <h2 class="text-2xl md:text-3xl font-semibold mt-4 md:mt-8 border-b-2 border-[#C82323] pb-2">Privasi</h2>
            <p class="mt-2 md:mt-4 text-base md:text-lg text-justify">
                Kami berkomitmen untuk melindungi privasi Anda di Soeara. Kebijakan privasi kami menjelaskan jenis informasi yang kami kumpulkan, bagaimana kami menggunakannya, dan langkah-langkah yang kami ambil untuk melindungi informasi Anda. Kami juga menjelaskan hak-hak Anda terkait informasi pribadi Anda dan bagaimana Anda dapat mengelola preferensi privasi Anda.
            </p>
            <p class="mt-2 md:mt-4 text-base md:text-lg text-justify">
                Informasi yang dikumpulkan mencakup data pribadi yang Anda berikan saat mendaftar, serta data aktivitas saat menggunakan platform kami. Kami menggunakan informasi ini untuk meningkatkan layanan kami dan memberikan pengalaman yang lebih personal.
            </p>
        </a>

        <a href="#ketentuan" id="ketentuan">
            <h2 class="text-2xl md:text-3xl font-semibold mt-4 md:mt-8 border-b-2 border-[#C82323] pb-2">Ketentuan</h2>
            <p class="mt-2 md:mt-4 text-base md:text-lg text-justify">
                Syarat dan Ketentuan ini menguraikan aturan dan regulasi untuk penggunaan Soeara. Dengan mengakses platform ini, kami mengasumsikan Anda menerima syarat dan ketentuan ini sepenuhnya. Jika Anda tidak setuju dengan semua syarat dan ketentuan yang disebutkan di halaman ini, jangan lanjutkan menggunakan Soeara.
            </p>
            <p class="mt-2 md:mt-4 text-base md:text-lg text-justify">
                Ketentuan ini mencakup aturan mengenai pembuatan petisi, konten yang diperbolehkan, penggunaan layanan, serta hak dan kewajiban pengguna. Pengguna diharuskan menggunakan platform ini dengan penuh tanggung jawab dan mematuhi semua ketentuan yang berlaku.
            </p>
        </a>

        <a href="#cookie" id="cookie">
            <h2 class="text-2xl md:text-3xl font-semibold mt-4 md:mt-8 border-b-2 border-[#C82323] pb-2">Cookie</h2>
            <p class="mt-2 md:mt-4 text-base md:text-lg text-justify">
                Soeara menggunakan cookie untuk meningkatkan pengalaman Anda saat menavigasi melalui platform ini. Cookie membantu kami memahami bagaimana Anda menggunakan Soeara, yang memungkinkan kami untuk meningkatkan layanan dan menyediakan konten yang lebih relevan bagi Anda. Anda dapat mempelajari lebih lanjut tentang bagaimana kami menggunakan cookie dan bagaimana Anda dapat mengelola pengaturan cookie Anda di bagian ini.
            </p>
            <p class="mt-2 md:mt-4 text-base md:text-lg text-justify">
                Cookie adalah file kecil yang ditempatkan di perangkat Anda saat Anda mengunjungi situs web kami. Kami menggunakan cookie untuk mengingat preferensi Anda, menganalisis penggunaan situs, dan menampilkan iklan yang relevan. Anda dapat mengatur preferensi cookie melalui pengaturan browser Anda.
            </p>
        </a>
    </div>
</div>
@endsection
