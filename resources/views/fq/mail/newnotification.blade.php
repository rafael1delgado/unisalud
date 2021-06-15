@extends('layouts.mail')

@section('content')

<div style="text-align: justify;">

  <h4>Estimado/a: </h4>

  <br>

  <p>A través del presente, se informa ingreso de nueva solicitud:</p>

  <ul>
      <li><strong>Fecha de Solicitud</strong>: {{ $fqRequest->created_at->format('d-m-Y H:i:s') }}</li>
      <li><strong>Motivo de Solicitud</strong>: {{ $fqRequest->NameValue }}</li>
      @if($fqRequest->name == 'specialty hours' && $fqRequest->specialties == 'other')
      <li><strong>Especialidad</strong>: {{ $fqRequest->SpecialtiesValue }} / {{ $fqRequest->OtherSpecialtiesValue }}</li>
      @else
      <li><strong>Especialidad</strong>: {{ $fqRequest->SpecialtiesValue }}</li>
      @endif
      <li><strong>Observación</strong>: {{ $fqRequest->observation_patient }}</li>
  </ul>
  <hr>
  <br>
  <p>Paciente:</p>
  <ul>
      <li><strong>RUN</strong>: {{ $fqRequest->patient->IdentifierRun->value }}-{{ $fqRequest->patient->IdentifierRun->dv }}</li>
      <li><strong>Nombre</strong>: {{ $fqRequest->patient->officialFullName }}</li>
      {{-- @foreach($fqRequest->contactUser->user->contactPoints->where('system', 'phone') as $contactPoint) --}}
      @foreach($fqRequest->contactUser->contactPoints->where('system', 'phone') as $contactPoint)
      <li><strong>Teléfono - {{ $contactPoint->UseValue }}</strong>: +56 {{ $contactPoint->value }}</li>
      @endforeach
      @foreach($fqRequest->contactUser->contactPoints->where('system', 'email') as $contactPoint)
      <li><strong>E-mail - {{ $contactPoint->UseValue }}</strong>: {{ $contactPoint->value }}</li>
      @endforeach
  </ul>

  @if($fqRequest->name == 'dispensing')
      <p>Medicamentos o Insumos Solicitados:</p>
      <ul>
      @foreach($fqRequest->fq_medicines as $key => $fq_medicine)
          <li>{{ $fq_medicine->medicine->name }}</li>
      @endforeach
      </ul>

  @endif

</div>

@endsection
