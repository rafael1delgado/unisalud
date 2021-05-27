@extends('layouts.app')

@section('title', 'agenda')

@section('content')

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dummy.crear_usuario') }}">Crear usuario</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dummy.some') }}">Some</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('dummy.traspaso') }}">Traspaso/bloqueo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{route('dummy.agenda') }}">Agenda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('dummy.lista_espera') }}">Lista Espera</a>
  </li>
</ul>

<!-- form especialidad, funcionario, fecha,buscar-->
  <div class="form-row mt-3"  >
          
          <div class="form-group col-md-4">
            <label for="inputEmail4">Especialidad</label>
            <select id="inputState" class="form-control">
                  <option selected>Traumatología</option>
                <option>Cardiología</option>
                      <option>Ginecología</option>
                      <option>Neurología</option>
                      
            </select>
        </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4">Funcionario</label>
            <select id="inputState" class="form-control">
                  <option selected>Macarena Lopez</option>
                <option>Daniel Suarez</option>
                      <option>Jorge Miranda</option>
                      <option>Maria Isabel Araya</option>
            </select>
        </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">Fecha </label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Ingrese Fecha">
      </div>
          <div class="form-group col-md-1">
          <label for="inputEmail4">&nbsp;</label>
          <button type="button" class="btn btn-primary form-control">Buscar</button>
        </div>

    </div>  
<!--  fin form especialidad, funcionario, fecha,buscar-->

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