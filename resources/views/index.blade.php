@extends('layouts.app-nosession')
@section('content')
    <!-- Contenido para probar el scroll -->

    <section id="inicio" class="h-screen bg-verde-claro flex justify-center items-center">
        <h1 class="text-4xl font-bold text-gray-800">Inicio</h1>
        
    </section>
    <section id="parcelas" class="h-screen bg-verde-oscuro flex justify-center items-center">
        <h1 class="text-4xl font-bold text-gray-800">Parcelas</h1>
    </section>
    <section id="comunidad" class="h-screen bg-verde-claro flex justify-center items-center">
        <h1 class="text-4xl font-bold text-gray-800">Comunidad</h1>
    </section>
    <section id="contacto" class="h-screen bg-verde-oscuro flex justify-center items-center">
        <h1 class="text-4xl font-bold text-gray-800">Contacto</h1>
    </section>
    <x-modal>
        <x-slot name="modalTitle">
            <x-slot name="id">
                modal-login
            </x-slot>
        Iniciar Sesión
        </x-slot>
        <x-slot name="modalMain">
            Iniciar Sesión

            <section class="text-sm"> <a href="{{route('register')}}">¿No tienes cuenta? Regístrate.</a></section>
        </x-slot>
    </x-modal>
@endsection