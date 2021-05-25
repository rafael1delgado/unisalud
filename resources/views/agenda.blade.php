@extends('layouts.app')

@section('title', 'agenda')

@section('content')

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dummy.crear_usuario') }}">Crear usuario</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dummy.some') }}">Agenda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('dummy.traspaso') }}">Traspaso/bloqueo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{route('dummy.agenda') }}">Agenda</a>
  </li>
</ul>

<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            firstDay: 1,
            minTime: "08:00:00",
            maxTime: "17:30:00",
            timeFormat: 'H:mm',
            locale: 'es',
            events: [

                {
                groupId: '999',
                title: 'Control',
                start: '2021-05-25T7:00:00',
                end: '2021-05-25T8:30:00'
                },
                {
                groupId: '999',
                title: 'Consulta nueva de nueva especialidad',
                start: '2021-05-25T8:00:00',
                end: '2021-05-25T9:30:00'
                },
                {
                title: 'Consulta de nueva especialidad',
                start: '2021-05-24T10:30:00',
                end: '2021-05-24T11:30:00'
                },
                {
                title: 'Control',
                start: '2021-05-25T12:00:00',
                end: '2021-05-25T12:30:00'
                },
                {
                title: 'Control',
                start: '2021-05-28T15:30:00',
                end: '2021-05-28T16:30:00'
                },
                {
                title: 'Control',
                start: '2021-05-27T07:00:00',
                end: '2021-05-27T08:30:00'
                },
                {
                title: 'Consulta de nueva especialidad',
                start: '2021-05-28T07:00:00',
                end: '2021-05-28T08:30:00'

                }
            ]
        });
       
        calendar.render();
      });

     

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>
@endsection

@section('custom_js')

@endsection