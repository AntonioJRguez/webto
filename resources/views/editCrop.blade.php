@extends('layouts.app-session')
@section('content')


    <main class="mt-20 flex justify-center ">
        <div class="flex flex-col items-center w-[80%] h-full bg-gris-claro rounded-lg p-4">
            <h1 class= "text-gris-oscuro text-xl">Crea tu Cultivo:</h1>
            <section class="h-full bg-white p-8">
                @if (session('success'))
                    <div class="bg-green-500 text-white p-3 rounded mb-4 text-center animate-fade-in-up">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="bg-red-500 text-white p-3 rounded mb-4 text-center animate-fade-in-up">
                            {{ $error }}</div>
                    @endforeach
                @endif
                <form method="POST" id="editCropForm" name='action' action="{{ route('update.crop', $crop->id) }}">
                    @csrf
                    @method('POST')

                    <div class="mt-3 mb-4">
                        <label for="name" class="block text-gray-700">Nombre</label>
                        <input autocomplete="off" type="text" name="name" id="name" required value="{{ old('name', $crop->name) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Descripción:</label>
                        <textarea autocomplete="off" name="description" id="description" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $crop->description) }}</textarea>

                    </div>
                    <div class="mb-4">
                        <label for="sowest_date" class="block text-gray-700">Fecha de siembra:</label>
                        <input type="date" name="sowest_date" id="sowing_date" required value="{{ old('sowing_date',  date('Y-m-d', strtotime($crop->sowing_date))) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="harvest_date" class="block text-gray-700">Fecha de cosecha aproximada:</label>
                        <input type="date" name="harvest_date" id="harvest_date" required value="{{ old('harvest_date',  date('Y-m-d', strtotime($crop->harvest_date))) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700">Estado:</label>
                        <select name="status" id="status">
                            <option {{  $crop->status == 'sowed' ? 'selected' : '' }} value="sowed">Sembrado</option>
                            <option {{  $crop->status == 'harvestable' ? 'selected' : '' }} value="harvestable">Listo para cosechar</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        Editar Cultivo.
                    </button>
                </form>

        </div>


    </main>

@endsection
