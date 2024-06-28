@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <section id="profil" class="relative flex py-20 lg:px-40 px-8 justify-center items-center gap-12">
        <img src="{{ $user->avatar ? (filter_var($user->avatar, FILTER_VALIDATE_URL) ? $user->avatar : asset('storage/' . $user->avatar)) : asset('user.jpg') }}" alt="{{ $user->name }}" class="size-80 object-cover rounded-full hidden md:block z-20">
        <div class="z-20">
            <div class="md:text-6xl text-5xl font-bold mb-2">{{ $user->name }}</div>
            @if ($user->bio)
                <div class="text-sm md:text-base mb-3">{{ $user->bio }}</div>     
            @endif
            <div class="flex text-[#A8A8A8] text-sm gap-4 mb-8">
                @if ($address)
                    <div class="flex justify-center items-center gap-2 hover:text-[#C82323]">                    
                        <svg class="size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                        </svg>                      
                        <p>{{ $address }}</p>
                    </div>
                @endif
                @if ($user->x)
                    <div class="flex justify-center items-center gap-2 hover:text-[#C82323]">  
                        @if ($address)
                            <div>|</div>
                        @endif                  
                        <a href="https://twitter.com/{{ $x }}" target="_blank" class="flex justify-center items-center gap-2 hover:text-[#C82323]">
                            <svg class="size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z" clip-rule="evenodd"/>
                            </svg>                       
                            <p>{{ '@'.$x }}</p>
                        </a>
                    </div>
                @endif
            </div>
            @can('user', $user->id)
                <a href="/profil/{{ $user->slug }}/edit" class="py-2 px-4 bg-[#C82323] rounded-lg font-bold hover:outline-[#c82323] hover:bg-transparent hover:outline transition-colors">Edit profil</a>
            @endcan
        </div>
        <img src="{{ url('clip.svg') }}" class="absolute inset-0 object-cover size-full z-10 pointer-events-none">
    </section>
    <section id="survei">
        <div class="w-full h-20 bg-[#1e1e1e] lg:px-40 px-8 flex items-center" id="profil-nav">
            <a id="reg" href="#reg" class="klik hover:border-b-4 hover:border-[#C82323] px-8 self-end pb-6" data-toggle="tab">Petisi saya</a>
            <a id="done" href="#done" class="klik hover:border-b-4 hover:border-[#C82323] px-8 self-end pb-6" data-toggle="tab">Petisi yang saya dukung</a>
        </div>
        <div class="relative z-20 flex flex-col items-center gap-10 my-10 lg:mx-40 mx-4" id="isi-tab">
            <l-ring-2
                size="40"
                stroke="5"
                stroke-length="0.25"
                bg-opacity="0.1"
                speed="0.8" 
                color="red" 
            >
            </l-ring-2>
        </div>
    </section>
@endsection

@section('javascripts')
<script type="text/javascript">
    function petitionLikeData(petitionId, initiallyLiked, initialLikesCount) {
        return {
            liked: initiallyLiked,
            likesCount: initialLikesCount,
            loading: false,
            auth: @js(Auth::check()),
    
            get likesCountText() {
                return this.likesCount === 0 ? '0 Suka' : `${this.likesCount} Suka`;
            },
    
            async submitForm() {
                if (!this.auth) {
                    window.location.href = '/login';
                    return;
                }
                this.loading = true;
                const url = this.liked ? `/petitions/${petitionId}/unlike` : `/petitions/${petitionId}/like`;
                const method = this.liked ? 'DELETE' : 'POST';
    
                try {
                    const response = await fetch(url, {
                        method: method,
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    });
    
                    const data = await response.json();
                    if (response.ok) {
                        this.liked = !this.liked;
                        this.likesCount = data.likesCount;
                    } else {
                        console.error('An error occurred:', data.message);
                    }
                } catch (error) {
                    console.error('An error occurred:', error);
                } finally {
                    this.loading = false;
                }
            },
        }
    }
    $(document).ready(function() {
        var activeTab = "{{ session('tab-profil', '#reg') }}";
        $(activeTab).addClass('border-b-4 border-[#C82323]');

        $('.klik').click(function(e) {
            var tab_id = $(this).attr('href');

            $('.klik').removeClass('border-b-4 border-[#C82323]');

            $(this).addClass('border-b-4 border-[#C82323]');

            update_session_tab(tab_id);
            e.preventDefault();
        });

        function update_session_tab(tab_id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    _token: "{{ csrf_token() }}",
                    tab_id: tab_id,
                },
                type: 'post',
                datatype: 'json',
                url: '{{ route('profil.update_session_tabs') }}',
                success: function(response) {
                    console.log(response);
                }
            });
        };

        var tab_id = "{{ session('tab-profil') }}";
        if (tab_id == '' || tab_id == '#reg') {
            $('#isi-tab').load(
                '{{ route('profil.reg', ['slug' => $user->slug]) }}'
            );
        } else if (tab_id == '#done'){
            $('#isi-tab').load(
                '{{ route('profil.done', ['slug' => $user->slug]) }}'
            );
        };

        $('.klik').click(function() {
            var tab_id = $(this).attr('href');
            $('#isi-tab').html(
                '<l-ring-2 ' +
                    'size="40" ' +
                    'stroke="5" ' +
                    'stroke-length="0.25" ' +
                    'bg-opacity="0.1" ' +
                    'speed="0.8" ' +
                    'color="red">' +
                '</l-ring-2>'
            );
            if (tab_id == '#reg') {
                $('#isi-tab').load(
                    '{{ route('profil.reg', ['slug' => $user->slug]) }}'
                );
            } else if (tab_id == '#done'){
                $('#isi-tab').load(
                    '{{ route('profil.done', ['slug' => $user->slug]) }}'
                );
            }
        });
    });
</script>
@endsection