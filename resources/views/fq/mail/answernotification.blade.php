<!DOCTYPE html>
<html lang="es" dir="ltr">
    <body>
        <div class="justify">
            <div class="card">
                <div class="card-body">

                    <p><strong>Estimado Usuario</strong></p>

                    <br>

                    @if($fqRequest->name == 'specialty hours' && $fqRequest->attention == 'teleconsultation')
                    <p>Por medio de este mail, se informa citación vía telemedicina para el día {{ $fqRequest->date_confirm->format('d-m-Y H:i:s') }} con el {{-- Dr. Juan Perez --}}, vía zoom.
                    Para ingresar a tu consulta debes ingresar al siguiente enlace:
                    <a href="{{ $fqRequest->link }}">{{ $fqRequest->link }}</a></p>

                    <br>

                    <p>Recomendaciones para el día de tu cita:</p>

                    <ul>
                    	  <li>Recomendamos que te conectes 10 minutos antes de la cita, para comprobar que tu cámara, micrófono y parlante funcione correctamente.</li>
                        <li>Idealmente usar un computador para realizar la video llamada, sin embargo, también se puede realizar desde dispositivos móviles como tablets o celulares.</li>
                        <li>Contar con una buena y estable conexión a internet.</li>
                        <li>Escoger un lugar tranquilo y sin ruido.</li>
                        <li>En la plataforma de atención, podrás adjuntar archivos, tales como exámenes, recetas o cualquier otro documento que sea importante y necesario para la evaluación del médico.</li>
                    </ul>

                    <p>Si presentas algún inconveniente en la conexión, favor escribe a mail <strong>fq.iquique@redsalud.gob.cl</strong></p>

                    <p><strong>Equipo Telemedicina</p>
                    <p><strong>Hospital Dr Ernesto Torres</p>
                    <p><strong>Servicio de Salud Iquique</p>
                    </p>
                    @endif

                    @if($fqRequest->name == 'specialty hours' && $fqRequest->attention ==  'face-to-face')

                    <p>Por medio de este mail, se informa citación presencial:</p>

                    <ul>
                    	  <li><strong>Día y Hora</strong>: {{ $fqRequest->date_confirm->format('d-m-Y H:i:s') }}</li>
                        <li><strong>Nombre Medico</strong>: {{-- Dr. Juan Perez --}}</li>
                        <hr>
                        <li><strong>Paciente</strong>: {{ $fqRequest->patient->officialFullName }}</li>
                        <li><strong>Rut</strong>: {{ $fqRequest->patient->IdentifierRun->value }}-{{ $fqRequest->patient->IdentifierRun->dv }}</li>
                        <li><strong>Especialidad</strong>: {{ $fqRequest->SpecialtiesValue }}</li>

                        <li><strong>Especialidad</strong>: PFQ POLI FIBROSIS QUISTICA</li>
                        <li><strong>Valor a pagar</strong>:</li>
                    </ul>
                    @endif

                    @if($fqRequest->name == 'dispensing' || $fqRequest->name =='home hospitalization')
                    <p>Por medio de este mail, se informa respuesta a su solicitud de <strong>{{ $fqRequest->NameValue }}</strong>:</p>

                    <ul>
                    	  <li><strong>Día y Hora</strong>: {{ $fqRequest->date_confirm->format('d-m-Y H:i:s') }}</li>
                        <li><strong>Observación</strong>: {{ $fqRequest->observation_request }}</li>
                    </ul>
                    @endif

                    <hr>
                </div>
            </div>

            <br>

            <p class="texto">
                <span class="linea_firma" style="color: #EE3A43">——</span><span class="linea_firma" style="color: #0168B3">———</span><br>
                <br><br>
                Correo generado automáticamente a través de {{env('APP_NAME')}}
            </p>

        </div>

    </body>
</html>
