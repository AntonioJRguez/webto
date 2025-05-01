@extends('layouts.app-controlPanel')
@section('content')
    <main>

        <section class="h-full bg-white p-8">
            <div class="grid grid-cols-5  gap-6">
                @foreach ($plots as $plot)
                    <article class="bg-gray-100 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadowds flex-column justify-around">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Parcela ID: {{ $plot->id }}</h2>
                        <p class="text-gray-600 mb-2">Nombre: {{ $plot->name }}</p>
                        <p class="text-gray-600 mb-2">Descripcion: {{ $plot->description }}</p>
                        <p class="text-gray-600 mb-2">Código de parcela: {{ $plot->plot_code }} </p>
                        <p class="text-gray-600 mb-2">Usuarios:
                            @if (!$plot->users->isEmpty())
                                @foreach ($plot->users as $user)
                                    {{ $user->name }},
                                @endforeach
                            @else
                                La parcela está sin asignar
                            @endif

                        </p>
                        <div class="flex justify-around">
                            <a href="{{ route('admin.update.plot', compact('plot')) }}">
                                <button class="text-yellow-700 hover:text-yellow-600 cursor-pointer">
                                    Editar
                                </button>
                            </a>
                            <button onclick="toggleDialog('modal-delete-plot{{ $plot->id }}')"
                                class="text-red-600 hover:text-orange-400 cursor-pointer">Eliminar</button>
                        </div>
                    </article>
                @endforeach
                <a href="{{route('admin.create.plot')}}" class="flex items-center">
                    <article
                        class="bg-green-100 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow flex justify-center items-center cursor-pointer active:scale-95 select-none">
                        <p>Añadir parcela.</p>
                    </article>
                </a>
            </div>
        </section>

    </main>

    @foreach ($plots as $plot)
        @if ($plot->id !== 1)
            <x-modal>
                <x-slot name="modalTitle">
                    <x-slot name="id">
                        modal-delete-plot{{ $plot->id }}
                    </x-slot>
                    ¿Seguro que quieres borrar la parcela?
                </x-slot>
                <x-slot name="modalMain">
                    @if (session('error'))
                        <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" id="deleteplotForm" name='action'
                        action="{{ route('admin.delete.plot', $plot->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="toggleDialog('modal-delete-plot{{ $plot->id }}')"
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
