@extends('layouts.app-session')
@section('content')


<main class="mt-20 flex justify-center ">
    <div class="flex flex-col items-center w-[80%] h-full bg-slate-50 rounded-lg p-4">
        <h1 class="text-4xl font-bold text-gris-oscuro">{{ $plot->name }}</h1>
        <p>{{ $plot->description }}</p>
        @if ($plot->crops->isEmpty())
        <p>No hay cultivos en esta parcela</p>
        @else
        @foreach ($plot->crops as $crop)
        <p>{{ $crop->name }}</p>
        @endforeach
        @endif


        <div class="bg-white rounded-xl shadow-md p-6 mb-6 w-full max-w-5xl mx-auto">
            <h3 class="flex text-2xl font-bold text-green-800 mb-6"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="size-6 mr-1">
                    <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                    <path d="M2 6h4" />
                    <path d="M2 10h4" />
                    <path d="M2 14h4" />
                    <path d="M2 18h4" />
                    <path d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                </svg> Tareas del día</h3>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Tareas Pendientes -->
                <div>
                    <h4 class="flex text-lg font-semibold text-gray-800 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>

                        Pendientes
                    </h4>
                    <ul id="pendingTasks" class="space-y-3">
                        <li class="flex items-center gap-3">
                            <input type="checkbox" id="t1" class="accent-green-600 w-4 h-4">
                            <label for="t1" class="text-sm text-gray-700">Regar tomates temprano</label>
                        </li>
                        <li class="flex items-center gap-3">
                            <input type="checkbox" id="t2" class="accent-yellow-500 w-4 h-4">
                            <label for="t2" class="text-sm text-gray-700">Inspeccionar hojas por plagas</label>
                        </li>
                    </ul>

                    <div class="mt-6 flex gap-4">
                        <button class="flex bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-xl shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>

                            <p class="ml-2">Marcar como realizadas</p>
                        </button>
                        <button class="flex bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-xl shadow">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            <p class="ml-2">Desechar</p>
                        </button>
                    </div>
                </div>

                <!-- Tareas Próximas -->
                <div>
                    <h4 class="flex text-lg font-semibold text-gray-800 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        Próximas
                    </h4>
                    <ul id="upcomingTasks" class="space-y-3">
                        <li class="flex justify-between items-center bg-gray-100 rounded-lg px-4 py-3 shadow-sm">
                            <span class="text-sm text-gray-800">Revisar humedad del suelo</span>
                            <button onclick="moveToPending(this)"
                                class="text-xs bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md">
                                Mover a pendientes
                            </button>
                        </li>
                        <li class="flex justify-between items-center bg-gray-100 rounded-lg px-4 py-3 shadow-sm">
                            <span class="text-sm text-gray-800">Preparar fertilizante</span>
                            <button onclick="moveToPending(this)"
                                class="text-xs bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md">
                                Mover a pendientes
                            </button>
                        </li>
                        <li class="flex justify-between items-center bg-gray-100 rounded-lg px-4 py-3 shadow-sm">
                            <span class="text-sm text-gray-800">Preparar fertilizante</span>
                            <button onclick="moveToPending(this)"
                                class="text-xs bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md">
                                Mover a pendientes
                            </button>
                        </li>
                        <li class="flex justify-between items-center bg-gray-100 rounded-lg px-4 py-3 shadow-sm">
                            <span class="text-sm text-gray-800">Preparar fertilizante</span>
                            <button onclick="moveToPending(this)"
                                class="text-xs bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md">
                                Mover a pendientes
                            </button>
                        </li>
                        <li class="flex justify-between items-center bg-gray-100 rounded-lg px-4 py-3 shadow-sm">
                            <span class="text-sm text-gray-800">Preparar fertilizante</span>
                            <button onclick="moveToPending(this)"
                                class="text-xs bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md">
                                Mover a pendientes
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <script>
            function moveToPending(button) {
                const item = button.closest("li");
                const taskText = item.querySelector("span").textContent;

                const newId = "task-" + Date.now();

                const newItem = document.createElement("li");
                newItem.className = "flex items-center gap-3";
                newItem.innerHTML = `
                    <input type="checkbox" id="${newId}" class="accent-green-600 w-4 h-4">
                    <label for="${newId}" class="text-sm text-gray-700">${taskText}</label>
                  `;

                document.getElementById("pendingTasks").appendChild(newItem);
                item.remove();
            }
        </script>



        {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5  gap-6">
                <article class="bg-verde-oscuro p-6 rounded-xl shadow-lg ">
                    <div class="h-[20%] bg-gray-400 p-2">
                        <h2>Cultivo de Tomates</h2>
                    </div>
                    <div class="h-[80%] bg-gray-200 flex flex-col items-center">
                        <img src="{{ asset('images/crecimiento.png') }}" alt="plantita" class="h-[100px]">
        <h3> Descripcion del cultivo</h3>




    </div>



    </article>
    </div> --}}
    <div class="flex overflow-x-auto gap-6 px-6 py-4">
        <div class="flex-shrink-0 bg-white border-l-4 border-green-500 shadow p-3 rounded-md w-64">
            <p class="text-sm text-gray-500">04 Mayo</p>
            <h4 class="font-bold text-green-800">Regar tomates</h4>
            <p class="text-xs text-gray-600">Riego por la mañana para evitar evaporación.</p>
        </div>
        <div class="flex-shrink-0 bg-white border-l-4 border-yellow-400 shadow p-3 rounded-md w-64">
            <p class="text-sm text-gray-500">05 Mayo</p>
            <h4 class="font-bold text-yellow-600">Revisar plagas</h4>
            <p class="text-xs text-gray-600">Inspección de hojas en lechugas y zanahorias.</p>
        </div>
        <!-- más tareas -->
    </div>


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
        <!-- Repite para otras tarjetas si lo deseas... -->
    </div>



    </div>

</main>

@endsection