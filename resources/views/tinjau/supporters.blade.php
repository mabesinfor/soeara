@foreach ($supporters as $support)
    <div class="flex items-center justify-start gap-4 mb-8">
        <img src="{{ $support->users->avatar ? (filter_var($support->users->avatar, FILTER_VALIDATE_URL) ? $support->users->avatar : asset('storage/' . $support->users->avatar)) : asset('user.jpg') }}" class="rounded-full size-8 self-start">
        <p class="font-bold">{{ $support->users->name }}</p>
        <p class="text-gray-500">{{ $support->created_at->diffForHumans() }}</p>
    </div>
@endforeach