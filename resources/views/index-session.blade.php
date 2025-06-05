@extends('layouts.app-session')
@section('content')
    <main class="mt-20 flex-grow flex flex-col items-center h-full w-full">
        {{-- <h1 class="text-4xl md:text-5xl lg:text-9xl font-extrabold leading-tight tracking-tight text-gris-profundo climate">Tu huerto:</h1>
         --}}

        <div class="flex items-center justify-center space-x-4 bg-white bg-opacity-80 p-2 rounded-lg">
            <img src="{{ asset('images/leaf.png') }}" alt="hoja izquierda" class="w-16 h-16 object-contain " />

            <h1 class="text-2xl md:text-8xl font-extrabold text-gris-profundo climate">
                Tu huerto:
            </h1>

            <img src="{{ asset('images/leaf.png') }}" alt="hoja derecha" class="w-16 h-16 object-contain " />
        </div>

        <section class="mt-10 flex flex-col w-full h-full">
            <div class="flex flex-col md:flex-row md:justify-evenly ">
                <div
                    class="bg-gris-claro border-solid border-4  shadow-lg rounded-lg h-[600px] md:w-1/3 overflow-auto flex flex-col items-center p-3 m-7">
                    <div class="flex items-center justify-center  mb-4 mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        <h1 class=" text-2xl font-bold text-center text-gris-profundo ">Eventos próximos</h1>
                    </div>
                    @if ($events->isEmpty())
                        <div class="flex h-20 items-center justify-center  text-sm">
                            <p>No hay ningún evento próximamente.</p>
                        </div>
                    @else
                        @foreach ($events as $event)
                            <div class="flex items-center m-4 ">
                                <div class="w-16 h-16 bg-gray-300 rounded-md flex-shrink-0 overflow-hidden">
                                    @if (!is_null($event->image_id))
                                        <x-cloudinary::image public-id="{{ $event->image_id }}" />
                                    @else
                                        <x-cloudinary::image public-id="noimage" />
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-lg font-semibold text-gray-800">{{ $event->name }}</h2>
                                    <p class="text-gray-600 text-sm">
                                        {{ $event->description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div
                    class="bg-gris-claro shadow-lg rounded-lg h-[600px] md:w-1/3 overflow-auto flex flex-col items-center p-3 m-7">
                    <div class="max-w-lg mx-auto mt-5">
                        <div class="flex items-center justify-center  mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6 mr-1">
                                <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                                <path d="M2 6h4" />
                                <path d="M2 10h4" />
                                <path d="M2 14h4" />
                                <path d="M2 18h4" />
                                <path
                                    d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                            </svg>
                            <h1 class="text-2xl font-bold text-center text-gris-profundo">Tareas del Huerto
                            </h1>
                        </div>
                        <ul class="space-y-4">
                            @if ($tasks->isEmpty())
                                <div class="flex h-20 items-center justify-center  text-sm">
                                    <p>No hay ninguna tarea.</p>
                                </div>
                            @else
                                @foreach ($tasks as $task)
                                    @if (is_null($task->completed_date))
                                        <li
                                            class="flex items-center justify-between p-4 bg-yellow-100 border-l-4 border-yellow-500 rounded shadow">
                                            <div>
                                                <p class="text-lg font-medium text-yellow-800">{{ $task->task_name }}</p>
                                                <p class="text-sm text-yellow-800">Pendiente</p>
                                            </div>
                                            <span class="text-amarillo-oscuro font-bold">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </span>
                                        </li>
                                    @else
                                        <li
                                            class="flex items-center justify-between p-4 bg-verde-claro border-l-4 border-verde-profundo rounded shadow">
                                            <div>
                                                <p class="text-lg font-medium text-verde-profundo line-through">
                                                    {{ $task->task_name }}
                                                </p>
                                                <p class="text-sm text-verde-profundo">Realizada</p>
                                            </div>
                                            <span class="text-verde-profundo font-bold">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                            </span>
                                        </li>
                                    @endif
                                @endforeach
                                @endif
                        </ul>
                    </div>

                </div>
        </section>

    </main>
@endsection
