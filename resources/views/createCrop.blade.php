@extends('layouts.app-session')
@section('content')


    <main class="mt-20 flex justify-center h-[1000px]">
        <div class="flex flex-col items-center w-full md:w-[80%] h-[900px] bg-gris-claro rounded-lg p-1 gap-3">
            <h1 class= "text-gris-oscuro text-4xl climate m-4">Crea tu Cultivo:</h1>
            <section class="h-full bg-white p-9 w-full sm:w-1/2 m-4">
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
                <form method="POST" id="createCropForm" name='action' action="{{ route('store.crop') }}" >
                    @csrf
                    @method('POST')

                    <div class="mt-5 mb-9">
                        <label for="name" class="block text-gray-700">Nombre</label>
                        <input autocomplete="off" type="text" name="name" id="name" required value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                    </div>

                    <div class="mb-9">
                        <label for="description" class="block text-gray-700">Descripción:</label>
                        <textarea autocomplete="off" name="description" id="description" class="resize-none w-full px-3 py-2 h-[130px] border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">{{ old('description') }}</textarea>

                    </div>
                    <div class="mb-9">
                        <label for="sowing_date" class="block text-gray-700">Fecha de siembra:</label>
                        <input type="date" name="sowing_date" id="sowing_date" required value="{{ old('sowing_date') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                    </div>
                    <div class="mb-9">
                        <label for="harvest_date" class="block text-gray-700">Fecha de cosecha aproximada:</label>
                        <input type="date" name="harvest_date" id="harvest_date" required value="{{ old('harvest_date') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                    </div>
                    <div class="mb-9">
                        <label for="status" class="block text-gray-700">Estado:</label>
                        <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                            <option value="sowed">Sembrado</option>
                            <option value="harvestable">Listo para cosechar</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        Crear Cultivo.
                    </button>
                </form>

        </div>


    </main>

@endsection
