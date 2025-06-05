@extends('layouts.app-session')
@section('content')


       <main class="mt-20 flex justify-center h-[1000px]">
        <div class="flex flex-col items-center w-full md:w-[80%] h-[900px] bg-gris-claro rounded-lg p-1 gap-3">
            <h1 class= "text-gris-oscuro text-4xl climate m-4">Crea tu Tarea:</h1>
            <section class="h-full bg-white p-9 w-full sm:w-1/2 m-4">
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
            <form method="POST" id="createPlotForm" name='action' action="{{ route('store.task') }}">
                @csrf
                @method('POST')
                
                <div class="mt-3 mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input autocomplete="off" type="text" name="task_name" id="task_name" required
                        value="{{ old('task_name') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Descripción:</label>
                    <textarea autocomplete="off" name="description" id="description" class="resize-none w-full px-3 py-2 h-[130px] border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">{{old('description')}}</textarea>

                </div>
                <div class="mb-4">
                    <label for="limit_date" class="block text-gray-700">Dia de realización:</label>
                    <input type="date" name="limit_date" id="limit_date" required
                        value="{{ old('limit_date') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                </div>
                <div class="mb-4">
                    <label for="periodicity" class="block text-gray-700">Periodicidad:</label>
                    <select name="periodicity" id="periodicity" required
                        value="{{ old('periodicity') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                        <option value="0">No es periódica</option>
                        <option value="1">Diaria</option>
                        <option value="7">Semanal</option>
                        <option value="30">Mensual</option>
                    </select>
                </div>
        
                <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Crear Tarea.
                </button>
            </form>
            
            </div>


    </main>

@endsection
