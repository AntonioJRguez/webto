@extends('layouts.app-session')
@section('content')
    <main class="mt-20 flex justify-center ">
        <div class="flex flex-col w-[80%] h-full bg-gris-claro rounded-lg p-6">
            <div class="w-full flex flex-col justify-center">
                <h1 class= "text-xl">Eventos</h1>
            </div>


            <section class="grid grid-cols-3 gap-6 p-6">
                @php
                
                @endphp
                @foreach ($events as $event)
                    @php
                        $asistants = 0;
                    @endphp
                    <article class="border-2 border-verde-claro rounded-lg p-2">
                        <div class=" flex flex-col items-center">
                            <h2 class="font-bold">{{ $event->name }}</h2>
                            @if (!is_null($event->image_id))
                                <x-cloudinary::image public-id="{{ $event->image_id }}" class="w-72" />
                            @else
                                <x-cloudinary::image public-id="noimage" class="w-72"/>
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
                                Fecha evento: {{ $event->event_date}}
                            </div>
                            <div>
                                Duración(Horas): {{ $event->duration}}
                            </div>
                            <div>
                                Lugar: {{ $event->location}}
                            </div>

                            <form method="POST" id="editTasksForm" action="{{route('toggle.assistant')}}">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="eventId" id="eventId" value="{{ $event->id}}">
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
                    </article>
                @endforeach






                <x-cloudinary::widget>Upload Files</x-cloudinary::widget>



                {{-- paginacion --}}


            </section>
            <div class="mt-4 p-5">
                {{ $events->links() }}
            </div>
        </div>


    </main>
@endsection
