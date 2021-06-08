@extends('fq.app')

@section('title', 'Encuesta: Habilitantes Teleconsulta')

@section('content')

<h5><i class="fas fa-tasks"></i> Encuestas: Habilitantes Teleconsulta</h5>

<br>
<div class="table-responsive">
    <table class="table table-sm table-hover">
        <thead class="table-info">
            <tr>
                <th scope="col">Identificación</th>
                <th scope="col">Nombre</th>
                <th scope="col">Paciente</th>
                <th scope="col">Fecha Ingreso</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
          @foreach($teleconsultationSurveys as $teleconsultationSurvey)
            <tr>
                <td>
                  @foreach($teleconsultationSurvey->user->identifiers as $identifier)
                    {{ $identifier->value }}-{{ $identifier->dv }}<br>
                  @endforeach
                </td>
                <td>
                  {{ $teleconsultationSurvey->user->OfficialFullName }}
                </td>
                <td>
                  @foreach($teleconsultationSurvey->user->usersPatients as $patient)
                    {{ $patient->user->OfficialFullName }}
                  @endforeach
                </td>
                <td>
                    {{ $teleconsultationSurvey->created_at->format('d-m-Y H:i:s') }}<br>
                </td>

              <td>
                  <a href="{{ route('surveys.teleconsultation.show', $teleconsultationSurvey) }}"
                    class="btn btn-outline-secondary btn-sm" title="Ir">
                    <i class="far fa-eye"></i>
                  </a>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>




{{ $teleconsultationSurveys->links() }}

@endsection

@section('custom_js')

@endsection
