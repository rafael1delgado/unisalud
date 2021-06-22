@extends('fq.app')

@section('title', 'Encuesta: Habilitantes Teleconsulta')

@section('content')

<h5><i class="fas fa-tasks"></i> Encuesta: Habilitantes Teleconsulta</h5>

<br>

<hr>

<div class="table-responsive">
    <table class="table table-sm table-hover">
        <thead class="table-info">
            <tr>
                <th scope="col">Identificación</th>
                <th scope="col">Nombre de Contacto</th>
                <th scope="col">Paciente</th>
                <th scope="col">Fecha Ingreso Encuesta</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
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
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="card">
  <div class="card-body">
    <div class="row active">
        <div class="col-sm-6">
          1-. ¿Cuenta con computador o dispositivo similar con conexión a internet?
        </div>
        @if($teleconsultationSurvey->computer_or_similar == 1)
        <div class="col-sm-4">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col-sm-4">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col-sm-6">
          2-. ¿Cuenta con conexión a internet?
        </div>
        @if($teleconsultationSurvey->internet == 1)
        <div class="col-sm-4">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col-sm-4">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col-sm-6">
          3-. ¿Cuenta con sistema de audio? (Parlantes o Audifonos).
        </div>
        @if($teleconsultationSurvey->audio == 1)
        <div class="col-sm-4">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col-sm-4">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col-sm-6">
          4-. ¿Cuenta con cámara web?
        </div>
        @if($teleconsultationSurvey->webcam == 1)
        <div class="col-sm-4">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col-sm-4">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col-sm-6">
          5-. ¿Cuenta con micrófono?
        </div>
        @if($teleconsultationSurvey->microphone == 1)
        <div class="col-sm-4">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col-sm-4">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col-sm-6">
          5-. ¿Como definiría su habilidad con el internet: ?
        </div>
        <div class="col-sm-4">
          <fieldset class="form-group">
              <select name="internet_skill" id="for_internet_skill" class="form-control" disabled>
                  <option value="">Seleccione...</option>
                  <option value="good" {{ ($teleconsultationSurvey->internet_skill == 'good')?'selected':'' }}>Buena</option>
                  <option value="regular" {{ ($teleconsultationSurvey->internet_skill == 'regular')?'selected':'' }}>Regular</option>
                  <option value="bad" {{ ($teleconsultationSurvey->internet_skill == 'bad')?'selected':'' }}>Mala</option>
              </select>
          </fieldset>
        </div>
        <div class="col-sm-4">

        </div>
    </div>

    <hr>

    <div class="row active">
        <div class="col-sm-6">
          7-. ¿Cuenta con un lugar con buena luz, espacio físico y privacidad para
          poder desarrollar una sesión de telemedicina ?
        </div>
        @if($teleconsultationSurvey->place == 1)
        <div class="col-sm-4">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col-sm-4">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col-sm-6">
          8-. ¿Ha tenido experiencia previa con atención con modalidad remota?
        </div>
        @if($teleconsultationSurvey->has_experience == 1)
        <div class="col-sm-4">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col-sm-4">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>

    <hr>

    <div class="row active">
        <div class="col-sm-6">
          9-. ¿Presenta alguna dificultad visual o auditiva ?
        </div>
        @if($teleconsultationSurvey->hearing_or_visual_impairment == 1)
        <div class="col-sm-4">
          <div class="form-check">
            Sí <i class="fas fa-check" style="color:green"></i>
          </div>
        </div>
        @else
        <div class="col-sm-4">
          <div class="form-check">
            No <i class="fas fa-times" style="color:red"></i>
          </div>
        </div>
        @endif
    </div>
  </div>
</div>
<br><br><br>

@endsection

@section('custom_js')

@endsection
