@extends('layouts.app-session')
@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            let defaultView = window.innerWidth < 768 ? 'listWeek' : 'dayGridMonth';

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: defaultView,
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                windowResize: function(view) {
                    const newView = window.innerWidth < 768 ? 'listWeek' : 'dayGridMonth';

                    calendar.changeView(newView);
                },
            });


            calendar.render();
        });
    </script>

    <script src={{ asset('fullcalendar/index.global.js') }}></script>
    <script src={{ asset('fullcalendar/es.global.js') }}></script>
    {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script> --}}
    <main class="mt-20 flex justify-center">
        <div class="flex flex-col sm:w-[95%] md:w-[80%] w-full h-full bg-gris-claro rounded-lg p-6">
            <div class="w-full flex flex-col justify-center">
                <h1 class= "text-xl">CALENDARIO</h1>
            </div>
            <div class="flex flex-col min-w-full" id='calendar'></div>

        </div>


    </main>
@endsection
