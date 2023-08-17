@extends('layouts.app')

@section('titulo')
   Talvez conoscas
@endsection

@section('contenido')
   <div class="flex flex-col max-w-lg p-4 gap-3 justify-center mx-auto">
      @foreach ($users as $user)
         <div class="flex justify-between">
            @if ($user->id !== auth()->user()->id)
               <a href="{{route('posts.index', $user)}}" class="flex gap-1 items-center justify-between">
                  <div class="flex gap-1 items-center">
                     <img
                     class="rounded-full w-10" 
                     src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg') }}" 
                     alt="Imagen usuario"
                     >                            
               
                     <p class="font-bold">
                        {{$user->name}}
                     </p>
                     <p class="font-sm">
                        | {{$user->username}}
                     </p>

                  </div>
               </a>
               
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
               @endif
         
         </div>
      @endforeach
   </div>
@endsection