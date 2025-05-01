@extends('layouts.app-controlPanel')
@section('content')
    <main>

        <section class="h-full bg-white p-8">
            <div class="grid grid-cols-5  gap-6">
               
                @foreach ($events as $event)
                    <article class="bg-gray-100 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Usuario ID: {{ $event->id }}</h2>
                        <p class="text-gray-600 mb-2">Nombre: {{ $event->name }}</p>
                        <p class="text-gray-600 mb-2">Descripcion: {{ $event->description }}</p>
                        <p class="text-gray-600 mb-2">Fecha: {{ $event->event_date }}</p>
                        <p class="text-gray-600 mb-2">Aforo: {{ $event->capacity}}</p>
                        <p class="text-gray-600 mb-2">Lugar del evento: {{ $event->location}}</p>
                        <div class="flex justify-around">

                                <a href="{{ route('admin.update.event', compact('event')) }}">
                                    <button class="text-yellow-700 hover:text-yellow-600 cursor-pointer">
                                        Editar
                                    </button>
                                </a>
                                <button onclick="toggleDialog('modal-delete-event{{ $event->id }}')"
                                    class="text-red-600 hover:text-orange-400 cursor-pointer">Eliminar</button>
                        </div>
                    </article>
                @endforeach
                <a href="{{route('admin.create.event')}}" class="flex items-center">
                    <article
                        class="bg-green-100 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow flex justify-center items-center cursor-pointer active:scale-95 select-none">
                        <p>Añadir evento.</p>
                    </article>
                </a>
            </div>
        </section>

    </main>

    @foreach ($events as $event)
        @if ($event->id !== 1)
            <x-modal>
                <x-slot name="modalTitle">
                    <x-slot name="id">
                        modal-delete-event{{ $event->id }}
                    </x-slot>
                    ¿Seguro que quieres borrar el evento?
                </x-slot>
                <x-slot name="modalMain">
                    @if (session('error'))
                        <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" id="deleteEventForm" name='action'
                        action="{{ route('admin.delete.event', $event->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="toggleDialog('modal-delete-event{{ $event->id }}')"
                            class="w-full bg-slate-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                            No
                        </button>
                        <button type="submit"
                            class="w-full bg-red-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                            Si
                        </button>
                    </form>
        @endif
        </x-slot>
        </x-modal>
    @endforeach

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
@endsection
