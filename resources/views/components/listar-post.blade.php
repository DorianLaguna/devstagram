<div>
    @if ($posts->count())
            
        <div class="grid grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-1 p-2">
            @foreach ($posts as $post)
                <div>
                    <a href="{{route('posts.show', ['user' => $post->user, 'post' => $post])}}" class="">
                        <img src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="my-6">
            {{ $posts->links('pagination::tailwind') }}
        </div>

    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
    @endif
</div>