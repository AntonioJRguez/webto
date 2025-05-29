@extends('layouts.app-session')

@section('content')


    <main class="mt-20 flex justify-center ">
        <div class="flex flex-col items-center w-[80%] h-full bg-gris-claro rounded-lg p-4">
            <h1 class= "text-gris-oscuro text-xl">Crea tu tarea:</h1>
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
            <form method="POST" id="createPlotForm" name='action' action="{{ route('update.task', $task->id) }}">
                @csrf
                @method('POST')
             
                <div class="mt-3 mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input autocomplete="off" type="text" name="name" id="name" required
                        value="{{ old('task_name', $task->task_name)  }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Descripción:</label>
                    <textarea autocomplete="off" name="description" id="description" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $task->description) }}</textarea>

                </div>
                <div class="mb-4">
                    <label for="limit_date" class="block text-gray-700">Dia de realización:</label>
                    <input type="date" name="limit_date" id="limit_date" required
                        value="{{ old('limit_date', date('Y-m-d', strtotime($task->limit_date))) }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="periodicity" class="block text-gray-700">Periodicidad:</label>
                    <select name="periodicity" id="periodicity" required
                        value="{{ old('periodicity',$task->time_period) }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option {{  $task->time_period == 0 ? 'selected' : '' }} value="0">No es periódica</option>
                        <option {{  $task->time_period == 1 ? 'selected' : '' }} value="1">Diaria</option>
                        <option {{  $task->time_period == 7 ? 'selected' : '' }} value="7">Semanal</option>
                        <option {{  $task->time_period == 30 ? 'selected' : '' }} value="30">Mensual</option>
                    </select>
                </div>
        
                <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Editar Tarea.
                </button>
            </form>
            
            </div>


    </main>

@endsection
