@extends('layouts.app-session')

@section('content')


       <main class="mt-20 flex justify-center h-[1000px]">
        <div class="flex flex-col items-center w-full md:w-[80%] h-[900px] bg-gris-claro rounded-lg p-1 gap-3">
            <h1 class= "text-gris-oscuro text-4xl climate m-4">Edita tu tarea:</h1>
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
            <form method="POST" id="createPlotForm" name='action' action="{{ route('update.task', $task->id) }}">
                @csrf
                @method('POST')
             
                <div class="mt-3 mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input autocomplete="off" type="text" name="name" id="name" required
                        value="{{ old('task_name', $task->task_name)  }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Descripción:</label>
                    <textarea autocomplete="off" name="description" id="description" class="resize-none w-full px-3 py-2 h-[130px] border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">{{ old('description', $task->description) }}</textarea>

                </div>
                <div class="mb-4">
                    <label for="limit_date" class="block text-gray-700">Dia de realización:</label>
                    <input type="date" name="limit_date" id="limit_date" required
                        value="{{ old('limit_date', date('Y-m-d', strtotime($task->limit_date))) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
                </div>
                <div class="mb-4">
                    <label for="periodicity" class="block text-gray-700">Periodicidad:</label>
                    <select name="periodicity" id="periodicity" required
                        value="{{ old('periodicity',$task->time_period) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200 outline-none">
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
