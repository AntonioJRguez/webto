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

<body>
    <div class="circle-pattern z-50">
        <!-- Header de la página -->
        <header class="top-0 left-0 w-full h-[420px]  ">
            <div class="container mx-auto flex items-center justify-center px-4 py-2 belittle">
                <img src="{{ asset('images/webtologo3.png') }}" alt="Logo" class="h-[400px]">
            </div>
        </header>
    </div>
    <!-- Barra de navegación -->
    <nav class="sticky top-0 left-0 w-full bg-gradient-to-r from-green-700 via-green-500 to-yellow-400 shadow-md z-50 ">
        <div class="container mx-auto flex items-center justify-between px-4 py-3">

            <!-- Logo -->
            <a href="#" class="flex items-center space-x-2">
                <img src="{{ asset('images/webtologo3.png') }}" alt="Logo" class="h-10 ">
            </a>
            <!-- Menú -->
            <ul class="flex space-x-7 text-gray-700 font-medium ">
                <li><a href="#inicio" class="hover:text-gray-300">Inicio</a></li>
                <li><a href="#parcelas" class="hover:text-gray-300">Parcelas</a></li>
                <li><a href="#comunidad" class="hover:text-gray-300">Comunidad</a></li>
                <li><a href="#contacto" class="hover:text-gray-300">Contacto</a></li>
                <li>
                    <a href="#iniciar-sesion" class="bg-green-700 text-white px-4 py-3 rounded hover:bg-green-600">
                        Iniciar Sesión
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenido para probar el scroll -->

    <section id="inicio" class="h-screen bg-verde-claro flex justify-center items-center">
        <h1 class="text-4xl font-bold text-gray-800">Inicio</h1>
    </section>
    <section id="parcelas" class="h-screen bg-verde-oscuro flex justify-center items-center">
        <h1 class="text-4xl font-bold text-gray-800">Parcelas</h1>
    </section>
    <section id="comunidad" class="h-screen bg-verde-claro flex justify-center items-center">
        <h1 class="text-4xl font-bold text-gray-800">Comunidad</h1>
    </section>
    <section id="contacto" class="h-screen bg-verde-oscuro flex justify-center items-center">
        <h1 class="text-4xl font-bold text-gray-800">Contacto</h1>
    </section>
</body>

</html>
