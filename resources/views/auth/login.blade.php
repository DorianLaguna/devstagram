@extends('layouts.app')

@section('titulo')
    Inicia Sesion en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login Usuarios">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ session('mensaje') }} </p>
                @endif
                
                <div class="mb-5">
                    <label for="email" class="mb-2 uppercase block text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Tu Email"
                    class="border p-3 w-full rounded-lg @error('email')
                        border-red-500
                    @enderror"
                    value="{{ old('email') }}"
                    />

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{  $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 uppercase block text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password de Registro"
                    class="border p-3 w-full rounded-lg @error('password')
                        border-red-500
                    @enderror"
                    />

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{  $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label class="text-gray-500 text-sm">Mantener mi sesion abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesion" class="bg-sky-600 hover:bg-sky-700 w-full p-3 text-white rounded-lg uppercase font-bold transition-colors cursor-pointer">
            </form>
        </div>
    </div>
@endsection