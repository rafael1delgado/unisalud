@extends('layouts.mail')

@section('content')

<div style="text-align: justify;">

  <h5>Estimado/a: </h5>

  <br>

  <p>A través del presente, se informa ingreso de solicitud nueva solicitud:</p>

  <ul>
      <li><strong>Fecha de Solicitud</strong>: {{ $fqRequest->created_at->format('d-m-Y H:i:s') }}</li>
      <li><strong>Motivo de Solicitud</strong>: {{ $fqRequest->NameValue }}</li>
      <li><strong>Observación</strong>: {{ $fqRequest->observation_patient }}</li>

      <hr>
      <br>
      <li><strong>Paciente</strong>:</p>
      <li><strong>RUN</strong>: {{ $fqRequest->patient->IdentifierRun->value }}-{{ $fqRequest->patient->IdentifierRun->dv }}</li>
      <li><strong>Nombre</strong>: {{ $fqRequest->patient->officialFullName }}</li>
      <li><strong>Teléfono</strong>:
        @foreach($fqRequest->contactUser->contactPoints->where('system', 'phone') as $contactPoint)
          +59 {{ $contactPoint->value }}
        @endforeach
      </li>
      <li><strong>Correo electrónico</strong>:
        @foreach($fqRequest->contactUser->contactPoints->where('system', 'email') as $contactPoint)
          {{ $contactPoint->value }}
        @endforeach
      </li>
      <li><strong>Dirección</strong>:
          @foreach($fqRequest->contactUser->addresses as $address)
            {{ $address->text }} {{ $address->line }}<br>
          @endforeach
      </li>
      <li><strong>Departamento</strong>:
          @foreach($fqRequest->contactUser->addresses as $address)
            {{ $address->apartment }}<br>
          @endforeach
      </li>
      <li><strong>Condominio/Población/Villa</strong>:
          @foreach($fqRequest->contactUser->addresses as $address)
            {{ $address->suburb }}<br>
          @endforeach
      </li>
      <li><strong>Comuna</strong>:
          @foreach($fqRequest->contactUser->addresses as $address)
            {{ $address->city }}<br>
          @endforeach
      </li>
  </ul>

  @if($fqRequest->name == 'dispensing')
      <p>Medicamentos o Insumos Solicitados:</p>
      <ul>
      @foreach($fqRequest->fq_medicines as $key => $fq_medicine)
          <li>{{ $fq_medicine->medicine->name }}</li>
      @endforeach
      </ul>

  @endif
  <hr>

</div>

@endsection
