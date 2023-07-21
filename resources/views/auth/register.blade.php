@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro Usuarios">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="">
                <div class="mb-5">
                    <label for="name" class="mb-2 uppercase block text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Tu Nombre"
                    class="border p-3 w-full rounded-lg"
                    />
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 uppercase block text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Tu Nombre de Usuario"
                    class="border p-3 w-full rounded-lg"
                    />
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 uppercase block text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Tu Email"
                    class="border p-3 w-full rounded-lg"
                    />
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
                    class="border p-3 w-full rounded-lg"
                    />
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 uppercase block text-gray-500 font-bold">
                        Repetir Password
                    </label>
                    <input 
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="Repite tu Password"
                    class="border p-3 w-full rounded-lg"
                    />
                </div>

                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 w-full p-3 text-white rounded-lg uppercase font-bold transition-colors cursor-pointer">
            </form>
        </div>
    </div>
@endsection