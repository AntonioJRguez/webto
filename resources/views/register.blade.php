@extends('layouts.app-basic')
@section('content')
    <!-- Contenido para probar el scroll -->

    <section id="inicio" class="flex justify-center items-center m-4">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:w-[50%] md:w-[30%] ">
            <h2 class="text-2xl font-bold text-center mb-4">Regístrate</h2>
    
            @if ($errors->any())
                <div class="mb-4 p-2 bg-red-200 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Nombre</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none" value="{{ old('name') }}" required>
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none" value="{{ old('email') }}" required>
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700">Teléfono</label>
                    <input type="text" name="phone_number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none" value="{{ old('phone_number') }}">
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700">Código de parcela</label>
                    <input type="text" name="plot_code" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none" required>
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700">Contraseña</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none" required>
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none" required>
                </div>
    
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                    Registrarse
                </button>
            </form>
        </div>
        
    </section>
@endsection