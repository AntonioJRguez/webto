@php

if (Auth::check()) {
            $user = Auth::user();
            if (is_null($user) || !$user->is_admin) {
                Auth::logout(); // Desconectar si no es admin
                return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
            } 
        } else {
            return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
        }

@endphp

<!doctype html>
<html class="!scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}

</head>

<body class="circle-pattern">
    <div class="z-50 bg-verde-claro">
        <!-- Header de la página -->
        <header class="top-0 left-0 w-full h-[120px]  ">
            <div class="container mx-auto flex items-center justify-center px-4 py-2 belittle">
                <a href="{{route('index')}}"><img src="{{ asset('images/webtologo.png') }}" alt="Logo" class="h-[100px]"></a>
            </div>
        </header>
    </div>
    <header class="w-full flex justify-center bg-[#e3dba0] py-2">
        <h1 class="text-4xl">Panel de control:</h1>
    </header>

    <nav class="sticky top-0 left-0 w-full bg-gradient-to-r from-green-700 via-green-500 to-yellow-400 shadow-md z-40 ">
        <ul class="flex flex-row justify-around text-gray-700 font-medium px-4 py-3 items-center">
            <li><a href="{{route('admin.users')}}" class="hover:text-gray-300">Usuarios</a></li>
            <li><a href="{{route('admin.plots')}}" href="#parcelas" class="hover:text-gray-300">Parcelas</a></li>
            <li><a href="{{route('admin.events')}}" class="hover:text-gray-300">Eventos</a></li>
            <li>
                <button onclick="document.getElementById('logout-form').submit();"
                    class="bg-verde-oscuro text-white px-4 py-3 rounded hover:bg-green-600">
                    Cerrar sesión
                </button>
            </li>
        </ul>

    </nav>
    @yield('content')

</body>
@vite(['resources/js/app.js'])

</html>