@extends('fq.app')

@section('title', 'FQ - Mis Solicitudes')

@section('content')

<br>

<h5><i class="fas fa-inbox"></i> Mis Solicitudes</h5>

<div class="table-responsive">
    <table class="table table-sm table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th></th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Motivo de Solicitud</th>
                <th>Especialidad</th>
                <th>Observación</th>
                <th style="width: 7%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($my_reqs as $fqRequest)
            <tr>
                <td class="text-center">
                    @if($fqRequest->status == 'pending')
                      <i class="fas fa-clock fa-lg"></i>
                    @endif
                    @if($fqRequest->status == 'complete')
                      <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                    @endif
                </td>
                <td>{{ $fqRequest->created_at->format('d-m-Y H:i:s') }}</td>
                <td>{{ $fqRequest->StatusValue }}</td>
                <td>{{ $fqRequest->NameValue }}</td>
                @if($fqRequest->name == 'specialty hours' && $fqRequest->specialties == 'other')
                <td>{{ $fqRequest->SpecialtiesValue }} / {{ $fqRequest->OtherSpecialtiesValue }}</td>
                @else
                <td>{{ $fqRequest->SpecialtiesValue }}</td>
                @endif
                <td>{{ $fqRequest->observation_patient }}</td>
                <td>
                    <a href="{{ route('fq.request.view_file', $fqRequest) }}"
                        @if($fqRequest->prescription_file)
                            class="btn btn-outline-secondary btn-sm"
                        @else
                            class="btn btn-outline-secondary btn-sm disabled"
                        @endif
                        title="Receta"
                        target="_blank">
                        <i class="far fa-file-alt"></i>
                    </a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#exampleModal-{{ $fqRequest->id }}">
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

<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js'></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            allDaySlot: true,
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
              @foreach($my_reqs->where('status', 'complete') as $fqRequest)
                {
                title: '{{ $fqRequest->NameValue }}',
                description: '{{ $fqRequest->SpecialtiesValue }}',
                start: '{{ $fqRequest->date_confirm->format("Y-m-d\TH:i:s") }}',
                end: '{{ $fqRequest->date_confirm->addMinutes(20)->format("Y-m-d\TH:i:s") }}'
                },
              @endforeach
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
