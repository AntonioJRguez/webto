@extends('layouts.app-session')
@section('content')


<main class="mt-20  flex flex-col items-center h-full">
    <h1 class="text-4xl font-bold italic text-gris-claro">Bienvenido a WEBTO</h1>
    <section class="mt-10 flex flex-col w-full h-screen">
        <div class="flex flex-row justify-evenly ">
            <div class="bg-gris-claro border-solid border-4  shadow-lg rounded-lg h-2/3 w-1/3 overflow-auto flex flex-col items-center p-3">
                <h1 class="mt-5 text-2xl font-bold mb-4 text-center text-gris-profundo">EVENTOS PRÓXIMOS:</h1>
                <div class="flex items-center m-4">
                    <!-- Imagen cuadrada -->
                    <div class="w-16 h-16 bg-gray-300 rounded-md flex-shrink-0 overflow-hidden">
                        <img src="https://via.placeholder.com/150" alt="Imagen" class="object-cover w-full h-full">
                    </div>
                    <!-- Contenido a la derecha -->
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-800">Título del contenido</h2>
                        <p class="text-gray-600 text-sm">
                            Breve descripción del contenido para este elemento.
                        </p>
                    </div>
                </div>
                <div class="flex items-center m-4 cursor-pointer">
                    <!-- Imagen cuadrada -->
                    <div class="w-16 h-16 bg-gray-300 rounded-md flex-shrink-0 overflow-hidden">
                        <img src="https://via.placeholder.com/150" alt="Imagen" class="object-cover w-full h-full">
                    </div>
                    <!-- Contenido a la derecha -->
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-800">Título del contenido</h2>
                        <p class="text-gray-600 text-sm">
                            Breve descripción del contenido para este elemento.
                        </p>
                    </div>
                </div>
                <div class="flex items-center m-4">
                    <!-- Imagen cuadrada -->
                    <div class="w-16 h-16 bg-gray-300 rounded-md flex-shrink-0 overflow-hidden">
                        <img src="https://via.placeholder.com/150" alt="Imagen" class="object-cover w-full h-full">
                    </div>
                    <!-- Contenido a la derecha -->
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-800">Título del contenido</h2>
                        <p class="text-gray-600 text-sm">
                            Breve descripción del contenido para este elemento.
                        </p>
                    </div>
                </div>
                <div class="flex items-center m-4">
                    <!-- Imagen cuadrada -->
                    <div class="w-16 h-16 bg-gray-300 rounded-md flex-shrink-0 overflow-hidden">
                        <img src="https://via.placeholder.com/150" alt="Imagen" class="object-cover w-full h-full">
                    </div>
                    <!-- Contenido a la derecha -->
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-800">Título del contenido</h2>
                        <p class="text-gray-600 text-sm">
                            Breve descripción del contenido para este elemento.
                        </p>
                    </div>
                </div>
                <div class="flex items-center m-4">
                    <!-- Imagen cuadrada -->
                    <div class="w-16 h-16 bg-gray-300 rounded-md flex-shrink-0 overflow-hidden">
                        <img src="https://via.placeholder.com/150" alt="Imagen" class="object-cover w-full h-full">
                    </div>
                    <!-- Contenido a la derecha -->
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-800">Título del contenido</h2>
                        <p class="text-gray-600 text-sm">
                            Breve descripción del contenido para este elemento.
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-gris-claro shadow-lg rounded-lg h-2/3 w-1/3 overflow-auto flex flex-col items-center p-3">
                <div class="max-w-lg mx-auto mt-5">
                    <h1 class="text-2xl font-bold mb-4 text-center text-gris-profundo">Tareas del Huerto</h1>
                    <ul class="space-y-4">
                      <!-- Tarea Pendiente -->
                      <li class="flex items-center justify-between p-4 bg-yellow-100 border-l-4 border-yellow-500 rounded shadow">
                        <div>
                          <p class="text-lg font-medium text-yellow-800">Regar las tomateras</p>
                          <p class="text-sm text-yellow-600">Pendiente</p>
                        </div>
                        <span class="text-yellow-600 font-bold">🌱</span>
                      </li>
                      <!-- Tarea Pendiente -->
                      <li class="flex items-center justify-between p-4 bg-yellow-100 border-l-4 border-yellow-500 rounded shadow">
                        <div>
                          <p class="text-lg font-medium text-yellow-800">Regar las tomateras</p>
                          <p class="text-sm text-yellow-600">Pendiente</p>
                        </div>
                        <span class="text-yellow-600 font-bold">🌱</span>
                      </li>
                      <!-- Tarea Pendiente -->
                      <li class="flex items-center justify-between p-4 bg-yellow-100 border-l-4 border-yellow-500 rounded shadow">
                        <div>
                          <p class="text-lg font-medium text-yellow-800">Regar las tomateras</p>
                          <p class="text-sm text-yellow-600">Pendiente</p>
                        </div>
                        <span class="text-yellow-600 font-bold">🌱</span>
                      </li>
                      <!-- Tarea Pendiente -->
                      <li class="flex items-center justify-between p-4 bg-yellow-100 border-l-4 border-yellow-500 rounded shadow">
                        <div>
                          <p class="text-lg font-medium text-yellow-800">Regar las tomateras</p>
                          <p class="text-sm text-yellow-600">Pendiente</p>
                        </div>
                        <span class="text-yellow-600 font-bold">🌱</span>
                      </li>
                  
                      <!-- Tarea Realizada -->
                      <li class="flex items-center justify-between p-4 bg-gray-100 border-l-4 border-gray-400 rounded shadow">
                        <div>
                          <p class="text-lg font-medium text-gray-800 line-through">Podar los rosales</p>
                          <p class="text-sm text-gray-600">Realizada</p>
                        </div>
                        <span class="text-gray-400 font-bold">✔️</span>
                      </li>
                  
                      <!-- Tarea Urgente -->
                      <li class="flex items-center justify-between p-4 bg-red-100 border-l-4 border-red-500 rounded shadow">
                        <div>
                          <p class="text-lg font-medium text-red-800">Revisar plagas en las lechugas</p>
                          <p class="text-sm text-red-600">Urgente</p>
                        </div>
                        <span class="text-red-600 font-bold">⚠️</span>
                      </li>
                  
                      <!-- Tarea en Progreso -->
                      <li class="flex items-center justify-between p-4 bg-blue-100 border-l-4 border-blue-500 rounded shadow">
                        <div>
                          <p class="text-lg font-medium text-blue-800">Trasplantar las albahacas</p>
                          <p class="text-sm text-blue-600">En progreso</p>
                        </div>
                        <span class="text-blue-600 font-bold">🔄</span>
                      </li>
                    </ul>
                  </div>
                  
        </div>
    </section>
    
</main>

@endsection