@extends('layouts.app')

@section('titulo')
    Tu cuenta
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen usuario">
            </div>
            <div class="md:w-8/12 lg:6/12 px-5">
                <p>{{ $user->username }} </p>
            </div>
        </div>
    </div>
@endsection