@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ session('mensaje') }} </p>
                @endif
                
                <div class="mb-5">
                    <label for="username" class="mb-2 uppercase block text-gray-500 font-bold">
                        username
                    </label>
                    <input 
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Tu nombre de usuario"
                    value="{{auth()->user()->username}}"
                    class="border p-3 w-full rounded-lg @error('username')
                        border-red-500
                    @enderror"
                    />

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{  $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 uppercase block text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                    type="text"
                    name="email"
                    id="email"
                    placeholder="Tu correo de usuario"
                    value="{{auth()->user()->email}}"
                    class="border p-3 w-full rounded-lg @error('email')
                        border-red-500
                    @enderror"
                    />

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{  $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 uppercase block text-gray-500 font-bold">
                        Imagen de Perfil
                    </label>
                    <input 
                    type="file"
                    name="imagen"
                    accept=".jpg, .png, .jpeg"
                    id="imagen"
                    />
                </div>

                <div class="mb-5">
                    <label for="oldPassword" class="mb-2 uppercase block text-gray-500 font-bold">
                        Password Actual
                    </label>
                    <input 
                    type="password"
                    name="oldPassword"
                    id="oldPassword"
                    placeholder="Tu password Actual"
                    class="border p-3 w-full rounded-lg @error('oldPassword')
                        border-red-500
                    @enderror"
                    />

                    @error('oldPassword')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{  $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 uppercase block text-gray-500 font-bold">
                        Nuevo Password
                    </label>
                    <input 
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Tu nuevo password"
                    class="border p-3 w-full rounded-lg @error('password')
                        border-red-500
                    @enderror"
                    />

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{  $message }} </p>
                    @enderror
                </div>

                <input type="submit" value="Guardar Cambios" class="bg-sky-600 hover:bg-sky-700 w-full p-3 text-white rounded-lg uppercase font-bold transition-colors cursor-pointer">

            </form>
        </div>
    </div>
@endsection