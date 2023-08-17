@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:6/12 px-5 ">
                <img src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg') }}" alt="Imagen usuario" class="rounded-md">
            </div>
            <div class="md:w-8/12 lg:6/12 px-5 flex items-center md:items-start flex-col pt-5 pb-3 justify-center">
                <div class="flex text-center gap-2">
                    <p class="text-gray-700 text-2xl capitalize">{{ $user->username }} </p>
    
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a 
                            href="{{route('perfil.index')}}" 
                            class="text-gray-500 cursor-pointer hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                </svg>
                            </a>    
    
                        @endif
                    @endauth
                </div>

                <p class="text-gray-800 text-sm mb-3 font-bold mt-4">
                    {{$user->followers->count()}}
                    <span class="font-normal"> @choice('Seguidor|Seguidores', $user->followers->count()) </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->following->count()}}
                    <span class="font-normal"> Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->posts()->count()}}
                    <span class="font-normal"> Posts</span>
                </p>

                @auth
                @if ($user->id !== auth()->user()->id)
                    @if (!$user->siguiendo(auth()->user()))
                        
                        <form 
                        action="{{ route('users.follow', $user) }}"
                        method="POST"  
                        >
                            
                            @csrf

                            <input type="submit" value="Seguir" class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer">

                        </form>
                    @else
                        <form 
                        action="{{route('users.unfollow', $user)}}"
                        method="POST"
                        >
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Dejar de seguir" class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer">

                        </form>
                        
                    @endif

                @endif
                    

                @endauth
            </div>
        </div>
    </div>

    @if ($user->id === auth()->user()->id)
        <div class="flex justify-center w-35 mx-auto mt-2">
            <a href="{{route('conocer')}}" 
                class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded sm:text-sm text-xs uppercase font-bold cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                    </svg>                                           
                Conocer gente
            </a>
        </div>        
    @endif

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-3">Publicaciones</h2>

        <x-listar-post :posts="$posts" />

    </section>
@endsection