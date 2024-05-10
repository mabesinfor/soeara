@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="p-4 sm:ml-64 overflow-x-auto">
   <table class="bg-[#1e1e1e] table-auto w-full">
      <thead class="border-b-2 border-[#C82323]">
         <tr>
            <th class="lg:py-4 py-2 lg:px-8 px-4">#</th>
            <th class="lg:py-4 py-2 lg:px-8 px-4">Judul</th>
            <th class="lg:py-4 py-2 lg:px-8 px-4">Deskripsi</th>
            <th class="lg:py-4 py-2 lg:px-8 px-4">Foto</th>
            <th class="lg:py-4 py-2 lg:px-8 px-4">Aksi</th>
         </tr>
      </thead>
      <tbody class="text-sm">
         @if ($petitions->isNotEmpty())
            @foreach ($petitions as $petition)
            <tr>
               <td class="lg:py-4 py-2 lg:px-8 px-4">{{ $loop->iteration }}</td>
               <td class="lg:py-4 py-2 lg:px-8 px-4">{{ $petition->title }}</td>
               <td class="lg:py-4 py-2 lg:px-8 px-4">{{ Str::of($petition->desc)->limit(255) }}</td>
               <td class="lg:py-4 py-2 lg:px-8 px-4"><img src="{{ url( $petition->image ) }}" alt="" class="h-24 object-cover"></td>
               <td class="lg:py-4 py-2 lg:px-8 px-4 flex flex-col lg:flex-row">
                  <form action="/dashboard/pending/{{ $petition->id }}/terima" method="POST">
                     @csrf
                     @method('PUT')
                     <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-green-600 hover:fill-green-600 hover:text-white transition-all">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                     </button>
                  </form>              
                  <form action="/dashboard/pending/{{ $petition->id }}/tolak" method="POST">
                     @csrf
                     @method('PUT')
                     <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-red-600 hover:fill-red-600 hover:text-white transition-all">
                           <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>  
                     </button>
                  </form> 
               </td>
            </tr>
            @endforeach
         @else
             <tr>
               <td colspan="5" class="text-center py-4 text-lg">Belum ada petisi</td>
             </tr>
         @endif
      </tbody>
   </table>
</div>
@endsection