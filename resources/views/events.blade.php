@extends('layouts.app-session')
@section('content')
    <main class="mt-20 flex-grow flex flex-col items-center h-full w-full">
        <div class="flex flex-col w-[95%] md:w-[80%] h-full bg-gris-claro rounded-lg p-3 m-2">
            <div class="w-full flex justify-center">
                <h1 class="text-6xl font-extrabold text-gris-profundo climate">
                    Eventos
                </h1>
            </div>
            {{-- @php
            dd(vars: $events);
            @endphp
             --}}
            @if ($events->isEmpty())
                <div class="flex h-20 items-center justify-center">
                    <p>No hay ningun evento disponible.</p>
                </div>
            @else
                <section class="grid grid-cols-1 sm:grid-cols-3 gap-6 p-6">
                    @foreach ($events as $event)
                        @php
                            $asistants = 0;
                        @endphp
                        {{-- <article class="border-2 border-verde-claro rounded-lg p-2">
                            <div class=" flex flex-col items-center">
                                <h2 class="font-bold">{{ $event->name }}</h2>
                                @if (!is_null($event->image_id))
                                    <x-cloudinary::image public-id="{{ $event->image_id }}" class="w-72" />
                                @else
                                    <x-cloudinary::image public-id="noimage" class="w-72" />
                                @endif

                            </div>
                            <div class="p-2 flex flex-col items-center">
                                <img src="" alt="">
                                <p class="border-1 rounded-s p-2 bg-verde-claro">{{ $event->description }}</p>
                                @foreach ($event->users as $asistant)
                                    @php
                                        $asistants++;
                                    @endphp
                                @endforeach
                                <div>
                                    Cupo de asistentes: {{ $asistants }}/{{ $event->capacity }}
                                </div>
                                <div>
                                    Fecha evento: {{ $event->event_date }}
                                </div>
                                <div>
                                    Duración(Horas): {{ $event->duration }}
                                </div>
                                <div>
                                    Lugar: {{ $event->location }}
                                </div>

                                <form method="POST" id="editTasksForm" action="{{ route('toggle.assistant') }}">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="eventId" id="eventId" value="{{ $event->id }}">
                                    @if ($event->users->contains('id', Auth::id()))
                                        <button type="submit" class="btn-red">Desapuntarme</button>
                                    @else
                                        @if ($asistants < $event->capacity)
                                            <button type="submit" class="btn-green">Apuntarme</button>
                                        @else
                                            <button class="btn-gray">Evento lleno</button>
                                        @endif
                                    @endif
                                </form>
                            </div>
                        </article> --}}
                        <article
                            class="border-2 border-green-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 bg-white flex flex-col h-full">
                            <div class="flex flex-col items-center p-4 border-b border-green-100">
                                <h2 class="font-bold text-lg text-gray-800 mb-3 text-center">{{ $event->name }}</h2>
                                <div class="h-48 overflow-hidden flex items-center justify-center bg-gray-50 mx-auto">
                                    @if (!is_null($event->image_id))
                                        <x-cloudinary::image public-id="{{ $event->image_id }}"
                                            class="h-full w-auto max-w-full" />
                                    @else
                                        <x-cloudinary::image public-id="noimage"
                                            class="h-full w-auto max-w-full object-contain p-4" />
                                    @endif
                                </div>
                            </div>

                            <!-- Contenido con altura fija para alinear en grid -->
                            <div class="p-4 flex flex-col w-full h-full justify-end">
                                <p
                                    class="border border-green-100 rounded-lg p-3 bg-green-50 text-gray-700 mb-4 text-sm flex-grow">
                                    {{ $event->description }}</p>
                                @foreach ($event->users as $asistant)
                                    @php
                                        $asistants++;
                                    @endphp
                                @endforeach
                                <!-- Detalles del evento - alineados -->
                                <div class="space-y-2 text-sm text-gray-600 p-4">
                                    <div class="flex justify-between">
                                        <span class="col-span-2 font-medium text-gray-700">Cupo:</span>
                                        <span class="col-span-3">{{ $asistants }}/{{ $event->capacity }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="col-span-2 font-medium text-gray-700">Fecha:</span>
                                        <span
                                            class="col-span-3">{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d/m/Y H:i') }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="col-span-2 font-medium text-gray-700">Duración:</span>
                                        <span class="col-span-3">{{ $event->duration }} horas</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="col-span-2 font-medium text-gray-700">Lugar:</span>
                                        <span class="col-span-3 break-words">{{ $event->location }}</span>
                                    </div>
                                </div>

                                <!-- Botones (manteniendo tus clases originales) -->
                                <form method="POST" id="editTasksForm" action="{{ route('toggle.assistant') }}"
                                    class="mt-4">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="eventId" id="eventId" value="{{ $event->id }}">
                                    @if ($event->users->contains('id', Auth::id()))
                                        <button type="submit" class="btn-red w-full">Desapuntarme</button>
                                    @else
                                        @if ($asistants < $event->capacity)
                                            <button type="submit" class="btn-green w-full">Apuntarme</button>
                                        @else
                                            <button class="btn-gray w-full">Evento lleno</button>
                                        @endif
                                    @endif
                                </form>
                            </div>
                        </article>
                    @endforeach





                </section>
                <div class="mt-4 p-5">
                    {{ $events->links() }}
                </div>
            @endif
        </div>


    </main>
@endsection
