@extends('layouts.app-nosession')
@section('content')
    <!-- Contenido para probar el scroll -->

    <section id="inicio" class="h-screen bg-verde-claro flex flex-col justify-center items-center px-4 text-center">
        <div class="max-w-4xl flex flex-col items-center">
            <img src="{{ asset('images/manosaluda.png') }}" alt="saluda"
                class="h-32 mb-8 hover:scale-105 transition-transform duration-300">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 climate mb-6">Bienvenid@ a WEBTO</h1>
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-700 climate leading-relaxed">
                Tu plataforma donde podrás mantenerte al tanto de tu propia
                parcela y de lo que pasa alrededor. :)
            </h2>
        </div>
    </section>

    <section id="parcelas"
        class="h-screen bg-verde-oscuro flex flex-col md:flex-row justify-center items-center px-8 gap-8">
        <div class="max-w-md order-2 md:order-1 text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold text-white climate mb-6">
                Comparte las tareas de tu parcela con tus compañeros y guardad un histórico de lo que vais cultivando.
            </h2>
        </div>
        <div class="order-1 md:order-2">
            <img src="{{ asset('images/valla.png') }}" alt="parcela"
                class="h-48 md:h-64 hover:rotate-2 transition-transform duration-300">
        </div>
    </section>

    <section id="comunidad"
        class="h-screen bg-verde-claro flex flex-col md:flex-row-reverse justify-center items-center px-8 gap-8">
        <div class="max-w-md text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 climate mb-6">
                Apúntate a los eventos de tu comunidad <span class="text-verde-oscuro">y propón nuevos</span>.
            </h2>
        </div>
        <div>
            <img src="{{ asset('images/comunidad.png') }}" alt="comunidad"
                class="h-48 md:h-64 hover:-rotate-2 transition-transform duration-300">
        </div>
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
                    <input type="email" name="email" id="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                </div>

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Iniciar Sesión
                </button>
            </form>

            <section class="text-sm underline"> <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate.</a>
            </section>
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
            @if (session('error'))
                <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('loginAdmin') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Correo Electrónico</label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                </div>

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Iniciar Sesión
                </button>
            </form>
        </x-slot>
    </x-modal>
@endsection
