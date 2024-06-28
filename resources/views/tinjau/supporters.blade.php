@foreach ($supporters as $support)
    <a href="/profil/{{ $support->users->slug }}" class="flex items-center justify-start gap-4 mb-8 lg:ml-0 md:ml-0 ml-4">
        <img src="{{ $support->users->avatar ? (filter_var($support->users->avatar, FILTER_VALIDATE_URL) ? $support->users->avatar : asset('storage/' . $support->users->avatar)) : asset('user.jpg') }}" class="rounded-full size-8 self-start">
        <p class="font-bold">{{ $support->users->name }}</p>
        <p class="text-gray-500">{{ $support->created_at->diffForHumans() }}</p>
    </a>
@endforeach