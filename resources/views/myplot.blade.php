@extends('layouts.app-session')
@section('content')

    <script>
        window.moveTaskToYesterday = function(id) {
            // const url = "{{ route('task.moveToYesterday', ':id') }}".replace(':id', id);
            const url = "{{ route('task.moveToYesterday', ['id' => '__ID__']) }}".replace('__ID__', id);

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('data succes');
                        window.location.reload();
                    }
                })
                .catch(err => console.error('Error:', err));
        };


        window.deleteTask = function(id) {
            const url2 = "{{ route('task.delete', ['id' => '__ID__']) }}".replace('__ID__', id);
            fetch(url2, {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('data succes');
                        window.location.reload();
                    }
                })
                .catch(err => console.error('Error:', err));
        };

        window.deleteCrop = function(id) {
            const url3 = "{{ route('crop.delete', parameters: ['id' => '__ID__']) }}".replace('__ID__', id);
            // const url3 = `/myplot/deleteCrop/${id}`;

            fetch(url3, {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('data succes');
                        window.location.reload();
                    }
                })
                .catch(err => console.error('Error:', err));
        };
        window.moveTaskToPending = function(id) {
            // const url = "{{ route('task.moveToYesterday', ':id') }}".replace(':id', id);
            const url = "{{ route('task.moveToPending', ['id' => '__ID__']) }}".replace('__ID__', id);

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('data succes');
                        window.location.reload();
                    }
                })
                .catch(err => console.error('Error:', err));
        };
    </script>

    <main class="m-2 flex justify-center pt-20">
        <div class="flex flex-col items-center w-full sm:w-[95%] h-full bg-gris-claro rounded-lg p-3">
            <h1 class= "text-gris-oscuro text-6xl climate text-center mb-2">{{ $plot->name }}</h1>
            <p class="text-center text-sm mb-4">{{ $plot->description }}</p>

            <div class="bg-white shadow-lg p-4 sm:p-6 mb-4 w-full ">
                <h2 class="flex justify-center items-center mb-4 text-lg sm:text-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="size-5 mr-2">
                        <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                        <path d="M2 6h4" />
                        <path d="M2 10h4" />
                        <path d="M2 14h4" />
                        <path d="M2 18h4" />
                        <path
                            d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                    </svg> Tareas del día
                </h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 m-2 ">
                    <div class="mx-auto bg-amarillo-medio bg-opacity-10 p-7 rounded shadow-inner-custom">
                        <h3 class="flex justify-center p-3 pt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>Tareas pendientes
                        </h3>
                        @if (empty($pastTasks))
                            <div class="flex h-20 items-center justify-center  text-sm">
                                <p>No hay ninguna tarea pendiente.</p>
                            </div>
                        @else
                            <form method="POST" id="editTasksForm" action="">
                                @method('POST')
                                @csrf
                                <ul class="flex flex-col gap-2 my-3">
                                    @foreach ($pastTasks as $pastTask)
                                        <li class="flex items-center gap-2 text-sm">
                                            <label for="{{ 'task' . $pastTask['id'] }}" class="cursor-pointer">
                                                <input type="checkbox" name="selected_tasks[]"
                                                    value="{{ $pastTask['id'] }}" id="{{ 'task' . $pastTask['id'] }}">
                                                {{ $pastTask['task_name'] }}
                                            </label>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="flex flex-wrap justify-center gap-2 mt-auto h-full">
                                    <button type="submit" formaction="{{ route('tasks.complete') }}"
                                        class="bg-verde-claro hover:bg-verde-medio px-3 py-2 rounded-lg">Marcar como
                                        realizada</button>
                                    <button formaction="{{ route('tasks.delete') }}"
                                        class="bg-red-400 hover:bg-red-500 px-3 py-2 rounded-lg">Eliminar</button>
                                    <button formaction="{{ route('tasks.moveToTomorrow') }}"
                                        class="bg-blue-400 hover:bg-blue-500 px-3 py-2 rounded-lg">+ 1 dia</button>
                                </div>
                            </form>
                        @endif
                    </div>


                    <div class="bg-amarillo-claro bg-opacity-10 p-7 rounded shadow-inner-custom">
                        <h3 class="flex justify-center items-center text-base sm:text-lg mb-2 p-3 pt-1"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                            Tareas próximas</h3>

                        <ul class="flex flex-col gap-5 text-sm">

                            @foreach ($futureTasks as $nextTask)
                                <div class="flex flex-col sm:flex-row gap-2 items-center">
                                    <div class="flex gap-1">
                                        <p class="px-2 py-1 text-xs bg-amarillo-oscuro border-gris-medio w-12">
                                            {{ date('d-m', strtotime($nextTask['limit_date'])) }}</p>
                                        <span class="flex-1">{{ $nextTask['task_name'] }}</span>
                                    </div>
                                    <div class="flex gap-1">
                                        <a href="{{ route('edit.task', ['task' => $nextTask['id']]) }}"><button
                                                class="bg-amarillo-claro hover:bg-amarillo-medio px-2 py-1 rounded-lg">Editar</button></a>
                                        <button onclick="showModalDeleteTask({{ $nextTask['id'] }})"
                                            class="bg-red-400 hover:bg-red-500 p-1 rounded-lg">Eliminar</button>
                                        <button onclick="moveTaskToYesterday({{ $nextTask['id'] }})"
                                            class="bg-blue-400 hover:bg-blue-500 p-1 rounded-lg">Para hoy</button>
                                    </div>
                                </div>
                            @endforeach
                        </ul>

                        <form id="formDeleteTask" class="hidden" action="">

                        </form>
                        <form id="formMoveToNext" class="hidden" action="">

                        </form>
                        <form id="formMoveToPrevious" class="hidden" action="">

                        </form>
                        <div class="h-28 flex flex-col justify-end items-center">
                            <a class="mt-auto" href="{{ route('newtask') }}">
                                <button class="bg-verde-medio hover:bg-verde-oscuro rounded-lg w-36 px-2 py-1 mt-2">
                                    Añadir Tarea
                                </button>
                            </a>
                        </div>
                    </div>




                </div>

                <h3 class="flex justify-center items-center mt-5 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-3 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Tareas Pendientes
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="ml-1 size-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </h3>
                <div class="flex gap-6 px-4 py-2 overflow-x-auto m-4 bg-amarillo-claro">
                    @if (empty($pastTasks))
                        <div class="flex h-20 items-center justify-center">
                            <p>No hay ninguna tarea pendiente.</p>
                        </div>
                    @else
                        @foreach ($pastTasks as $pTask)
                            <div class="flex-shrink-0 bg-white shadow-md p-3 rounded-md w-64 break-words">
                                <p class="text-sm text-gris-medio">{{ date('d-m', strtotime($pTask['limit_date'])) }}</p>
                                <h4 class="font-bold">{{ $pTask['task_name'] }}</h4>
                                <p class="text-xs">{{ $pTask['description'] }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="flex w-full items-center justify-center mb-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                    </svg>
                </div>

                <h3 class="flex items-center justify-center mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-3 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                    Tareas Realizadas
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-3 ml-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </h3>

                <div class="flex gap-6 px-4 py-2 overflow-x-auto m-4 bg-verde-claro">
                    @if (empty($completedTasks))
                        <div class="flex h-20 items-center justify-center">
                            <p>No hay ninguna tarea realizada.</p>
                        </div>
                    @else
                        @foreach ($completedTasks as $completedTask)
                            <div
                                class="flex flex-col flex-shrink-0 bg-gris-claro shadow-md p-3 rounded-md w-64 break-words">
                                <p class="text-sm text-gris-medio">
                                    {{ date('d-m', strtotime($completedTask['completed_date'])) }}</p>
                                <h4 class="font-bold">{{ $completedTask['task_name'] }}</h4>
                                <p class="text-xs mb-2">{{ $completedTask['description'] }}</p>
                                <p class="text-xs mb-2">{{ 'Realizada por: ' . $completedTask['userName'] }}</p>
                                <button onclick="moveTaskToPending({{ $completedTask['id'] }})"
                                    class="m-3 mt-auto border border-gris-medio  bg-amarillo-claro text-sm hover:bg-amarillo-oscuro p-2 rounded-lg">Mover
                                    a pendientes</button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="flex w-full items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                    </svg>
                </div>
            </div>
            @if ($plot->crops->isEmpty())
                <p>No hay cultivos en esta parcela</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 p-6 ">
                    @foreach ($plot->crops as $crop)
                        <article
                            class="bg-white p-4 rounded-xl shadow-md border border-verde-oscuro flex flex-col justify-between">
                            <h2 class="text-lg font-bold text-green-800 mb-2">{{ $crop->name }}</h2>

                            <div class="flex flex-col items-center text-center">
                                <img src="{{ asset('images/crecimiento.png') }}" alt="plantita"
                                    class="h-[80px] object-contain">
                                <h3 class="text-gray-700 text-sm">{{ $crop->description }}</h3>
                            </div>

                            <div class="mt-1 text-xs text-gray-500 text-center">
                                <p><span class="font-semibold text-gray-700">Siembra:</span>
                                    {{ date('d-m', strtotime($crop->sowing_date)) }}</p>
                                <p><span class="font-semibold text-gray-700">Cosecha
                                        prevista:</span>{{ date('d-m', strtotime($crop->harvest_date)) }}</p>
                            </div>

                            <div class="mt-4 flex justify-center gap-3">
                                <button onclick="showModalDeleteCrop({{ $crop->id }})"
                                    class="bg-red-500 text-white text-sm px-4 py-1 rounded-md hover:bg-red-600 transition">Eliminar</button>
                                <a href="{{ route('edit.crop', ['crop' => $crop->id]) }}">
                                    <button
                                        class="bg-amber-400 text-white text-sm px-4 py-1 rounded-md hover:bg-amber-500 transition">Editar</button>
                            </div>
                            </a>
                        </article>
                    @endforeach
            @endif


            <a href="{{ route('newcrop') }}">
                <article
                    class="bg-white select-none p-4 rounded-xl text-lg font-bold shadow-md border border-verde-oscuro hover:bg-verde-claro  flex justify-center items-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg><h3>
                        Añadir cultivo </h3>
                </article>
            </a>
        </div>


    </main>
    <x-modal>
        <x-slot name="modalTitle">
            <x-slot name="id">
                modalDeleteTask
            </x-slot>
            ¿Seguro que quieres borrar la tarea?
        </x-slot>
        <x-slot name="modalMain">
            @if (session('error'))
                <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                    {{ session('error') }}
                </div>
            @endif
            {{-- action="{{ route('delete.task', $event->id) }}" --}}
            <div class="flex justify-around p-3 w-full">
                <button type="button" onclick="toggleDialog('modalDeleteTask')"
                    class="w-full bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 m-3 rounded">
                    No
                </button>
                <button type="button" id="buttonDeleteTask" onclick=""
                    class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4  m-3 rounded">
                    Si
                </button>
            </div>
        </x-slot>
    </x-modal>
    <x-modal>
        <x-slot name="modalTitle">
            <x-slot name="id">
                modalDeleteCrop
            </x-slot>
            ¿Seguro que quieres borrar el cultivo?
        </x-slot>
        <x-slot name="modalMain">
            @if (session('error'))
                <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                    {{ session('error') }}
                </div>
            @endif
            {{-- action="{{ route('delete.task', $event->id) }}" --}}
            <div class="flex justify-around p-3 w-full">
                <button type="button" onclick="toggleDialog('modalDeleteCrop')"
                    class="w-full bg-slate-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 m-3 rounded">
                    No
                </button>
                <button type="button" id="buttonDeleteCrop" onclick=""
                    class="w-full bg-red-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 m-3 rounded">
                    Si
                </button>
            </div>
        </x-slot>
    </x-modal>
@endsection
