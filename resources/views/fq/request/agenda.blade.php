@extends('fq.app')

@section('title', 'FQ - Mis Solicitudes')

@section('content')

{{-- @include('fq.partials.nav') --}}
<br>

<h5><i class="fas fa-inbox"></i> Mis Solicitudes</h5>

<div class="table-responsive">
    <table class="table table-sm table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th style="width: 11%">Fecha</th>
                <th>Estado</th>
                <th>Motivo de Solicitud</th>
                <th>observación</th>
                <th style="width: 2%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($my_reqs as $fqRequest)
            <tr>
                <td>{{ $fqRequest->created_at->format('d-m-Y H:i:s') }}</td>
                <td>{{ $fqRequest->StatusValue }}</td>
                <td>{{ $fqRequest->NameValue }}</td>
                <td>{{ $fqRequest->observation_patient }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $fqRequest->id }}">
                        <i class="fas fa-edit"></i>
                    </button>

                    @include('fq.request.modals.view_request')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<hr>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('dummy.crear_usuario') }}">Proximas Solicitudes Agendadas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('fq.request.agenda') }}"><i class="fas fa-calendar-alt"></i> Calendario</a>
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
            allDaySlot: false,
            firstDay: 1,

            slotMinTime: "08:00:00",

            slotDuration: "00:15:00",
            slotMaxTime: "17:30:00",
            timeFormat: 'HH:mm',
            locale: 'es',
            slotLabelFormat:
            {
              hour: 'numeric',
              minute: '2-digit',
              omitZeroMinute: false,
              hour12:false,
              meridiem: 'short'
            },

            events: [

                {

                title: 'Control',
                start: '2021-05-24T08:00:00',
                end: '2021-05-24T12:00:00'
                },
                {

                title: 'Almuerzo',
                start: '2021-05-24T12:00:00',
                end: '2021-05-24T12:45:00',
                color: 'gray',


                },

                {

                title: 'Nueva',
                start: '2021-05-24T12:45:00',
                end: '2021-05-24T16:30:00',
                color: 'yellow',
                textColor:'black'
                },
                {

                title: 'Pabellon',
                start: '2021-05-25T08:00:00',
                end: '2021-05-25T15:00:00',
                color: 'pink',
                textColor:'black'
                },

                {
                title: 'Control',
                start: '2021-05-26T08:00:00',
                end: '2021-05-26T12:00:00'
                },
                {

                title: 'Almuerzo',
                start: '2021-05-26T12:00:00',
                end: '2021-05-26T12:45:00',
                color: 'gray',
                },
                {
                title: 'Nueva',
                start: '2021-05-26T12:45:00',
                end: '2021-05-26T16:30:00',
                color: 'yellow',
                textColor:'black'
                },
                {
                title: 'Reunión',
                start: '2021-05-27T08:00:00',
                end: '2021-05-27T09:00:00',
                color: 'purple',
                },
                {
                title: 'Otras Actividades',
                start: '2021-05-27T09:00:00',
                end: '2021-05-27T12:00:00',
                color: 'orange',
                textColor:'black'
                },
                {

                title: 'Almuerzo',
                start: '2021-05-27T12:00:00',
                end: '2021-05-27T12:45:00',
                color: 'gray',
                },
                {
                title: 'Control',
                start: '2021-05-27T12:45:00',
                end: '2021-05-27T16:30:00'
                },
                {
                title: 'Control',
                start: '2021-05-28T08:00:00',
                end: '2021-05-28T12:00:00'
                },
                {

                title: 'Almuerzo',
                start: '2021-05-28T12:00:00',
                end: '2021-05-28T12:45:00',
                color: 'gray',
                },
                {
                title: 'Control',
                start: '2021-05-31T08:00:00',
                end: '2021-05-31T12:00:00'
                },
                {

                title: 'Almuerzo',
                start: '2021-05-31T12:00:00',
                end: '2021-05-31T12:45:00',
                color: 'gray',


                },

                {

                title: 'Nueva',
                start: '2021-05-31T12:45:00',
                end: '2021-05-31T16:30:00',
                color: 'yellow',
                textColor:'black'
                },
                {

                title: 'Pabellon',
                start: '2021-06-01T08:00:00',
                end: '2021-06-01T14:00:00',
                color: 'pink',
                textColor:'black'
                },

                {
                title: 'Control',
                start: '2021-06-02T08:00:00',
                end: '2021-06-02T12:00:00'
                },
                {

                title: 'Almuerzo',
                start: '2021-06-02T12:00:00',
                end: '2021-06-02T12:45:00',
                color: 'gray',
                },
                {
                title: 'Nueva',
                start: '2021-06-02T12:45:00',
                end: '2021-06-02T16:30:00',
                color: 'yellow',
                textColor:'black'
                },
                {
                title: 'Reunión',
                start: '2021-06-03T08:00:00',
                end: '2021-06-03T09:00:00',
                color: 'purple',
                },
                {
                title: 'Otras Actividades',
                start: '2021-06-03T09:00:00',
                end: '2021-06-03T12:00:00',
                color: 'orange',
                textColor:'black'
                },
                {

                title: 'Almuerzo',
                start: '2021-06-03T12:00:00',
                end: '2021-06-03T12:45:00',
                color: 'gray',
                },
                {
                title: 'Control',
                start: '2021-06-03T12:45:00',
                end: '2021-06-03T16:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-04T08:00:00',
                end: '2021-06-04T12:00:00'
                },
                {

                title: 'Almuerzo',
                start: '2021-06-04T12:00:00',
                end: '2021-06-04T12:45:00',
                color: 'gray',
                },



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
