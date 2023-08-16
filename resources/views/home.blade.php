@extends('layouts.app')

@section('titulo')
@endsection

@section('contenido')

    @if ($posts->count())
                
        <div class="gap-4 flex flex-col justify-center max-w-lg p-3 mx-auto">
            @foreach ($posts as $post)
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <a href="{{route('posts.index', ['user' => $post->user])}}" class="w-11 ">
                            <img src="{{ $post->user->imagen ? asset('perfiles') . '/' . $post->user->imagen : asset('img/usuario.svg') }}" alt="Imagen usuario" class="rounded-full">                            
                        </a>
                        <a href="{{route('posts.index', ['user' => $post->user])}}" class="font-bold">
                            {{$post->user->username}} •
                        </a>
                        <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                    </div>

                    <a href="{{route('posts.show', ['user' => $post->user, 'post' => $post])}}" class="">
                        <img src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                    </a>

                    <div class="flex gap-2 mt-1">
                        <livewire:like-post :post='$post'>

                        <a href="{{route('posts.show', ['user' => $post->user, 'post' => $post])}}" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>                            
                        </a>
                        <p>{{$post->comentarios->count()}}</p>
                              
                    </div>
                    <div class="flex gap-1">
                        <p class="font-bold">{{$post->user->username}}</p>
                        <p>{{$post->titulo}}</p>
                    </div>

                    <p class="mt-2 border-t"></p>

                </div>
            @endforeach
        </div>

        <div class="my-6">
            {{ $posts->links('pagination::tailwind') }}
        </div>

    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
    @endif
        

@endsection