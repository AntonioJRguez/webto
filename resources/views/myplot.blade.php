@extends('layouts.app-session')
@section('content')


    <main class="mt-20 flex justify-center ">
        <div class="flex flex-col items-center w-[80%] h-full bg-gris-claro rounded-lg p-4">
            <h1 class= "text-gris-oscuro text-xl">{{ $plot->name }}</h1>
            <p>{{ $plot->description }}</p>
            

            {{-- @dump($completedTasks)
            @dump($pastTasks)
            @dump($todayTasks)
            @dump($futureTasks) --}}

            <div class="bg-white shadow-lg p-6 mb-6 mt-6 mx-auto w-[90%]">
                <h2 class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="size-6 mr-1">
                        <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                        <path d="M2 6h4" />
                        <path d="M2 10h4" />
                        <path d="M2 14h4" />
                        <path d="M2 18h4" />
                        <path
                            d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                    </svg> Tareas del día
                </h2>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h3 class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>Tareas pendientes
                        </h3>
                        <ul class="flex flex-col items-center space-y-2 m-3">
                            @foreach ($pastTasks as $pastTask)
                                <li class="flex items-center gap-3">
                                    <input type="checkbox" name="task{{ $pastTask['id'] }}" id="task1">
                                    <label for="task1">{{ $pastTask['task_name'] }}</label>

                                </li>
                            @endforeach
                            
                        </ul>
                        <div class="flex justify-center gap-2 mt-4">
                            <button class="bg-verde-claro hover:bg-verde-medio p-3 rounded-lg">Marcar como
                                realizada</button>
                            <button class="bg-red-400 hover:bg-red-500 p-3 rounded-lg">Eliminar</button>
                            <button class="bg-blue-400 hover:bg-blue-500 p-3 rounded-lg">Retrasar 1 dia</button>
                        </div>
                    </div>


                    <div class="h-full flex flex-col items-center">
                        <h3 class="flex justify-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                            Tareas próximas</h3>

                        <ul class="flex flex-col items-center space-y-2 m-3">
                            @foreach ($futureTasks as $nextTask)
                            <li class="flex items-center gap-3">
                                <p class="text-sm p-1 bg-amarillo-oscuro border-gris-medio">{{ date('d-m', strtotime($nextTask['limit_date'])) }}</p>
                                <p class="text-sm">{{$nextTask['task_name']}}</p>
                                <button class="bg-amarillo-claro hover:bg-amarillo-medio p-1 rounded-lg">Editar</button>
                                <button class="bg-red-400 hover:bg-red-500 p-1 rounded-lg">Eliminar</button>
                                <button class="bg-blue-400 hover:bg-blue-500 p-1 rounded-lg">Mover a pendientes</button>
                            </li>
                            @endforeach
                            <li class="flex items-center gap-3">
                                <p class="text-sm p-1 bg-amarillo-oscuro border-gris-medio">18-5</p>
                                <p class="text-sm"> Plantar aguacate</p>
                                <button class="bg-amarillo-claro hover:bg-amarillo-medio p-1 rounded-lg">Editar</button>
                                <button class="bg-red-400 hover:bg-red-500 p-1 rounded-lg">Eliminar</button>
                                <button class="bg-blue-400 hover:bg-blue-500 p-1 rounded-lg">Mover a pendientes</button>
                            </li>
                        </ul>
                        <button class="bg-verde-medio hover:bg-verde-oscuro rounded-lg mt-auto w-36 p-2">Añadir
                            Tarea</button>

                    </div>




                </div>

                <h3 class="flex justify-center mt-5">Tareas Pendientes</h3>
                <div class="flex gap-6 px-4 py-2 overflow-x-auto m-4 bg-amarillo-claro">
                    @foreach ($futureTasks as $nextTask)
                    <div class="flex-shrink-0 bg-white shadow-md p-3 rounded-md w-64 break-words">
                        <p class="text-sm text-gris-medio">{{ date('d-m', strtotime($nextTask['limit_date']))}}</p>
                        <h4 class="font-bold">{{$nextTask['task_name']}}</h4>
                        <p class="text-xs">{{$nextTask['description']}}</p>
                    </div>
                    @endforeach
                </div>
                <h3 class="flex justify-center mt-5">Tareas Realizadas</h3>

                <div class="flex gap-6 px-4 py-2 overflow-x-auto m-4 bg-verde-claro">
                    @if (empty($completedTasks))
                    <div class="flex h-20 items-center justify-center"><p>No hay ninguna tarea realizada.</p></div>
                    @else
                    @foreach ($completedTasks as $completedTask)
                    <div class="flex flex-col flex-shrink-0 bg-gris-claro shadow-md p-3 rounded-md w-64 break-words">
                        <p class="text-sm text-gris-medio">{{ date('d-m', strtotime($completedTask['limit_date']))}}</p>
                        <h4 class="font-bold">{{$completedTask['task_name']}}</h4>
                        <p class="text-xs mb-2">{{$completedTask['description']}}</p>
                        <button
                            class="m-3 mt-auto border border-gris-medio  bg-amarillo-claro text-sm hover:bg-amarillo-oscuro p-2 rounded-lg">Mover
                            a pendientes</button>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            @if ($plot->crops->isEmpty())
                <p>No hay cultivos en esta parcela</p>
            @else
                @foreach ($plot->crops as $crop)
                    <p>{{ $crop->name }}</p>
                @endforeach
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 p-6 ">

                <!-- Card -->
                <article class="bg-white p-4 rounded-xl shadow-md border border-verde-oscuro flex flex-col">

                    <!-- Título -->
                    <h2 class="text-lg font-bold text-green-800 mb-2">Cultivo de Tomates</h2>

                    <!-- Imagen + Descripción -->
                    <div class="flex flex-col items-center text-center">
                        <img src="{{ asset('images/crecimiento.png') }}" alt="plantita" class="h-[80px] object-contain">
                        <h3 class="text-gray-700 text-sm">Tomates frescos para clima templado. Requiere sol directo y riego
                            regular.</h3>
                    </div>

                    <!-- Fechas -->
                    <div class="mt-1 text-xs text-gray-500 text-center">
                        <p><span class="font-semibold text-gray-700">Siembra:</span> 5 marzo 2025</p>
                        <p><span class="font-semibold text-gray-700">Cosecha:</span> 15 junio 2025</p>
                    </div>

                    <!-- Botones -->
                    <div class="mt-4 flex justify-center gap-3">
                        <button
                            class="bg-red-500 text-white text-sm px-4 py-1 rounded-md hover:bg-red-600 transition">Eliminar</button>
                        <button
                            class="bg-amber-400 text-white text-sm px-4 py-1 rounded-md hover:bg-amber-500 transition">Editar</button>
                    </div>
                </article>


                <!-- Card -->
                <article class="bg-white p-4 rounded-xl shadow-md border border-verde-oscuro flex flex-col">

                    <!-- Título -->
                    <h2 class="text-lg font-bold text-green-800 mb-2">Cultivo de Tomates</h2>

                    <!-- Imagen + Descripción -->
                    <div class="flex flex-col items-center text-center">
                        <img src="{{ asset('images/crecimiento.png') }}" alt="plantita" class="h-[80px] object-contain">
                        <h3 class="text-gray-700 text-sm">Tomates frescos para clima templado. Requiere sol directo y riego
                            regular.</h3>
                    </div>

                    <!-- Fechas -->
                    <div class="mt-1 text-xs text-gray-500 text-center">
                        <p><span class="font-semibold text-gray-700">Siembra:</span> 5 marzo 2025</p>
                        <p><span class="font-semibold text-gray-700">Cosecha:</span> 15 junio 2025</p>
                    </div>

                    <!-- Botones -->
                    <div class="mt-4 flex justify-center gap-3">
                        <button
                            class="bg-red-500 text-white text-sm px-4 py-1 rounded-md hover:bg-red-600 transition">Eliminar</button>
                        <button
                            class="bg-amber-400 text-white text-sm px-4 py-1 rounded-md hover:bg-amber-500 transition">Editar</button>
                    </div>
                </article>

                <!-- Card -->
                <article
                    class="bg-white select-none p-4 rounded-xl text-lg font-bold shadow-md border border-verde-oscuro hover:bg-verde-claro  flex flex-col justify-center items-center cursor-pointer">
                    <h3>Añadir cultivo </h3>
                </article>
                <!-- Repite para otras tarjetas si lo deseas... -->
            </div>


    </main>

@endsection
