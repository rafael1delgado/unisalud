@extends('fq.app')

@section('title', 'Encuesta: Habilitantes Teleconsulta')

@section('content')

<h5><i class="fas fa-tasks"></i> Encuestas: Habilitantes Teleconsulta</h5>
<br>
@if(App\Models\Fq\ContactUser::getAmIContact() > 0)
<a class="btn btn-primary" href="{{ route('surveys.teleconsultation.create') }}">
    <i class="fas fa-plus"></i> Nueva Respuesta
</a>
@endif

<br><br>
<div class="table-responsive">
    <table class="table table-sm table-hover">
        <thead class="table-info">
            <tr class="text-center">
                <th scope="col">Identificación</th>
                <th scope="col">Nombre</th>
                <th scope="col">Paciente</th>
                <th scope="col">Fecha Ingreso</th>
                <th scope="col" colspan="2"</th>
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
                    {{-- dd(App\Models\Surveys\TeleconsultationSurvey::getSurveyResults($teleconsultationSurvey)) --}}
                    @if(App\Models\Surveys\TeleconsultationSurvey::getSurveyResults($teleconsultationSurvey) == 'green')
                        <i class="fas fa-circle fa-lg" style="color: green;"></i>
                    @endif
                    @if(App\Models\Surveys\TeleconsultationSurvey::getSurveyResults($teleconsultationSurvey) == 'orange')
                        <i class="fas fa-circle fa-lg" style="color: orange;"></i>
                    @endif
                    @if(App\Models\Surveys\TeleconsultationSurvey::getSurveyResults($teleconsultationSurvey) == 'red')
                        <i class="fas fa-circle fa-lg" style="color: red;"></i>
                    @endif
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
