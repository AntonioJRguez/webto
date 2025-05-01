@extends('layouts.app-controlPanel')
@section('content')

    @if ($user->id == 1)
        <script>
            window.location.href = "{{ route('admin.users') }}";
        </script>
    @endif
    <!-- Contenido para probar el scroll -->
    <!-- Barra de navegación -->
    <main>

        <section class="h-full bg-white p-8">
            @if (session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" id="editUserForm" name='action'
                action="{{ route('admin.update.user', compact('user')) }}">
                @csrf
                @method('PUT')
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="mt-3 mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input autocomplete="off" type="text" name="name" id="name" required
                        value="{{old('name', $user->name)  }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Correo Electrónico</label>
                    <input autocomplete="off" type="email" name="email" id="email" required
                        value="{{old('email',$user->email) }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700">Nueva contraseña</label>
                    <input autocomplete="new_password" type="password" name="new_password" id="new_password"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="block text-gray-700">Confirma la nueva contraseña</label>
                    <input autocomplete="off" type="password" name="new_password_confirmation" id="confirm_password"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="plot_name" class="block text-gray-700">Parcela</label>
                    <input type="text" name="plot_code" id="plot_name" required value="{{old('plot_code', $user->plot_code)}}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="is_admin" class="block text-gray-700">Es Admin</label>
                    <select name="is_admin" id="is_admin" class="w-full px-3 py-2 border rounded-lg">
                        <option value="1" {{  $user->is_admin == 1 ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{  $user->is_admin == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Modificar
                </button>
            </form>
        </section>

    </main>


    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
    @if ($errors->any())
        {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                console.log("llega aqui");
                showDialog("modal-admin-users"); // Reemplaza con el ID de tu modal
            });
        </script> --}}
    @endif
@endsection
