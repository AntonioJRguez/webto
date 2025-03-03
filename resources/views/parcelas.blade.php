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

<body class=" bg-verde-claro">
    <!-- Barra de navegación -->
    <nav class="fixed top-0 left-0 w-full bg-gradient-to-r from-green-700 via-green-500 to-yellow-400 shadow-md z-50 ">
        <div class="container mx-auto flex items-center justify-between px-4 py-3 ">

            <!-- Logo -->
            <a href="#" class="flex items-center space-x-2">
                <img src="{{ asset('images/webtologo3.png') }}" alt="Logo" class="h-10 ">
            </a>
            <!-- Menú -->
            <ul class="flex space-x-7 text-gray-700 font-medium ">
                <li><a href="#inicio" class="hover:text-gray-300">Inicio</a></li>
                <li><a href="#parcelas" class="hover:text-gray-300">Parcelas</a></li>
                <li><a href="#comunidad" class="hover:text-gray-300">Eventos</a></li>
                <li><a href="#comunidad" class="hover:text-gray-300">Calendario</a></li>
                <li><a href="#contacto" class="hover:text-gray-300">Contacto</a></li>
                <li>
                    <a href="#iniciar-sesion" class="bg-verde-oscuro text-white px-4 py-3 rounded hover:bg-green-600">
                        Cerrar Sesión
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenido para probar el scroll -->

    <main class="mt-20 bg-verde-claro flex flex-col items-center h-full">
        <h1 class="text-4xl font-bold italic text-gray-800">Bienvenido a WEBTO</h1>
        <section class="mt-10 flex flex-col w-screen h-screen">
            <div class="flex flex-col h-full w-screen items-center">
                <div class="bg-white shadow-lg rounded-lg h-5/6 w-5/6">
                    <div>
                        <p>HOLA </p>
                    </div>

                </div>
                      
            </div>
        </section>
        
    </main>

</body>

</html>
