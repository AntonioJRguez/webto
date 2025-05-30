@extends('layouts.app-controlPanel')
@section('content')
    @php

    @endphp

    <main>

        <section class="h-full bg-gris-claro p-8">
            <div class="grid grid-cols-1 md:grid-cols-3  gap-6 p-6 w-full max-w-screen-xl mx-auto mt-10">
                <!-- Card 1 -->
                <a href="{{route('admin.users')}}" ><div class="bg-white h-64 rounded-2xl cursor-pointer shadow-md hover:shadow-lg p-6 flex flex-col justify-around items-center">
                    <!-- Ícono SVG grande -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-24 h-24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>

                    <!-- Título -->
                    <h2 class="text-xl font-semibold text-gray-800">Usuarios</h2>
                </div></a>

                <!-- Card 2 -->
                 <a href="{{route('admin.plots')}}" ><div class="bg-white h-64 rounded-2xl shadow-md cursor-pointer hover:shadow-lg p-6 flex flex-col justify-around items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="w-24 h-24 text-black"
                        fill="none">
                        <!-- Cuadrado con esquinas más redondeadas -->
                        <rect x="10" y="10" width="180" height="180" rx="30" ry="30" fill="#f0f0f0"
                            stroke="black" stroke-width="4" />

                        <!-- Línea horizontal descentrada estilizada -->
                        <line x1="20" y1="100" x2="180" y2="100" stroke="black" stroke-width="8"
                            stroke-linecap="round" />

                        <!-- Línea vertical descentrada estilizada -->
                        <line x1="120" y1="20" x2="120" y2="180" stroke="black" stroke-width="8"
                            stroke-linecap="round" />
                    </svg>


                    <h2 class="text-xl font-semibold text-gray-800">Parcelas</h2>
                </div></a>

                <!-- Card 3 -->
                 <a href="{{route('admin.events')}}" ><div class="bg-white h-64 rounded-2xl shadow-md cursor-pointer hover:shadow-lg p-6 flex flex-col justify-around items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800">Eventos</h2>
                </div></a>
            </div>

            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="w-6 h-6 text-black" fill="none">
                <rect x="10" y="10" width="180" height="180" rx="20" ry="20" fill="#f0f0f0" stroke="black"  stroke-width="4" />
                <line x1="10" y1="100" x2="190" y2="100" stroke="black" stroke-width="8" />
               <line x1="120" y1="10" x2="120" y2="190" stroke="black" stroke-width="8" />
            </svg> --}}
        </section>

    </main>
@endsection
