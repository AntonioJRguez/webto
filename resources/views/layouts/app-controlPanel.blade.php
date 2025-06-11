@php

    if (Auth::check()) {
        $user = Auth::user();
        if (is_null($user) || !$user->is_admin) {
            Auth::logout(); // Desconectar si no es admin
            return redirect()
                ->route('index')
                ->withErrors(['error' => 'Acceso no autorizado']);
        }
    } else {
        return redirect()
            ->route('index')
            ->withErrors(['error' => 'Acceso no autorizado']);
    }

@endphp

<!doctype html>
<html class="!scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
    <title>Webto</title>
</head>

<body class="circle-pattern">
    <div class="z-50 bg-verde-claro">
        <!-- Header de la página -->
        <header class="top-0 left-0 w-full h-[120px]  ">
            <div class="container mx-auto flex items-center justify-center px-4 py-2 belittle">
                <a href="{{ route('admin') }}"><img src="{{ asset('images/webtologo.png') }}" alt="Logo"
                        class="h-[100px]"></a>
            </div>
        </header>
    </div>
    <header class="w-full flex justify-center bg-[#e3dba0] py-2">
        <h1 class="text-4xl flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
            </svg>

            Panel de control

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 ml-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
            </svg>
        </h1>
    </header>

    <nav
        class="text-xs sm:text-base sticky top-0 left-0 w-full bg-gradient-to-r from-green-700 via-green-500 to-yellow-400 shadow-md z-40 ">
        <ul class="flex flex-row justify-around text-gray-700 font-medium px-4 py-3 items-center">
            <li><a href="{{ route('admin.users') }}" class="hover:text-gray-300">Usuarios</a></li>
            <li><a href="{{ route('admin.plots') }}" href="#parcelas" class="hover:text-gray-300">Parcelas</a></li>
            <li><a href="{{ route('admin.events') }}" class="hover:text-gray-300">Eventos</a></li>
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
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>

</html>
