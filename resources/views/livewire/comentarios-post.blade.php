<div>
    <div class=" shadow bg-white p-5 mb-5">

        <div class="bg-white mt-1 shadow mb-5 max-h-96 overflow-y-scroll">
            @if ($post->comentarios->count())
                @foreach ($post->comentarios as $comentario)
                    <div class="p-5 border-gray-300 border-b">
                        <p><a href="{{route('posts.index', $comentario->user)}}" class="font-bold">{{$comentario->user->username}}</a> {{$comentario->comentario}}</p>
                        <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                    </div>
                @endforeach
            @else
                <p class="p-10 text-center">No hay comentarios aun</p>
            @endif
        </div>
    @auth

        <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

        <form wire:submit.prevent="agregaComentario">
            <div class="mb-5">
                <label for="comentario" class="mb-2 uppercase block text-gray-500 font-bold">
                    Añade un comentario
                </label>
                <textarea
                wire:model='comentario'
                name="comentario"
                id="comentario"
                placeholder="Agrega un comentario"
                class="border p-3 w-full rounded-lg @error('comentario')
                    border-red-500
                @enderror"
                ></textarea>

                @error('comentario')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}} </p>
                @enderror
            </div>

            <input type="submit" value="Comentar" class="bg-sky-600 hover:bg-sky-700 w-full p-3 text-white rounded-lg uppercase font-bold transition-colors cursor-pointer">

        </form>
        @endauth

        
    </div>
</div>
