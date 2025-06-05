@extends('layouts.app-controlPanel')
@section('content')

   
    <!-- Contenido para probar el scroll -->
    <!-- Barra de navegación -->
    <main>

        <section class="h-full bg-white p-8">
            @if (session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4 text-center animate-fade-in-up">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="bg-red-500 text-white p-3 rounded mb-4 text-center animate-fade-in-up">{{ $error }}</div>
            @endforeach
        @endif
            <form method="POST" id="createEventForm" name='action' action="{{ route('admin.create.event') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mt-3 mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input autocomplete="off" type="text" name="name" id="name" required
                        value="{{ old('name') }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Descripción:</label>
                    <textarea autocomplete="off" name="description" id="description" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{old('description')}}</textarea>

                </div>
                <div class="mb-4">
                    <label for="location" class="block text-gray-700">Lugar de realización:</label>
                    <input autocomplete="off" type="text" name="location" id="location" required
                    value="{{ old('location') }}"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="capacity" class="block text-gray-700">Aforo:</label>
                    <input autocomplete="off" type="number" name="capacity" id="capacity" required
                    value="{{ old('capacity') }}"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="duration" class="block text-gray-700">Duracion (Horas):</label>
                    <input autocomplete="off" type="string" id="duration" name="duration" step="60" required
                    value="{{ old('duration') }} " placeholder="01:00"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="event_image" class="block text-gray-700">Imagen del evento (Opcional):</label>
                    <input type="file" name="event_image" id="event_image">
                </div>
                <div class="mb-4">
                    <label for="plot_name" class="block text-gray-700">Fecha de realización del evento:</label>
                    <input type="datetime-local" name="event_date" id="event_date" required
                        value="{{ old('event_date') }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
        
                <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Crear Evento.
                </button>
            </form>
        </section>

    </main>


    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
    @if ($errors->any())
        {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                console.log("llega aqui");
                showDialog("modal-admin-plots"); // Reemplaza con el ID de tu modal
            });
        </script> --}}
    @endif
@endsection
