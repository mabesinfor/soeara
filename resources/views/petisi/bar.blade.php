@php
    $supportsCount = $supports->count();
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

<div class="border border-[#C82323] rounded-xl w-full md:w-3/4">
    <div class="w-full h-2 rounded-full">
        <div class="h-full bg-[#C82323] rounded-full" style="width: {{ $supports->count()/$tujuan * 100 }}%;"></div>
    </div>
</div>
<div class="bg-transparent flex justify-between items-center w-full md:w-3/4 mt-2">
    <div>
        <h3 class="text-xl text-center md:text-start font-bold text-[#C82323]">{{ $supports->count() }}</h3>
        <p class="text-center md:text-start text-[#C82323]">Pendukung</p>
    </div>
    <div>
        <h3 class="text-xl text-center md:text-right font-bold">{{ $tujuan }}</h3>
        <p class="text-center md:text-right">Tujuan Berikutnya</p>
    </div>
</div>