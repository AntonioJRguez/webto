@extends('layouts.app-controlPanel')
@section('content')
    <main>

        <section class="h-full bg-white p-8">
            <div class="grid grid-cols-5  gap-6">
                <article class="bg-gray-100 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Usuario ID:1</h2>
                    <p class="text-gray-600 mb-2">Nombre: Juan.</p>
                    <p class="text-gray-600 mb-2">Email: Juan@juan.es.</p>
                    <p class="text-gray-600 mb-2">Fecha Creacion: Hoy.</p>
                    <p class="text-gray-600 mb-2">Parcela: Los rikitauners.</p>
                    <p class="text-gray-600 mb-2">Es admin: Si.</p>
                    <div class="flex justify-around">

                        <div onclick="" class="text-yellow-700 hover:text-yellow-600 cursor-pointer">Editar</div>
                        <div class="text-red-600 hover:text-orange-400 cursor-pointer">Eliminar</div>
                    </div>
                </article>
                @foreach ($users as $user)
                    <article class="bg-gray-100 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Usuario ID: {{ $user->id }}</h2>
                        <p class="text-gray-600 mb-2">Nombre: {{ $user->name }}</p>
                        <p class="text-gray-600 mb-2">Email: {{ $user->email }}</p>
                        <p class="text-gray-600 mb-2">Parcela: {{ $user->plot_code }}</p>
                        <p class="text-gray-600 mb-2">Es admin: {{ $user->is_admin ? 'Sí' : 'No' }}</p>
                        <div class="flex justify-around">
                            @if ($user->id !== 1)
                                <a href="{{ route('admin.update.user', compact('user')) }}">
                                    <button class="text-yellow-700 hover:text-yellow-600 cursor-pointer">
                                        Editar
                                    </button>
                                </a>
                                <button onclick="toggleDialog('modal-delete-user{{ $user->id }}')"
                                    class="text-red-600 hover:text-orange-400 cursor-pointer">Eliminar</button>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

    </main>

    @foreach ($users as $user)
        @if ($user->id !== 1)
            <x-modal>
                <x-slot name="modalTitle">
                    <x-slot name="id">
                        modal-delete-user{{ $user->id }}
                    </x-slot>
                    ¿Seguro que quieres borrar el Usuario?
                </x-slot>
                <x-slot name="modalMain">
                    @if (session('error'))
                        <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" id="deleteUserForm" name='action'
                        action="{{ route('admin.delete.user', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="toggleDialog('modal-delete-user{{ $user->id }}')"
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
