@extends('layouts.app-session')
@section('content')
    <main class="min-h-screen bg-gradient-to-b from-gris-claro to-green-100 py-12 px-4 sm:px-6 lg:px-8 mt-20">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center bg-white bg-opacity-90 rounded-md px-8 py-4 shadow-lg">
                <img src="{{ asset('images/leaf.png') }}" alt="hoja" class="w-12 h-12 mr-4 animate-bounce">
                <h1 class="text-3xl md:text-5xl font-bold text-gris-profundo climate">
                    Bienvenid@ a tu huerto comunitario
                </h1>
                <img src="{{ asset('images/leaf.png') }}" alt="hoja" class="w-12 h-12 ml-4 animate-bounce delay-400">
            </div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-l shadow-lg overflow-hidden transform transition hover:scale-105 duration-500">
                <div class="bg-verde-oscuro p-4">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-7 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        <h2 class="text-xl font-bold">Próximos Eventos</h2>
                    </div>
                </div>
                <div class="p-6 h-96 overflow-y-auto">
                    @if (empty($events))
                        <div class="flex flex-col items-center justify-center h-full text-gris-profundo">
                            <p class="text-lg">No hay eventos próximos</p>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach ($events as $event)
                                <div class="pl-4 py-2">
                                    <div class="flex items-start">
                                        @if (!is_null($event->image_id))
                                            <div class="flex-shrink-0 mr-4">
                                                <x-cloudinary::image public-id="{{ $event->image_id }}"
                                                    class="h-16 w-16 rounded-md object-cover"  alt="image-event"/>
                                            </div>
                                        @endif
                                        <div>
                                            <h3 class="font-bold text-lg text-gris-profundo">{{ $event->name }}</h3>
                                            <p class="text-sm text-gray-600">{{ $event->description }}</p>
                                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                {{ \Carbon\Carbon::parse($event->event_date)->format('d M, Y H:i') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="bg-gray-50 px-6 py-4 text-right">
                    <a href="{{ route('events') }}" class="text-sm font-medium text-verde-profundo hover:underline">Ver
                        todos los eventos </a>
                </div>
            </div>

            <div class="bg-white rounded shadow-lg overflow-hidden transform transition hover:scale-105 duration-500">
                <div class="bg-amarillo-oscuro p-4">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-7 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <h2 class="text-xl font-bold">Tareas del Huerto</h2>
                    </div>
                </div>
                <div class="p-6 h-96 overflow-y-auto">
                    @if ($tasks->isEmpty())
                        <div class="flex flex-col items-center justify-center h-full text-gris-profundo">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <p class="text-lg">No hay tareas pendientes</p>
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach ($tasks as $task)
                                <div
                                    class="p-3 rounded-lg border {{ is_null($task->completed_date) ? 'bg-yellow-50 border-yellow-200' : 'bg-green-50 border-green-200' }}">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 pt-1">
                                            @if (is_null($task->completed_date))
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            @endif
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <p
                                                class="text-sm font-medium text-gray-900 {{ !is_null($task->completed_date) ? 'line-through' : '' }}">
                                                {{ $task->task_name }}
                                            </p>
                                            @if (!is_null($task->completed_date))
                                                <p class="text-xs text-green-600 mt-1">
                                                    Completada el
                                                    {{ \Carbon\Carbon::parse($task->completed_date)->format('d/m/Y') }}
                                                </p>
                                            @else
                                                <p class="text-xs text-yellow-600 mt-1">Pendiente</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="bg-gray-50 px-6 py-4 text-right">
                    <a href="{{ route('myplot') }}" class="text-sm font-medium text-verde-profundo hover:underline">Ver
                        todas las tareas </a>
                </div>
            </div>

            <div class="bg-white rounded-r shadow-lg overflow-hidden transform transition hover:scale-105 duration-500">
                <div class="bg-red-400 p-4">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-7 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <h2 class="text-xl font-bold ">Resumen de Actividad</h2>
                    </div>
                </div>
                <div class="p-6 h-96">
                    <div class="space-y-6">
                        <div class="flex flex-col space-y-6">
                            <div class="bg-red-100 p-4 rounded-lg text-center">
                                <p class="text-3xl font-bold text-red-600">{{ count($events) }}</p>
                                <p class="text-sm text-red-600">Eventos</p>
                            </div>
                            <div class="bg-yellow-50 p-4 rounded-lg text-center">
                                <p class="text-3xl font-bold text-yellow-600">
                                    {{ $tasks->whereNull('completed_date')->count() }}</p>
                                <p class="text-sm text-gray-600">Tareas pendientes</p>
                            </div>
                            <div class="bg-verde-claro p-4 rounded-lg text-center">
                                <p class="text-3xl font-bold text-verde-profundo">
                                    {{ $tasks->whereNotNull('completed_date')->count() }}</p>
                                <p class="text-sm text-gray-600">Tareas completadas</p>
                            </div>
                        </div>

                    </div>
                    
                </div>
                <div class="bg-gray-50 px-6 py-4 text-right">
                        <a href="{{ route('calendar') }}"
                            class="text-sm font-medium text-verde-profundo hover:underline">Ver
                            el calendario </a>
                    </div>
            </div>
        </div>

    </main>
@endsection
