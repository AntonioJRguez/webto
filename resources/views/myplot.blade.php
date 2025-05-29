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

    <main class="mt-20 flex justify-center ">
        <div class="flex flex-col items-center w-[80%] h-full bg-gris-claro rounded-lg p-4">
            <h1 class= "text-gris-oscuro text-xl">{{ $plot->name }}</h1>
            <p>{{ $plot->description }}</p>

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
                        @if (empty($pastTasks))
                            <div class="flex h-20 items-center justify-center">
                                <p>No hay ninguna tarea pendiente.</p>
                            </div>
                        @else
                            <form method="POST" id="editTasksForm" action="">
                                @method('POST')
                                @csrf
                                <ul class="flex flex-col items-center space-y-2 m-3">
                                    @foreach ($pastTasks as $pastTask)
                                        <li class="flex items-center gap-3">
                                            <input type="checkbox" name="selected_tasks[]" value="{{ $pastTask['id'] }}"
                                                id="{{ $pastTask['id'] }}">
                                            <label for="task1">{{ $pastTask['task_name'] }}</label>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="flex justify-center gap-2 mt-4">
                                    <button type="submit" formaction="{{ route('tasks.complete') }}"
                                        class="bg-verde-claro hover:bg-verde-medio p-3 rounded-lg">Marcar como
                                        realizada</button>
                                    <button formaction="{{ route('tasks.delete') }}"
                                        class="bg-red-400 hover:bg-red-500 p-3 rounded-lg">Eliminar</button>
                                    <button formaction="{{ route('tasks.moveToTomorrow') }}"
                                        class="bg-blue-400 hover:bg-blue-500 p-3 rounded-lg">Retrasar 1 dia</button>
                                </div>
                            </form>
                        @endif
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
                                    <p class="text-sm p-1 bg-amarillo-oscuro border-gris-medio">
                                        {{ date('d-m', strtotime($nextTask['limit_date'])) }}</p>
                                    <p class="text-sm">{{ $nextTask['task_name'] }}</p>
                                    <a href="{{ route('edit.task', ['task' => $nextTask['id']]) }}"><button
                                            class="bg-amarillo-claro hover:bg-amarillo-medio p-1 rounded-lg">Editar</button></a>
                                    <button onclick="showModalDeleteTask({{ $nextTask['id'] }})"
                                        class="bg-red-400 hover:bg-red-500 p-1 rounded-lg">Eliminar</button>
                                    <button onclick="moveTaskToYesterday({{ $nextTask['id'] }})"
                                        class="bg-blue-400 hover:bg-blue-500 p-1 rounded-lg">Mover a pendientes</button>
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

                        <form id="formDeleteTask" class="hidden" action="">

                        </form>
                        <form id="formMoveToNext" class="hidden" action="">

                        </form>
                        <form id="formMoveToPrevious" class="hidden" action="">

                        </form>
                        <a class="mt-auto" href="{{ route('newtask') }}">
                            <button class="bg-verde-medio hover:bg-verde-oscuro rounded-lg  w-36 p-2">Añadir
                                Tarea</button>
                        </a>
                    </div>




                </div>

                <h3 class="flex justify-center mt-5">Tareas Pendientes</h3>
                <div class="flex gap-6 px-4 py-2 overflow-x-auto m-4 bg-amarillo-claro">

                    @foreach ($pastTasks as $pTask)
                        <div class="flex-shrink-0 bg-white shadow-md p-3 rounded-md w-64 break-words">
                            <p class="text-sm text-gris-medio">{{ date('d-m', strtotime($pTask['limit_date'])) }}</p>
                            <h4 class="font-bold">{{ $pTask['task_name'] }}</h4>
                            <p class="text-xs">{{ $pTask['description'] }}</p>
                        </div>
                    @endforeach
                </div>
                <h3 class="flex justify-center mt-5">Tareas Realizadas</h3>

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
                                <button onclick="moveTaskToPending({{ $completedTask['id'] }})"
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
                    class="bg-white select-none p-4 rounded-xl text-lg font-bold shadow-md border border-verde-oscuro hover:bg-verde-claro  flex flex-col justify-center items-center cursor-pointer">
                    <h3>Añadir cultivo </h3>
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

            <button type="button" onclick="toggleDialog('modalDeleteTask')"
                class="w-full bg-slate-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                No
            </button>
            <button type="button" id="buttonDeleteTask" onclick=""
                class="w-full bg-red-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                Si
            </button>

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

            <button type="button" onclick="toggleDialog('modalDeleteCrop')"
                class="w-full bg-slate-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                No
            </button>
            <button type="button" id="buttonDeleteCrop" onclick=""
                class="w-full bg-red-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                Si
            </button>

        </x-slot>
    </x-modal>
@endsection
