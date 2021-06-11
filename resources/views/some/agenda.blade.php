@extends('layouts.app')

@section('title', 'agenda')

@section('content')


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
              //control 14  de junio
                {
                title: 'Control',
                start: '2021-06-14T08:00:00',
                end: '2021-06-14T08:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T08:15:00',
                end: '2021-06-14T08:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T08:30:00',
                end: '2021-06-14T08:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T08:45:00',
                end: '2021-06-14T09:00:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T09:00:00',
                end: '2021-06-14T09:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T09:15:00',
                end: '2021-06-14T09:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T09:30:00',
                end: '2021-06-14T09:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T09:45:00',
                end: '2021-06-14T10:00:00'
                },

                {
                title: 'Control',
                start: '2021-06-14T10:00:00',
                end: '2021-06-14T10:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T10:15:00',
                end: '2021-06-14T10:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T10:30:00',
                end: '2021-06-14T10:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T10:45:00',
                end: '2021-06-14T11:00:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T11:00:00',
                end: '2021-06-14T11:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T11:15:00',
                end: '2021-06-14T11:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T11:30:00',
                end: '2021-06-14T11:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-14T11:45:00',
                end: '2021-06-14T12:00:00'
                },

                // fin control  14  de junio
                {
                
                title: 'Almuerzo',
                start: '2021-06-14T12:00:00',
                end: '2021-06-14T12:45:00',
                color: 'gray',
                
               
                },
                // inicio nuevo  14  de junio
                {
                title: 'Nueva',
                start: '2021-06-14T12:45:00',
                end: '2021-06-14T13:00:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T13:00:00',
                end: '2021-06-14T13:15:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T13:15:00',
                end: '2021-06-14T13:30:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T13:30:00',
                end: '2021-06-14T13:45:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T13:45:00',
                end: '2021-06-14T14:00:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T14:00:00',
                end: '2021-06-14T14:15:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T14:15:00',
                end: '2021-06-14T14:30:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T14:30:00',
                end: '2021-06-14T14:45:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T14:45:00',
                end: '2021-06-14T15:00:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T15:00:00',
                end: '2021-06-14T15:15:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T15:15:00',
                end: '2021-06-14T15:30:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T15:30:00',
                end: '2021-06-14T15:45:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T15:45:00',
                end: '2021-06-14T16:00:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T16:00:00',
                end: '2021-06-14T16:15:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-14T16:15:00',
                end: '2021-06-14T16:30:00',
                color: '#90EE90',
                textColor:'black'
                },
                // fin nuevo  14  de junio

                //inicio pabellon 15 de junio
                {
               
                title: 'Pabellon',
                start: '2021-06-15T08:00:00',
                end: '2021-06-15T08:15:00',
                color: '#FFB6C1',
                textColor:'black'
                },
                {
               
               title: 'Pabellon',
               start: '2021-06-15T08:15:00',
               end: '2021-06-15T08:30:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T08:30:00',
               end: '2021-06-15T08:45:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T08:45:00',
               end: '2021-06-15T09:00:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T09:00:00',
               end: '2021-06-15T09:15:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T09:15:00',
               end: '2021-06-15T09:30:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T09:30:00',
               end: '2021-06-15T09:45:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T09:45:00',
               end: '2021-06-15T10:00:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T10:00:00',
               end: '2021-06-15T10:15:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T10:15:00',
               end: '2021-06-15T10:30:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T10:30:00',
               end: '2021-06-15T10:45:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T10:45:00',
               end: '2021-06-15T11:00:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T11:00:00',
               end: '2021-06-15T11:15:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T11:15:00',
               end: '2021-06-15T11:30:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T11:30:00',
               end: '2021-06-15T11:45:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T11:45:00',
               end: '2021-06-15T12:00:00',
               color: '#FFB6C1',
               textColor:'black'
               },

               {
               
               title: 'Pabellon',
               start: '2021-06-15T12:00:00',
               end: '2021-06-15T12:15:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T12:15:00',
               end: '2021-06-15T12:30:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T12:30:00',
               end: '2021-06-15T12:45:00',
               color: '#FFB6C1',
               textColor:'black'
               },

               {
               
               title: 'Pabellon',
               start: '2021-06-15T12:45:00',
               end: '2021-06-15T13:00:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T13:00:00',
               end: '2021-06-15T13:15:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T13:15:00',
               end: '2021-06-15T13:30:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T13:30:00',
               end: '2021-06-15T13:45:00',
               color: '#FFB6C1',
               textColor:'black'
               },
               {
               
               title: 'Pabellon',
               start: '2021-06-15T13:45:00',
               end: '2021-06-15T14:00:00',
               color: '#FFB6C1',
               textColor:'black'
               },

                //fin pabellon 15 de junio
                
                //inicio control 16 de junio
                {
                title: 'Control',
                start: '2021-06-16T08:00:00',
                end: '2021-06-16T08:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T08:15:00',
                end: '2021-06-16T08:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T08:30:00',
                end: '2021-06-16T08:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T08:45:00',
                end: '2021-06-16T09:00:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T09:00:00',
                end: '2021-06-16T09:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T09:15:00',
                end: '2021-06-16T09:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T09:30:00',
                end: '2021-06-16T09:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T09:45:00',
                end: '2021-06-16T10:00:00'
                },

                {
                title: 'Control',
                start: '2021-06-16T10:00:00',
                end: '2021-06-16T10:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T10:15:00',
                end: '2021-06-16T10:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T10:30:00',
                end: '2021-06-16T10:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T10:45:00',
                end: '2021-06-16T11:00:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T11:00:00',
                end: '2021-06-16T11:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T11:15:00',
                end: '2021-06-16T11:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T11:30:00',
                end: '2021-06-16T11:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-16T11:45:00',
                end: '2021-06-16T12:00:00'
                },

                //fin control 16 de junio
                {
                
                title: 'Almuerzo',
                start: '2021-06-16T12:00:00',
                end: '2021-06-16T12:45:00',
                color: 'gray',
                },

                //inicio nuevo 16 de junio
                {
                title: 'Nueva',
                start: '2021-06-16T12:45:00',
                end: '2021-06-16T13:00:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T13:00:00',
                end: '2021-06-16T13:15:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T13:15:00',
                end: '2021-06-16T13:30:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T13:30:00',
                end: '2021-06-16T13:45:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T13:45:00',
                end: '2021-06-16T14:00:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T14:00:00',
                end: '2021-06-16T14:15:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T14:15:00',
                end: '2021-06-16T14:30:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T14:30:00',
                end: '2021-06-16T14:45:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T14:45:00',
                end: '2021-06-16T15:00:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T15:00:00',
                end: '2021-06-16T15:15:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T15:15:00',
                end: '2021-06-16T15:30:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T15:30:00',
                end: '2021-06-16T15:45:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T15:45:00',
                end: '2021-06-16T16:00:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T16:00:00',
                end: '2021-06-16T16:15:00',
                color: '#90EE90',
                textColor:'black'
                },
                {
                title: 'Nueva',
                start: '2021-06-16T16:15:00',
                end: '2021-06-16T16:30:00',
                color: '#90EE90',
                textColor:'black'
                },

                //fin nuevo 16 de junio

                //Inicio reunion 17 de junio
                {
                title: 'Reunión',
                start: '2021-06-17T08:00:00',
                end: '2021-06-17T08:15:00',
                color: '#BA55D3',
                },
                {
                title: 'Reunión',
                start: '2021-06-17T08:15:00',
                end: '2021-06-17T08:30:00',
                color: '#BA55D3',
                },
                {
                title: 'Reunión',
                start: '2021-06-17T08:30:00',
                end: '2021-06-17T08:45:00',
                color: '#BA55D3',
                },
                {
                title: 'Reunión',
                start: '2021-06-17T08:45:00',
                end: '2021-06-17T09:00:00',
                color: '#BA55D3',
                },

                //fin reunion 17 de junio

                //inicio otras actividades 17 de junio
                {
                title: 'Otras Actividades',
                start: '2021-06-17T09:00:00',
                end: '2021-06-17T09:15:00',
                color: '	#FFD700',
                textColor:'black'
                },

                {
                title: 'Otras Actividades',
                start: '2021-06-17T09:15:00',
                end: '2021-06-17T09:30:00',
                color: '	#FFD700',
                textColor:'black'
                },
                {
                title: 'Otras Actividades',
                start: '2021-06-17T09:30:00',
                end: '2021-06-17T09:45:00',
                color: '	#FFD700',
                textColor:'black'
                },
                {
                title: 'Otras Actividades',
                start: '2021-06-17T09:45:00',
                end: '2021-06-17T10:00:00',
                color: '	#FFD700',
                textColor:'black'
                },
                {
                title: 'Otras Actividades',
                start: '2021-06-17T10:00:00',
                end: '2021-06-17T10:15:00',
                color: '	#FFD700',
                textColor:'black'
                },
                {
                title: 'Otras Actividades',
                start: '2021-06-17T10:15:00',
                end: '2021-06-17T10:30:00',
                color: '	#FFD700',
                textColor:'black'
                },
                {
                title: 'Otras Actividades',
                start: '2021-06-17T10:30:00',
                end: '2021-06-17T10:45:00',
                color: '	#FFD700',
                textColor:'black'
                },
                {
                title: 'Otras Actividades',
                start: '2021-06-17T10:45:00',
                end: '2021-06-17T11:00:00',
                color: '	#FFD700',
                textColor:'black'
                },
                {
                title: 'Otras Actividades',
                start: '2021-06-17T11:00:00',
                end: '2021-06-17T11:15:00',
                color: '	#FFD700',
                textColor:'black'
                },
                {
                title: 'Otras Actividades',
                start: '2021-06-17T11:15:00',
                end: '2021-06-17T11:30:00',
                color: '	#FFD700',
                textColor:'black'
                },
                {
                title: 'Otras Actividades',
                start: '2021-06-17T11:30:00',
                end: '2021-06-17T11:45:00',
                color: '	#FFD700',
                textColor:'black'
                },
                {
                title: 'Otras Actividades',
                start: '2021-06-17T11:45:00',
                end: '2021-06-17T12:00:00',
                color: '	#FFD700',
                textColor:'black'
                },

                //fin otras actividades 17 de junio
                {
                
                title: 'Almuerzo',
                start: '2021-06-17T12:00:00',
                end: '2021-06-17T12:45:00',
                color: 'gray',
                },

                //inicio control 17 de junio
                
                {
                title: '  Control',
                start: '2021-06-17T12:45:00',
                end: '2021-06-17T13:00:00'
                
                },
                {
                title: 'Control',
                start: '2021-06-17T13:00:00',
                end: '2021-06-17T13:15:00'
                
                },
                {
                title: 'Control',
                start: '2021-06-17T13:15:00',
                end: '2021-06-17T13:30:00'
            
                },
                {
                title: 'Control',
                start: '2021-06-17T13:30:00',
                end: '2021-06-17T13:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-17T13:45:00',
                end: '2021-06-17T14:00:00'
                },
                {
                title: 'Control',
                start: '2021-06-17T14:00:00',
                end: '2021-06-17T14:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-17T14:15:00',
                end: '2021-06-17T14:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-17T14:30:00',
                end: '2021-06-17T14:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-17T14:45:00',
                end: '2021-06-17T15:00:00'
                },
                {
                title: 'Control',
                start: '2021-06-17T15:00:00',
                end: '2021-06-17T15:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-17T15:15:00',
                end: '2021-06-17T15:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-17T15:30:00',
                end: '2021-06-17T15:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-17T15:45:00',
                end: '2021-06-17T16:00:00'
                },
                {
                title: 'Control',
                start: '2021-06-17T16:00:00',
                end: '2021-06-17T16:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-17T16:15:00',
                end: '2021-06-17T16:30:00'
                },


                //fin control 17 d ejunio
                {
                title: 'Control',
                start: '2021-06-18T08:00:00',
                end: '2021-06-18T08:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T08:15:00',
                end: '2021-06-18T08:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T08:30:00',
                end: '2021-06-18T08:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T08:45:00',
                end: '2021-06-18T09:00:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T09:00:00',
                end: '2021-06-18T09:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T09:15:00',
                end: '2021-06-18T09:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T09:30:00',
                end: '2021-06-18T09:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T09:45:00',
                end: '2021-06-18T10:00:00'
                },

                {
                title: 'Control',
                start: '2021-06-18T10:00:00',
                end: '2021-06-18T10:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T10:15:00',
                end: '2021-06-18T10:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T10:30:00',
                end: '2021-06-18T10:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T10:45:00',
                end: '2021-06-18T11:00:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T11:00:00',
                end: '2021-06-18T11:15:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T11:15:00',
                end: '2021-06-18T11:30:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T11:30:00',
                end: '2021-06-18T11:45:00'
                },
                {
                title: 'Control',
                start: '2021-06-18T11:45:00',
                end: '2021-06-18T12:00:00'
                },
                {
                
                title: 'Almuerzo',
                start: '2021-06-18T12:00:00',
                end: '2021-06-18T12:45:00',
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