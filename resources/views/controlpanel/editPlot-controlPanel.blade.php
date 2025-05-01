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
            <form method="POST" id="editPlotForm" name='action' action="{{ route('admin.update.plot', compact('plot')) }}">
                @csrf
                @method('PUT')
                
                <div class="mt-3 mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input autocomplete="off" type="text" name="name" id="name" required
                        value="{{ old('name', $plot->name) }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Descripción:</label>
                    <textarea autocomplete="off" name="description" id="description" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{old('description', $plot->description)}}</textarea>

                </div>
                <div class="mb-4">
                    <label for="plot_name" class="block text-gray-700">Código de parcela</label>
                    <input type="text" name="plot_code" id="plot_name" required
                        value="{{ old('plot_code', $plot->plot_code) }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <p class="block text-gray-700">Usuarios: </p>
                    @if (!$plot->users->isEmpty())
                    
                    
                    <div class="flex">
                        @foreach ($plot->users as $user)
                            <div class="bg-slate-200 p-1 m-1 rounded">{{ $user->name }}</div>
                        @endforeach
                    </div>
                    @else
                    <div class="flex">
                            <div class="bg-green-200 p-1 m-1 rounded">Esta parcela está disponible ya que no tiene usuarios asignados.</div>
                    </div>
                    @endif
                </div>
                <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Modificar
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
