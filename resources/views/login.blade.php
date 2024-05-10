@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="relative mx-auto py-8 md:text-center pl-2 md:pl-0">
        <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover size-full z-10">
        <div class="relative z-20 flex flex-col justify-center items-center gap-4 my-10">
            <img src="{{ url('img-login.svg') }}" class="w-72 md:w-auto">
            <a 
            href="http://127.0.0.1:8000/auth/google/redirect"
            {{-- href="https://soeara.ecom22a.com/auth/google/redirect"  --}}
            class="bg-[#e00a24] rounded-xl py-[9px] px-[22px] font-semibold text-[17px] transition ease-in-out duration-500 hover:bg-[#c94958] flex items-center gap-2">
                <img src="{{ url('google.svg') }}" class="size-[20px]">
                Masuk dengan Google
            </a>
            <small class="italic font-light">*Hanya dapat masuk dengan akun Google Unsoed.</small>
        </div>
    </div>
@endsection