<!DOCTYPE html>
<html lang="es" dir="ltr">
    <body>
        <div class="justify">
            <div class="card">
                <div class="card-body">
                    <h3>Estimado/a: </h3>

                    <br>

                    <p>A través del presente, ... ingreso de solicitud:</p>

                    <br>
                    
                    <p><strong>Fecha de Solicitud</strong>:  {{ $fqRequest->created_at->format('d-m-Y H:i:s') }}</p>
                    <p><strong>Motivo de Solicitud</strong>: {{ $fqRequest->NameValue }}</p>

                    <br>
                    <p>Paciente:</p>
                    <br>
                    <p><strong>RUN</strong>: {{ $fqRequest->patient->RunFormat }}</p>
                    <p><strong>Nombre</strong>: {{ $fqRequest->patient->FullName }}</p>
                    <p><strong>Nº Ficha</strong>: {{ $fqRequest->patient->clinical_history_number }}</p>
                    <p><strong>Teléfono</strong>: {{ $fqRequest->patient->telephone }} - {{ $fqRequest->patient->telephone2 }}</p>
                    <p><strong>Correo electrónico</strong>: {{ $fqRequest->patient->email }}</p>
                    <p><strong>Dirección</strong>: {{ $fqRequest->patient->address }} - {{ $fqRequest->patient->commune }}</p>

                    <hr>

                    <p><strong>Fecha (Agendada)</strong>: {{ $fqRequest->date_confirm->format('d-m-Y H:i:s') }}</p>
                    <p><strong>Observación</strong>     : {{ $fqRequest->observation_request }}</p>

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
