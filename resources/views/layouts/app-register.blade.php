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
    <div  z-50 bg-verde-claro">
        <!-- Header de la página -->
        <header class="top-0 left-0 w-full h-[420px]  ">
            <div class="container mx-auto flex items-center justify-center px-4 py-2 belittle">
                <a href="{{route('index')}}"><img src="{{ asset('images/webtologo.png') }}" alt="Logo" class="h-[400px]"></a>
            </div>
        </header>
    </div>

    @yield('content')

</body>
@vite(['resources/js/app.js'])

</html>
