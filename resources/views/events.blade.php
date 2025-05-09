@extends('layouts.app-session')
@section('content')
    <main class="mt-20 flex justify-center ">
        <div class="flex flex-col w-[80%] h-full bg-gris-claro rounded-lg p-6">
            <div class="w-full flex flex-col justify-center">
                <h1 class= "text-xl">Eventos</h1>
            </div>
            <section class="grid grid-cols-3 gap-6 p-6">
                @foreach ($events as $event)
                    <article class="border-2 border-verde-claro rounded-lg ">
                        <div class="p-2 flex justify-center">
                            <h2>{{ $event->name }}</h2>
                        </div>
                        <div class="p-2 flex flex-col items-center">
                            <p>{{ $event->description }}</p>
                            @foreach ($event->users as $asistant)
                                {{ $asistant->name }}, parcela: {{ $asistant->plot->name }}
                            @endforeach
                        </div>
                    </article>
                @endforeach
                {{-- paginacion --}}


            </section>
            <div class="mt-4 p-5">
                {{ $events->links() }}
            </div>
        </div>


    </main>
@endsection
