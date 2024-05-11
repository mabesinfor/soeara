@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <div class="relative w-full flex justify-center">
        <img class="w-full object-cover" src="{{ url('tentang-kami-bnw.png') }}" alt="Tentang Kami">
    </div>
    <div class="relative bg-[#121212] p-8">
        <img src="{{ url('vector-1.svg') }}" class="absolute inset-0 h-1/6 md:h-1/3 object-cover z-[0]">
        <div class="relative flex flex-col md:flex-row  space-x-0 md:space-x-4 mx-auto max-w-screen-lg z-[1]">
            <h2 class="text-4xl md:text-5xl font-bold">Tentang</h2>
            <h2 class="text-4xl md:text-5xl font-black text-[#C82323] italic">Soeara</h2>
            <h2 class="text-4xl md:text-5xl font-bold">(Soedirman Berbicara)</h2>
        </div>
        <div class="relative mx-auto max-w-screen-lg z-[1]" >
            <p class="text-white text-justify mt-4 mb-5">Soeara (Soedirman Berbicara) adalah platform petisi yang didedikasikan untuk memberikan suara kepada Mahasiswa Universitas Jenderal Soedirman dan memperjuangkan perubahan positif dalam lingkungan kampus.</p>
        </div>
        <div class="relative p-7 bg-[#1E1E1E] mt-4 mb-5 rounded-xl mx-auto w-full max-w-screen-lg px-4 md:px-20 z-[1]">
            <h3 class="text-white text-center font-bold text-xl md:text-2xl mb-6">Memberi Suara untuk Perubahan Universitas Jenderal Soedirman</h3>
            <p class="text-white text-justify mb-4">Soeara (Soedirman Berbicara) adalah platform petisi yang bertujuan untuk memberikan suara kepada komunitas Universitas Jenderal Soedirman (Unsoed) dan mempromosikan perubahan positif dalam lingkungan kampus. Kami percaya bahwa setiap individu memiliki hak untuk didengar dan untuk memperjuangkan perubahan yang mereka yakini. Di Soeara, kami berkomitmen untuk memberdayakan mahasiswa, staf, dan alumni Unsoed untuk berbicara tentang isu-isu yang penting bagi mereka.</p>
            <p class="text-white text-justify mb-4">Kami menyediakan wadah yang aman dan terbuka bagi para aktivis, pemikir, dan individu yang ingin mempengaruhi kebijakan dan praktek di lingkungan kampus kami. Dengan menggunakan teknologi dan kekuatan bersatu, kami berupaya untuk memperkuat suara komunitas kami, menginspirasi perubahan, dan menciptakan lingkungan yang lebih inklusif, berkelanjutan, dan berdaya guna.</p>
            <p class="text-white text-justify mb-4">Cara kerja sistem petisi Soeara adalah dengan mengumpulkan minimal 500 pendukung untuk setiap petisi. Jika sebuah petisi berhasil mendapatkan 500 atau lebih pendukung, maka petisi tersebut dianggap telah mencapai kemenangan dan dapat diajukan kepada pihak berwenang untuk ditindaklanjuti.</p>
            <p class="text-white text-justify">Bersama-sama, kita dapat mencapai perubahan positif dan memberikan dampak yang signifikan bagi Unsoed dan masyarakat yang lebih luas. Ayo bergabung dengan kami dalam perjalanan untuk memberikan suara kepada Soedirman dan membangun masa depan yang lebih baik untuk semua.</p>
        </div>
        <img src="{{ url('vector-2.svg') }}" class="absolute bottom-0 right-0 h-1/6 md:h-1/3 object-cover z-0">
    </div>
@endsection