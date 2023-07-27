@extends('layouts.app')

@section('titulo')
    Crea una nueva publicacion
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-6/12 px-10">
            <form id="dropzone" method="POST" enctype="multipart/form-data" action="{{ route('imagenes.store') }}" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-6/12 p-10  bg-white rounded-lg shadow-lg mt-6 md:mt-0">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 uppercase block text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input 
                    type="text"
                    name="titulo"
                    id="titulo"
                    placeholder="Titulo de la publicacion"
                    class="border p-3 w-full rounded-lg @error('titulo')
                        border-red-500
                    @enderror"
                    value="{{ old('titulo') }}"
                    />
 
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ str_replace('name', 'nombre', $message) }} </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 uppercase block text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea
                    name="descripcion"
                    id="descripcion"
                    placeholder="Descripcion de la publicacion"
                    class="border p-3 w-full rounded-lg @error('titulo')
                        border-red-500
                    @enderror"
                    >{{ old('titulo') }}</textarea>

                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ str_replace('name', 'nombre', $message) }} </p>
                    @enderror
                </div>

                <input type="submit" value="Crear Publicacion" class="bg-sky-600 hover:bg-sky-700 w-full p-3 text-white rounded-lg uppercase font-bold transition-colors cursor-pointer">

            </form>
        </div>
    </div>
@endsection