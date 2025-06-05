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
    <x-modal>
        <x-slot name="modalTitle">
            <x-slot name="id">
                modal-login
            </x-slot>
        Iniciar Sesión
        </x-slot>
        <x-slot name="modalMain">
            <form action="{{ route('loginUser') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Correo Electrónico</label>
                    <input type="email" name="email" id="email" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
    
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
    
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Iniciar Sesión
                </button>
            </form>

            <section class="text-sm"> <a href="{{route('register')}}">¿No tienes cuenta? Regístrate.</a></section>
        </x-slot>
    </x-modal>
    <x-modal>
        <x-slot name="modalTitle">
            <x-slot name="id">
                modal-admin
            </x-slot>
        Iniciar sesión como administrador
        </x-slot>
        <x-slot name="modalMain">
            @if(session('error'))
            <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('loginAdmin') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" id="email" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Iniciar Sesión
            </button>
        </form>
        </x-slot>
    </x-modal>
    
@endsection