@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img class="" src="{{asset('uploads') . "/" . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
            <div class="p-3 flex items-center gap-4">
                @auth

                @php
                    $mensaje = "Hola mundo desde una variable";
                @endphp

                <livewire:like-post :post="$post" />

                @endauth
                                  
            </div>

            <div class="p-2">
                <p class="fond-bold">{{$post->user->username}}</p>
                <p class="text-sm text-gray-500">
                    {{$post->created_at->diffForHumans()}}
                </p>
                <p class="mt-5">
                    {{$post->descripcion}}
                </p>
            </div>

            @auth()
                @if($post->user_id === auth()->user()->id)
                <form action="{{route('posts.destroy', $post)}}" method="POST" class="p-2">
                    @method('DELETE')
                    @csrf
                    <input 
                    type="submit"
                    value="Eliminar publicacion"
                    class="bg-red-500 hover:bg-red-600 mt-4 cursor-pointer p-2 rounded text-white font-bold"
                    />
                </form>
                @endif
            @endauth
        </div>

        <div class="md:w-1/2 p-5 md:pt-0">
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
                
                @if (session('mensaje'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{session('mensaje')}}
                    </div>
                @endif

                <form action="{{route('comentarios.store', ['post' => $post, 'user' => $user] ) }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 uppercase block text-gray-500 font-bold">
                            Añade un comentario
                        </label>
                        <textarea
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
    </div>
@endsection