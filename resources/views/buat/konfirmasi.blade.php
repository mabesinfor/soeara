@extends('layouts.app')

@section('title', 'Mulai Buat Petisi')

@section('content')
    <div class="relative mx-auto py-8 pl-2 md:pl-0">
        <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover size-full z-10">
        <div class="relative z-20 flex flex-col items-start justify-center gap-4 my-10 bg-transparent">
            <div class="text-center md:text-start md:pl-60 w-full bg-transparent">
                <p class="font-bold text-2xl md:text-4xl mb-8 w-full md:w-3/4">Petisi Anda sudah siap, klik “Buat Petisi” dan tunggu <em>Admin</em> menyetujui petisi Anda</p>
                <div class="relative z-30 flex flex-col gap-3 p-3 bg-[#303030]/50 ring-1 ring-[#646464] w-full md:w-3/4 rounded-xl">
                    <div class="w-full rounded-lg bg-[#121212] items-center justify-center p-4">
                        <p class="font-bold text-lg mb-4">Stop Kekerasan Pada Hewan di Lingkungan Kampus! Beri Sanksi Pelaku Kekerasan!</p>
                        <p class="text-sm mb-4 text-justify">Kami mengajukan petisi ini dengan tujuan utama untuk mengakhiri segala bentuk kekerasan terhadap hewan yang terjadi di lingkungan kampus. Kekerasan terhadap hewan merupakan tindakan yang tidak manusiawi dan tidak dapat ditoleransi. Kami menyerukan agar pihak berwenang mengambil tindakan tegas dengan memberikan sanksi kepada pelaku kekerasan terhadap hewan. Dengan demikian, kami berharap lingkungan kampus dapat menjadi tempat yang aman dan ramah bagi semua makhluk hidup, termasuk hewan-hewan yang berbagi ruang dengan kita.
                        </p>
                        <img src="{{ url('img5.png') }}" alt="Gambar Petisi">
                    </div>
                </div>
                <div class="flex gap-10 items-center justify-center md:justify-end mt-10 md:mr-60">
                    <a href="/buat-petisi/foto" class="text-sm text-white underline">Kembali</a>
                    <a href="/" class="text-sm text-white bg-[#e00a24] hover:bg-[#c94958] py-2 px-4 rounded">Buat Petisi</a>
                </div>
            </div>
        </div>
    </div>
@endsection