@foreach ($comments as $comment)
<div class="flex items-start gap-4 mb-4 mt-5">
    <img src="{{ $comment->user->avatar ? (filter_var($comment->user->avatar, FILTER_VALIDATE_URL) ? $comment->user->avatar : asset('storage/' . $comment->user->avatar)) : asset('user.jpg') }}" class="rounded-full size-8 self-start">
    <div class="flex flex-col w-full">
        <div class="flex justify-between">
            <div class="flex gap-2">
                <p class="font-bold">{{ $comment->user->name }}</p>
                <p class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
            {{-- <button onclick="deleteFunction()">
                <svg class="size-6 text-[#c82323]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                </svg> 
            </button> --}}
        </div>
        <p class="mt-5">{{ $comment->content }}</p>
        <div class="inline-flex gap-2 items-center cursor-pointer mt-2">
            <button id="likeButton" onclick="toggleLike()">
                <svg class="size-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M15.03 9.684h3.965c.322 0 .64.08.925.232.286.153.532.374.717.645a2.109 2.109 0 0 1 .242 1.883l-2.36 7.201c-.288.814-.48 1.355-1.884 1.355-2.072 0-4.276-.677-6.157-1.256-.472-.145-.924-.284-1.348-.404h-.115V9.478a25.485 25.485 0 0 0 4.238-5.514 1.8 1.8 0 0 1 .901-.83 1.74 1.74 0 0 1 1.21-.048c.396.13.736.397.96.757.225.36.32.788.269 1.211l-1.562 4.63ZM4.177 10H7v8a2 2 0 1 1-4 0v-6.823C3 10.527 3.527 10 4.176 10Z" clip-rule="evenodd"/>
                </svg>
            </button>
            <small>{{ $comment->likes_count }} Suka</small>
        </div>
    </div>
</div>
<hr>
@endforeach