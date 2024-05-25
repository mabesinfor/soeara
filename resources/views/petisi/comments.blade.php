@foreach($comments as $comment)
    <div class="flex items-start gap-4 mb-4 md:ml-20 mt-5">
        <img src="{{ $comment->user->avatar ? (filter_var($comment->user->avatar, FILTER_VALIDATE_URL) ? $comment->user->avatar : asset('storage/' . $comment->user->avatar)) : asset('user.jpg') }}" class="rounded-full size-8">
        <div class="flex flex-col w-full">
            <div class="flex justify-between">
                <div class="flex gap-2">
                    <p class="font-bold">{{ $comment->user->name }}</p>
                    <p class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
                <button onclick="deleteFunction()">
                    <img src="{{ url('delete.svg') }}">
                </button>
            </div>
            <p class="mt-2">{{ $comment->content }}</p>
            <div class="inline-flex gap-2 items-center cursor-pointer mt-2">
                <button id="likeButton" onclick="toggleLike()">
                    <img id="likeImage" src="{{ url('like.svg') }}" class="text-black">
                </button>
                <small>{{ $comment->likes_count }} Suka</small>
            </div>
        </div>
    </div>
    <hr class="md:ml-20">
@endforeach