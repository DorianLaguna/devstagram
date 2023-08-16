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

            <livewire:comentarios-post :post="$post" :user="$user"/>

        </div>
    </div>
@endsection