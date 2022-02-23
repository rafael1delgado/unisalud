<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Reporte Cometido</title>
        <meta name="description" content="Reporte de cometido">
        <meta name="author" content="Servicio de Salud Iquique">
        <link href="{{ asset('css/report.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="content">
            <img style="padding-bottom: 4px;" src="{{ asset('images/logo_samu.png') }}"
                width="120" alt="Logo Servicio de Salud Iquique"><br>


        <div class="titulo">INFORME DE COMETIDO {{ $event->id }}</div>

        <b>Fecha:</b> {{ $event->date }}

        <h4>Registro de la(s) llamadas:</h4>

        <table class="ocho">
            <thead>
                <tr>
                    <th style="width: 50px;">Hora</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Solicitante</th>
                    <th>OPT</th>
                    <th>OP ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach($event->calls as $call)
                <tr>
                    <td class="center">{{ $call->hour->format('H:i') }}</td>
                    <td>{{ $call->telephone }}</td>
                    <td>{{ $call->address }}</td>
                    <td>{{ $call->applicant }}</td>
                    <td class="center">{{ $call->classification }}</td>
                    <td class="center">{{ $call->receptor_id }}</td>
                </tr>
                <tr>
                    <td colspan="6">{{ $call->information }}</td>
                </tr>
                @if(!$loop->last)
                    <tr><td colspan="6" style="border-left: 1px solid white; border-right: 1px solid white;">&nbsp;</td></tr>
                @endif
                @endforeach
            </tbody>
        </table>


        <h4>Marcas de tiempo:</h4>

        <table class="ocho">
            <thead>
                <tr>
                    <th>Aviso de salida</th>
                    <th>Salida de móvil</th>
                    <th>Llegada al lugar</th>
                    <th>Ruta centro asistencial</th>
                    <th>En centro asistencial</th>
                    <th>Recepción paciente</th>
                    <th>Retorno a base</th>
                    <th>Móvil en base</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="center">{{ optional($event->departure_at)->format('H:i') }}</td>
                    <td class="center">{{ optional($event->mobile_departure_at)->format('H:i') }}</td>
                    <td class="center">{{ optional($event->mobile_arrival_at)->format('H:i') }}</td>
                    <td class="center">{{ optional($event->route_to_healtcenter_at)->format('H:i') }}</td>
                    <td class="center">{{ optional($event->healthcenter_at)->format('H:i') }}</td>
                    <td class="center">{{ optional($event->patient_reception_at)->format('H:i') }}</td>
                    <td class="center">{{ optional($event->return_base_at)->format('H:i') }}</td>
                    <td class="center">{{ optional($event->on_base_at)->format('H:i') }}</td>
                </tr>
            </tbody>
        </table>

        <h4>Registros del cometido:</h4>

        <table class="ocho">
            <thead>
                <tr>
                    <th>C.I.</th>
                    <th>C.E.</th>
                    <th>QTC</th>
                    <th>MOVIL</th>
                    <th>TIPO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="center">{{ $event->key->key }}</td>
                    <td class="center">{{ $event->returnKey->key }}</td>
                    <td class="center">{{ $event->counter }}</td>
                    <td class="center">{{ optional($event->mobileInService)->mobile_id }}</td>
                    <td class="center">{{ optional($event->mobileInService)->type }}</td>
                </tr>
            </tbody>
        </table>
        
        <h4>Información del paciente:</h4>

        <ul>

        <li style="margin-bottom: 16px;">
            <b>Paciente:</b> {{ $event->patient_name }} - 
            <b>Tipo de identificación:</b> {{ optional($event->identifierType)->text }} -
            <b>Identificación:</b> {{ $event->patient_identification }}
        </li>
        <li style="margin-bottom: 16px;"><b>Clínico:</b> {{ $event->reception_detail }}</li>
        <li style="margin-bottom: 16px;"><b>Tratamiento:</b> {{ $event->treatment }}</li>
        <li>
        <table class="ocho">
            <thead>
                <tr>
                    <th>Frecuencia cardiaca</th>
                    <th>Frecuencia respiratoria</th>
                    <th>Presión arterial</th>
                    <th>Presión arterial media</th>
                    <th>Grasgow</th>
                    <th>% Saturacion Oxig/Ambi</th>
                    <th>% Saturacion Oxig/Apoyo</th>
                    <th>HGT mg/dl</th>
                    <th>Llene Capilar</th>
                    <th>Temperatura ºC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="center">{{ $event->fc }}</td>
                    <td class="center">{{ $event->fr }}</td>
                    <td class="center">{{ $event->pa }}</td>
                    <td class="center">{{ $event->pam }}</td>
                    <td class="center">{{ $event->gl }}</td>
                    <td class="center">{{ $event->soam }}</td>
                    <td class="center">{{ $event->soap }}</td>
                    <td class="center">{{ $event->hgt }}</td>
                    <td class="center">{{ $event->fill_capillary }}</td>
                    <td class="center">{{ $event->t }}</td>
                </tr>
            </tbody>
        </table>
        </li>
        
    </ul>

    <h4>Información establecimiento o lugar de recepción:</h4>

    <table class="ocho">
        <thead>
            <tr>
                <th>Establecimiento o lugar</th>
                <th>Quien recepciona</th>
                <th>Registro Atención Urgencia</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="center">{{ optional($event->establishment)->name }} {{ optional($event->receptionPlace)->name}}</td>
                <td class="center">{{ $event->reception_person }}</td>
                <td class="center">{{ $event->rau }}&nbsp;</td>
            </tr>
        </tbody>
    </table>
    
    <h4>Tripulación móvil:</h4>
    
    @if($event->mobileInService)
    <table class="ocho">
        <thead>
            <tr>
                <th style="width: 200px;">Función</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($event->mobileInService->crew as $user)
            <tr>
                <td>{{ optional($user->pivot)->JobType->name }}</td>
                <td>{{ optional($user)->officialFullName }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No hay móvil en servicio asociado</p>
    @endif


    <h4>Centro Regulador:</h4>
    
    <table class="ocho">
        <thead>
            <tr>
                <th style="width: 200px;">Función</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($event->shift->users as $user)
            <tr>
                <td>{{ optional($user->pivot)->JobType->name }}</td>
                <td>{{ optional($user)->officialFullName }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    <div class="pie_pagina seis center">
        <span class="uppercase">Servicio de Salud Iquique</span><br>
        Anibal Pinto #815, Iquique -
        Fono: 572409495 -
        www.saludiquique.cl
    </div>
</div>

</body>
</html>
