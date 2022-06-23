<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Resultado de examen</title>
    <style>

        body { font-family: futural; }

        h1 {
            text-transform: uppercase;
            font-size: 17px;
            text-decoration: underline;

        }

        h2 {
            text-transform: uppercase;
            font-size: 15px;
        }

        #demograficos {
            font-size: 13px;
            width: 100%;
        }

        th {
            text-align: left;
        }

        #peticion {
            text-align: center;
        }

        #resultados {
            font-size: 13px;
            width: 100%;
        }

        .firma {
            font-size: 13px;
            width: 100%;
            text-align: center;
            text-transform: uppercase;
        }

        .cabecera {
            display: inline-block;
            vertical-align: top;
        }

        #tipomuestra {
            font-size: 13px;
        }

        #fecha {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="cabecera" style="padding-top: 22px;">            
                <img src="images/lab_1.png" width="150" alt="logo servicio">            
        </div>
        <div class="cabecera" style="padding-left: 10px;">
            <h1>HOSPITAL DR. ERNESTO TORRES GALDAMES</h1>
            <h2 style="line-height: 1px;">LABORATORIO DE BIOLOGÍA MOLECULAR</h2>
        </div>

    </div>

    <h2 id="peticion">RESULTADO DE EXAMEN N°: {{ $case->id }} </h2>

    <table id="demograficos">
        <tr>
            <th>NOMBRE COMPLETO</th>
            <td>{{strtoupper($case->patient->OfficialFullName ??'')}}</td>
        </tr>
        <tr>
            <th>NACIONALIDAD</th>
            <td>{{strtoupper($case->patient->nationality->name ??'')}}</td>
        </tr>
        <tr>
            @if($case->patient->identifierRun)
            <th>RUN</th>
            <td>{{$case->patient->identifierRun->value ??''}}-{{$case->patient->identifierRun->dv}}</td>
            @else
            <th>Idenficador/Pasaporte</th>
            <td>{{ $case->patient->Identification->value ??''}}</td>
            @endif
        </tr>
        <tr>
            <th>EDAD</th>
            <td>
            {{\Carbon\Carbon::parse($case->patient->birthday)->age}}
                AÑOS
            </td>
        </tr>
        <tr>
            <th>SEXO</th>
            <td>{{strtoupper($case->patient->actualSex()->text ??'')}}</td>
        </tr>
        <tr>
            <th>ESTABLECIMIENTO</th>
            <td>{{strtoupper($case->organization->alias??'') }}</td>
        </tr>        
    </table>
    <hr>
    <div class="contenido">
        <p>INFECTOLOGÍA</p>

        <table id="resultados">
            <thead>
                <tr>
                    <th>PRUEBA</th>
                    <th>RESULTADO</th>
                    <th>R. REFERENCIA</th>
                    <th>MÉTODO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Test Screening para Chagas</td>
                    <td>{{$case->chagas_result_screening ??''}}</td>
                    <td>[ Negativo ]</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <br>
        <p id="tipomuestra">
            
        </p>


        <div style="height: 240px;">

        </div>

        <table width="100%">
            <tr>
                <td>
                    <div class="firma">
                        <img src="images/firma_user_146.png" width="140" alt="Firma Director Técnico">
                    </div>
                </td>

                
                    <!-- <td>
                        <div class="firma">
                            <img src="images/firma_user_146.png" width="140"
                                 alt="Firma Validador">
                        </div>
                    </td> -->

                

            </tr>
            <tr>
                <td class="firma">
                    DAVID ORTIZ LEIVA
                    <br>
                    DIRECTOR TÉCNICO LABORATORIO
                </td>

                
                    <!-- <td class="firma">
                            Francisca Olivares
                        <br>
                        VALIDADOR
                    </td> -->
                

                

            </tr>
        </table>


        <p id="fecha">Fecha y hora informe: {{ ($case->updated_at)? $case->updated_at->format('d-m-Y H:i'): '' }}</p>
    </div>
</body>

</html>
