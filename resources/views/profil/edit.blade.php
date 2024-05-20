@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <section id="edit-profil" class="px-40 py-20 w-full">
        <form action="" class="flex flex-col justify-center items-center w-full">
            @csrf
            <img id="avatar" src="{{ $user->avatar ? asset($user->avatar) : asset('user.jpg') }}" alt="{{ $user->name }}" class="size-60 rounded-full object-cover mb-12">
            <div class="flex gap-12 mb-20 items-center">
                <button class="py-2 px-4 outline outline-[#c82323] hover:bg-[#c82323] rounded-lg font-bold transition-all">
                    Unggah foto
                </button>
                <a href="javascript:void(0)" id="delete" onclick="openModal({{ $user->id }})" class="underline hover:text-[#c82323] font-bold transition-all">
                    Hapus foto
                </a>
            </div>
            <div class="flex flex-col w-full px-40">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Nama lengkap</div>
                    <div class="text-sm">19/50</div>
                </div>
                <input name="name" type="text" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0" value="{{ $user->name }}" placeholder="Masukan nama anda!" required>
            </div>
            <div class="flex flex-col mt-8 w-full px-40">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Deskripsi diri</div>
                    <div class="text-sm">54/100</div>
                </div>
                <textarea name="bio" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0"></textarea>
            </div>
            <div class="flex flex-col mt-8 w-full px-40">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Provinsi</div>
                </div>
                <select name="province" id="province" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0">
                    <option value="" disabled selected class="bg-[#121212] text-white">Pilih provinsi anda!</option>
                </select>
            </div>
            <div class="flex flex-col mt-8 w-full px-40">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Kota/Kabupaten</div>
                </div>
                <select name="district" id="district" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0">
                    <option value="" disabled selected class="bg-[#121212] text-white">Pilih kota/kabupaten anda!</option>
                </select>
            </div>
            <div class="flex gap-12 mt-8 items-center">
                <button class="py-2 px-4 bg-[#c82323] rounded-lg font-bold">
                    Simpan
                </button>
                <a href="/profil/{{ $user->slug }}" class="underline hover:text-[#c82323] font-bold transition-all">Batalkan</a>
            </div>
        </form>
    </section>

    <!-- Custom Modal -->
    <div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-[#1e1e1e] p-6 rounded-lg">
            <h2 class="text-xl font-bold mb-4">Hapus avatar?</h2>
            <p class="mb-4">Apakah kamu yakin ingin menghapus avatar ini?</p>
            <div class="flex justify-end">
                <button onclick="closeModal()" class="mr-4 py-2 px-4 bg-[#121212] rounded-lg">Batal</button>
                <button onclick="confirmDelete({{ $user->id }})" class="py-2 px-4 bg-[#c82323] text-white rounded-lg">Hapus</button>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
<script type="text/javascript">
    $(document).ready(function() {
        console.log("jQuery is ready!");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function openModal(id) {
        document.getElementById('myModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('myModal').classList.add('hidden');
    }

    function confirmDelete(id) {
        $.ajax({
            type: "DELETE",
            url: "{{ route('users.delete') }}",
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(res) {
                if (res.success) {
                    $('#avatar').attr('src', '{{ url("user.jpg") }}');
                    closeModal();
                } else {
                    alert(res.message);
                    closeModal();
                }
            },
            error: function(err) {
                console.error(err);
                closeModal();
            }
        });
    }
</script>
@endsection