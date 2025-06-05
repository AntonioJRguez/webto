<!doctype html>
<html class="!scroll-smooth">

<head>
    
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.ico') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    <title>Webto</title>
</head>

<body class="circle-pattern min-h-screen">
    <!-- Barra de navegación -->
    {{-- <nav class="fixed top-0 left-0 w-full bg-gradient-to-r from-green-700 via-green-500 to-yellow-400 shadow-lg z-50 ">
        <div class="container mx-auto flex items-center justify-between px-4 py-3 ">

            <!-- Logo -->
            <a href="#" class="flex items-center space-x-2">
                <img src="{{ asset('images/webtologo.png') }}" alt="Logo" class="h-10 ">
            </a>
            <!-- Menú -->
            <ul class="flex space-x-7 text-gray-700 font-medium items-center ">
                <li><a href={{ route('index') }} class="hover:text-gray-300">Inicio</a></li>
                <li><a href={{ route('myplot') }} class="hover:text-gray-300">Mi parcela</a></li>
                <li><a href="{{ route('events') }}" class="hover:text-gray-300">Eventos</a></li>
                <li><a href="{{ route('calendar') }}" class="hover:text-gray-300">Calendario</a></li>
                <li><a href="#contacto" class="hover:text-gray-300">Contacto</a></li>
                <li>
                    <button onclick="document.getElementById('logout-form').submit();"
                        class="bg-verde-oscuro text-white px-4 py-3 rounded hover:bg-green-600">
                        Cerrar sesión
                    </button>
                </li>
            </ul>
        </div>
    </nav> --}}

    <nav class="fixed top-0 left-0 w-full bg-gradient-to-r from-green-700 via-green-500 to-yellow-400 shadow-lg z-50">
        <div class="container mx-auto flex items-center justify-between px-4 py-3 relative">

            <a href="#" class="flex items-center space-x-2">
                <img src="{{ asset('images/webtologo.png') }}" alt="Logo" class="h-10">
            </a>

            <button onclick="toggleMenu()" class="lg:hidden text-white focus:outline-none relative z-50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <ul id="nav-menu"
                class="hidden absolute top-full right-0 mt-1 w-56 bg-white rounded-lg shadow-xl border border-gray-100 py-1 text-gray-700 font-medium overflow-hidden lg:static lg:flex lg:flex-row lg:space-x-4 lg:space-y-0 lg:bg-transparent lg:shadow-none lg:border-0 lg:py-0 lg:w-auto">
                <li>
                    <a href="{{ route('index') }}"
                        class="block px-4 py-3 hover:bg-gray-50 transition-colors duration-200 lg:hover:bg-transparent lg:hover:text-gray-300">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('myplot') }}"
                        class="block px-4 py-3 hover:bg-gray-50 transition-colors duration-200 lg:hover:bg-transparent lg:hover:text-gray-300">
                        Mi parcela
                    </a>
                </li>
                <li>
                    <a href="{{ route('events') }}"
                        class="block px-4 py-3 hover:bg-gray-50 transition-colors duration-200 lg:hover:bg-transparent lg:hover:text-gray-300">
                        Eventos
                    </a>
                </li>
                <li>
                    <a href="{{ route('calendar') }}"
                        class="block px-4 py-3 hover:bg-gray-50 transition-colors duration-200 lg:hover:bg-transparent lg:hover:text-gray-300">
                        Calendario
                    </a>
                </li>
                <li>
                    <a href="#contacto"
                        class="block px-4 py-3 hover:bg-gray-50 transition-colors duration-200 lg:hover:bg-transparent lg:hover:text-gray-300">
                        Contacto
                    </a>
                </li>
                <li class=" m-1 p-1 lg:border-0 ">
                    <button onclick="document.getElementById('logout-form').submit();"
                        class="w-full text-left px-4 py-3 text-white bg-verde-oscuro hover:bg-green-600 rounded transition-colors duration-200 lg:px-4 lg:py-2 lg:shadow-sm">
                        Cerrar sesión
                    </button>
                </li>
            </ul>
        </div>
    </nav>




    @yield('content')

   <footer class="bg-verde-oscuro text-white w-full bottom-0" id="contacto">
    <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col lg:flex-row justify-between gap-8 text-sm">
        <div>
            <h4 class="font-semibold mb-2">Huerto Comunitario Casa Verde</h4>
            <p>Calle Altagracia, Ciudad Real</p>
            <p>Lun - Dom · 08:00 - 21:00</p>
            <div class="flex gap-2 mt-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>
                <p>+34 666 666 666</p>
            </div>
            <div class="flex gap-2 mt-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>
                <p>contacto@casaverde.org</p>
            </div>
        </div>
        <div>
            <h4 class="font-semibold mb-2">Síguenos</h4>
            <div class="flex flex-col gap-2 mb-2">
                <a class="flex items-center gap-2" href="#">
                    <img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="w-5 h-5">
                    <p>Facebook</p>
                </a>
                <a class="flex items-center gap-2" href="#">
                    <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="w-5 h-5">
                    <p>Instagram</p>
                </a>
                <a class="flex items-center gap-2" href="#">
                    <img src="{{ asset('images/x.png') }}" alt="X" class="w-5 h-5">
                    <p>X</p>
                </a>
            </div>
            <p class="italic text-xs">“Cultivando comunidad, sembrando futuro.”</p>
        </div>
    </div>
</footer>

</body>

@vite(['resources/js/app.js'])
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>

</html>
