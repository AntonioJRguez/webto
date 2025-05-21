<!doctype html>
<html class="!scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="circle-pattern">
    <!-- Barra de navegación -->
    <nav class="fixed top-0 left-0 w-full bg-gradient-to-r from-green-700 via-green-500 to-yellow-400 shadow-md z-50 ">
        <div class="container mx-auto flex items-center justify-between px-4 py-3 ">

            <!-- Logo -->
            <a href="#" class="flex items-center space-x-2">
                <img src="{{ asset('images/webtologo.png') }}" alt="Logo" class="h-10 ">
            </a>
            <!-- Menú -->
            <ul class="flex space-x-7 text-gray-700 font-medium ">
                <li><a href={{route('index')}} class="hover:text-gray-300">Inicio</a></li>
                <li><a href={{route('myplot')}} class="hover:text-gray-300">Mi parcela</a></li>
                <li><a href="{{route('events')}}" class="hover:text-gray-300">Eventos</a></li>
                <li><a href="#comunidad" class="hover:text-gray-300">Calendario</a></li>
                <li><a href="#contacto" class="hover:text-gray-300">Contacto</a></li>
                <li>
                    <button onclick="document.getElementById('logout-form').submit();"
                        class="bg-verde-oscuro text-white px-4 py-3 rounded hover:bg-green-600">
                        Cerrar sesión
                    </button>
                </li>
            </ul>
        </div>
    </nav>


    @yield('content')

</body>
@vite(['resources/js/app.js'])
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>

</html>
