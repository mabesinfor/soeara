@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <section id="edit-profil" class="lg:px-40 md:px-20 px-8 py-20 w-full">
        <form action="/profil/{{ $user->slug }}/edit" method="POST" class="flex flex-col justify-center items-center w-full" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <img id="avatar" src="{{ $user->avatar ? (filter_var($user->avatar, FILTER_VALIDATE_URL) ? $user->avatar : asset('storage/' . $user->avatar)) : asset('user.jpg') }}" class="size-60 rounded-full object-cover mb-12">
            <div class="flex gap-12 mb-20 items-center">
                <input name="avatar" id="avatarFile" type="file" hidden>
                <button id="uploadButton" type="button" class="py-2 px-4 outline outline-[#c82323] hover:bg-[#c82323] rounded-lg font-bold transition-all">
                    Unggah foto
                </button>
                <a href="javascript:void(0)" id="delete" onclick="openModal({{ $user->id }})" class="underline hover:text-[#c82323] font-bold transition-all">
                    Hapus foto
                </a>
            </div>
            <div class="flex flex-col w-full lg:px-40 md:px-12">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Nama lengkap</div>
                    <div class="text-sm" id="nameW"><span id="nameL"></span>/50</div>
                </div>
                <input id="name" maxlength="50" name="name" type="text" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0" value="{{ $user->name }}" placeholder="Masukan nama anda!" required>
            </div>
            <div class="flex flex-col mt-8 w-full lg:px-40 md:px-12">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Deskripsi diri</div>
                    <div class="text-sm" id="bioW"><span id="bioL"></span>/100</div>
                </div>
                <textarea id="bio" maxlength="100" name="bio" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0" placeholder="Beritahu orang-orang tentang diri anda!">{{ $user->bio }}</textarea>
            </div>
            <div class="flex flex-col mt-8 w-full lg:px-40 md:px-12">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Username X/Twitter</div>
                    <div class="text-sm" id="xW"><span id="xL"></span>/50</div>
                </div>
                <input id="x" maxlength="50" name="x" type="text" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0" value="{{ $user->x }}" placeholder="Masukan username X/Twitter anda!">
            </div>
            <div class="flex flex-col mt-8 w-full lg:px-40 md:px-12">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Provinsi</div>
                </div>
                <select disabled name="province" id="province" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0">
                    <option value="" selected class="bg-[#121212] text-white">Tunggu sebentar...</option>
                </select>
                <input type="text" name="provinceT" id="provinceT" hidden value="{{ $user->provinceT }}">
            </div>
            <div class="flex flex-col mt-8 w-full lg:px-40 md:px-12">
                <div class="flex justify-between mb-2">
                    <div class="text-sm">Kota/Kabupaten</div>
                </div>
                <select disabled name="regency" id="regency" class="py-2 pl-4 bg-transparent rounded-lg border border-white focus:outline-none focus:border-[#c82323] focus:ring-0">
                    <option value="" selected class="bg-[#121212] text-white">Tunggu sebentar...</option>
                </select>
            </div>
            <div class="flex gap-12 mt-8 items-center">
                <button type="submit" class="py-2 px-4 bg-[#c82323] rounded-lg font-bold" wire:loading.attr="disabled">
                    Simpan
                </button>
                <a href="/profil/{{ $user->slug }}" class="underline hover:text-[#c82323] font-bold transition-all">Batalkan</a>
            </div>
        </form>
    </section>

    <!-- Custom Modal -->
    <div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    // Fetch and populate provinces
    $.ajax({
        url: '/api/provinces', 
        method: 'GET',
        success: function(data) {
            var provinceSelect = $('#province');
            var provinceT = $('#provinceT');
            
            provinceSelect.empty(); 
            provinceSelect.removeAttr('disabled');
            provinceSelect.append('<option value="" disabled selected class="bg-[#121212] text-white">Pilih provinsi anda!</option>');
            
            data.forEach(function(province) {
                var option = $('<option class="bg-[#121212] text-white"></option>')
                    .attr('value', province.id)
                    .text(province.name);
                provinceSelect.append(option);
            });
            
            var selectedProvinceId = "{{ $user->province }}";
            
            if (selectedProvinceId) {
                provinceSelect.val(selectedProvinceId).trigger('change');
            }
            
            provinceSelect.change(function() {
                var selectedProvinceName = $(this).find('option:selected').text();
                provinceT.val(selectedProvinceName);
            });
            
            provinceSelect.trigger('change');
        }
    });

    // Fetch regencies when a province is selected
    $('#province').change(function() {
        var provinceId = $(this).val();
        fetchRegencies(provinceId);
    });

    // Function to fetch regencies
    function fetchRegencies(provinceId) {
        if (provinceId) {
            $.ajax({
                url: '/api/regencies/' + provinceId, 
                method: 'GET',
                success: function(data) {
                    var regencySelect = $('#regency');

                    regencySelect.removeAttr('disabled');
                    regencySelect.empty(); 
                    regencySelect.append('<option value="" disabled selected class="bg-[#121212] text-white">Pilih kota/kabupaten anda!</option>');

                    data.forEach(function(regency) {
                        var option = $('<option class="bg-[#121212] text-white"></option>')
                            .attr('value', regency.name)
                            .text(regency.name);
                        regencySelect.append(option);
                    });

                    var selectedRegencyName = "{{ $user->regency }}";

                    if (selectedRegencyName) {
                        regencySelect.val(selectedRegencyName).trigger('change');
                    }
                }
            });
        }
    };

    $('#avatarFile').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    $('#uploadButton').click(function() {
        $('#avatarFile').click();
    });
});

    // Input name
    var count = $('#name').val().length;
    $('#nameL').text(count);

    // Check character count on input
    $('#name').on('input', function() {
        var maxLength = 50;
        var textLength = $(this).val().length;
        $('#nameL').text(textLength);
        
        if (textLength >= maxLength) {
            $('#nameW').addClass('text-[#c82323]');
        } else {
            $('#nameW').removeClass('text-[#c82323]');
        }
    });

    // Input bio
    var count = $('#bio').val().length;
    $('#bioL').text(count);

    $('#bio').on('input', function() {
        var maxLength = 100;
        var textLength = $(this).val().length;
        $('#bioL').text(textLength);

        if (textLength >= maxLength) {
            $('#bioW').addClass('text-[#c82323]');
        } else {
            $('#bioW').removeClass('text-[#c82323]');
        }
    });

    // Input x
    var count = $('#x').val().length;
    $('#xL').text(count);

    $('#x').on('input', function() {
        var maxLength = 100;
        var textLength = $(this).val().length;
        $('#xL').text(textLength);

        if (textLength >= maxLength) {
            $('#xW').addClass('text-[#c82323]');
        } else {
            $('#xW').removeClass('text-[#c82323]');
        }
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
            url: "{{ route('profil.delete') }}",
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